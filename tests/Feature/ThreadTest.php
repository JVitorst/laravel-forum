<?php

namespace Tests\Feature;
use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Test na action INDEX do ThreadsController.
     *
     * @return void
     */
    public function testActionIndexOnController()
    {
        //Pegando usuário
        $user = factory(\App\User::class)->create();
        //Carregando retorno jsno para variavel
        $this->seed('ThreadsTableSeeder');
        $threads = Thread::orderBy('updated_at', 'desc')
            ->paginate();

        $response = $this
            ->actingAs($user)
            ->json('GET','/threads');

       $response->assertStatus(200)
                ->assertJsonFragment([$threads->toArray()['data']]); //Pegando 'parte' de um retorno json

    }
    public function testActionStoreOnController()
    {
        //Pegando usuário
        $user = factory(\App\User::class)->create();

        $response = $this
            ->actingAs($user)
            ->json('POST','/threads', [
                'title' => 'Minha primeira postagem',
                'body' => 'Este é um exemplo de tópico criado no Tester'
            ]);
        $thread = Thread::find(1);

       $response->assertStatus(200)
                -> assertJsonFragment(['created' => 'success'])
                -> assertJsonFragment([$thread->toArray()]);

    }
    public function testActionUpdateOnController()
    {
        //Pegando usuário
        $user = factory(\App\User::class)->create();
        $thread = factory(\App\Thread::class)->create(
            [
                'user_id' => $user->id
            ]
        );

        $response = $this
            ->actingAs($user)
            ->json('PUT','/threads/' . $thread->id, [
                'title' => 'Minha primeira postagem atualizada',
                'body' => 'Este é um exemplo de tópico atualizado'
            ]);

        $thread->title = 'Minha primeira postagem atualizada';
        $thread->body = 'Este é um exemplo de tópico atualizado';

       $response->assertStatus(302);
       $this->assertEquals(Thread::find(1)->toArray(), $thread->toArray());


    }
}
