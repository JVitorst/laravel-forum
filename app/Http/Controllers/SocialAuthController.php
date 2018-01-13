<?php

namespace App\Http\Controllers;

use App\SocialAuth;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->user();
        //Pegando a conta da rede social a partir do SocialAuth
        $account = SocialAuth::where([
            'provider' => $provider,
            'social_id' => $user->id,
        ])->first();

        //Se ja tiver autenticado
        if ($account) {
            auth()->login($account->user);
            return redirect()->to('/');
        }

        //Se não tiver nada
        //Fazendo registro do usuario
        $localUser = User::where('email', $user->email)->first();//Pegando o email para ver  se o email ja esta cadastrado

        //Se tiver um  usuario
        if ($localUser) {
            return redirect()->to('/'); //Semelhante a linha '26' porem sem autenticacao
        }

        //Se não existir devemos registrar um usuario
        $newUser = new User;
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->password = md5(rand(1, 1000));
        $newUser->save();

        //Ciando nossa conta associada ao usuario em questão
        $account = new SocialAuth;
        $account->provider = $provider;
        $account->social_id = $user->id;
        $account->user_id = $newUser->id;//Associando o Account com o User
        $account->save();

        auth()->login($newUser);

        return redirect()->to('/');

    }
}
