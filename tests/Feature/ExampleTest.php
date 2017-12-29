<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ExampleTest extends TestCase
{
    //Permite suporte ao banco de Dados
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testReplies(){

            //TDD - Desenvolvimento orientado a testes
            // Prática RED-GREEN-REFACTORING


        //Carregamento da Seed
        $this->seed('RepliesTableSeeder');

        //Verifica se o caminho retorna 200
        $response = $this->get('/threads/1'); //Tem que ter registros cadastrados
        $response->assertStatus(200);

        $response = $this->get('/threads/2');//Tem que ter registros cadastrados
        $response->assertStatus(200);

        //Verifica se o caminho retorna 404
        $response = $this->get('/threads/a');//TNão existe ID "a"
        $response->assertStatus(404);


    }
    //Verificar se esta renderizando
    public function testThreadVisualization(){
        $this->seed('ThreadsTableSeeder');

        $thread = \App\Thread::find(1);
        $response = $this->get('/threads/1');
        //Teste para verificar se o title o body estao sendo vistos
        $response->assertSee($thread->title);
        $response->assertSee($thread->body);

    }
}
