<?php
use App\Models\ColorTela;
use App\Models\Tela;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('CT01. Get ColoresTela', function () {
    ColorTela::factory()->count(10)->create();

    $response = $this->getJson('api/colores-tela');
    $response->assertStatus(200);
});

test('CT02. Search ColorTela', function () {
    ColorTela::factory()->count(10)->create();

    $response = $this->getJson('api/colores-tela/1');
    $response->assertStatus(200);
});

test('CT03. Store ColorTela', function () {
    Tela::factory()->count(10)->create();
    $colorTela = [
        'color' => 'Vino',
        'tela_id' => 1
    ];

    $response = $this->postJson('api/colores-tela', $colorTela);
    $response->assertStatus(201);
});

test('CT04. Update ColorTela', function () {
    ColorTela::factory()->count(10)->create();
    $tela = [
        'color' => 'Vino',
        'tela_id' => 1
    ];

    $response = $this->putJson('api/colores-tela/1', $tela);
    $response->assertStatus(200);
});

test('CT05. Delete ColorTela', function () {
    ColorTela::factory()->count(10)->create();

    $response = $this->deleteJson('api/colores-tela/1');
    $response->assertStatus(200);
});