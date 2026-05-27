<?php
use App\Models\Tela;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('T01. Get Telas', function () {
    Tela::factory()->count(10)->create();

    $response = $this->getJson('api/telas');
    $response->assertStatus(200);
});

test('T02. Search Tela', function () {
    Tela::factory()->count(10)->create();

    $response = $this->getJson('api/telas/1');
    $response->assertStatus(200);
});

test('T03. Store Telas', function () {
    $tela = [
        'nombre' => 'Piel de durazno',
    ];

    $response = $this->postJson('api/telas', $tela);
    $response->assertStatus(201);
});

test('T04. Update Tela', function () {
    Tela::factory()->count(10)->create();
    $tela = [
        'nombre' => 'Piel de durazno',
    ];

    $response = $this->putJson('api/telas/1', $tela);
    $response->assertStatus(200);
});

test('T05. Delete Tela', function () {
    Tela::factory()->count(10)->create();

    $response = $this->deleteJson('api/telas/1');
    $response->assertStatus(200);
});