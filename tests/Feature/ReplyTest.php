<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ReplyTest extends TestCase
{
    use DatabaseMigrations; //Classe que adciona recursos

    public function testListagemDeRespostasPorTopico()
    {
        //Criando User
        $user = factory(\App\User::class)->create();

        $this->seed('ThreadsTableSeeder');
        //Buscando Reply de ID 2
        $replies = \App\Reply::where('thread_id',2)
            ->get();
        $response = $this->actingAs($user)
                    ->json('GET', '/replies/2');

        $response->assertStatus(200)
            ->assertJson($replies->toArray());
    }

    public function  testInclusaoDeNovaReposta(){
        //Autenticacao
        $user = factory(\App\User::class)->create();
        //Criando e recebendo Thread
        $thread = factory(\App\Thread::class)->create();

        //Requisicao
        $response = $this->actingAs($user)
            ->json('POST', '/replies', [
                'body' => ' Eu sou uma resposta no forum',
                'thread_id' => $thread->id
            ]);
        $reply = \App\Reply::find(1);

        //Asserts
        $response->assertStatus(200)
                ->assertJson($reply->toArray());

    }

}
