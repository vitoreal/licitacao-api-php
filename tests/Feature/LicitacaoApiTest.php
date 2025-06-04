<?php

namespace Tests\Feature;

use App\Models\Licitacao;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LicitacaoApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_lista_licitacoes()
    {
        Licitacao::factory()->count(3)->create();

        $response = $this->getJson('/api/licitacao');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         '*' => ['id', 'codigo_uasg', 'numero_pregao', 'visualizada']
                     ],
                     'current_page',
                     'last_page',
                     'total'
                 ]);
    }

    public function test_busca_uma_licitacao()
    {
        $licitacao = Licitacao::factory()->create();

        $url = "/api/licitacao?uasg=".$licitacao->codigo_uasg."&pregao=".$licitacao->numero_pregao;
        $response = $this->getJson($url);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         '*' => ['id', 'codigo_uasg', 'numero_pregao', 'visualizada']
                     ],
                     'current_page',
                     'last_page',
                     'total'
                 ]);
    }

    public function test_marca_licitacao_como_visualizada()
    {
        $licitacao = Licitacao::factory()->create(['visualizada' => false]);

        $response = $this->putJson("/api/licitacao/{$licitacao->id}/visualizada", [
            'visualizada' => true
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Solicitação realizada com sucesso.',
                     'data' => true
                 ]);

        $this->assertDatabaseHas('licitacao', [
            'id' => $licitacao->id,
            'visualizada' => 1
        ]);
    }
}
