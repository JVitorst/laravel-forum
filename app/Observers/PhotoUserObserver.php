<?php

namespace App\Observers;

use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use Image;

class PhotoUserObserver
{
    public function  creating(User $user){
        // Validação do arquivo que sofrera upload
        if (is_a($user->photo, UploadedFile::class) and $user->photo->isValid() ){
            $this->upload($user);
        } //is_a verifica se a classe é de um tipo especial
    }

    public function  deleting(User $user){
        //Pssando caminho commpleto do salvamento
        Storage::delete($user->photo);
    }

    public function  updating(User $user){

        if (is_a($user->photo, UploadedFile::class) and $user->photo->isValid() ){
            $previous_image = $user->getOriginal('photo'); //Pegando a Img original
            $this->upload($user);

            Storage::delete($previous_image);

        } //is_a verifica se a classe é de um tipo especial
    }

    //Metodo de salvar a imagem
    protected function upload(User $user){

        //Extensoes permitidas
        $allowed_extensions = [
            'png',
            'gif',
            'jpeg',
            'jpg'
        ];
        $extension = $user->photo->extension();

        if (!in_array($extension, $allowed_extensions)){
            throw new Exception('Extension not Allowed');
        }
        //Gerando nome para a imagem
        $name = bin2hex(openssl_random_pseudo_bytes(8));
        $name = $name . '.' . $extension;
        $name = 'avatars/' . $name;

        //Salvamento da Img em tamanho real
        $user->photo->storeAs('', $name);

        //Criacao miniatura redimensionada usando intervention/image
        $img = Image::make($user->photo->getRealPath());
        $img->fit(200, 200)->save(public_path('/thumb/' . $name));

        $user->photo = $name;
    }
}