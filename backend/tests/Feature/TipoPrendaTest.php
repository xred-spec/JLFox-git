<?php
use App\Models\TipoPrenda;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('TP01. Get TiposPrenda', function () {
    TipoPrenda::factory()->count(10)->create();

    $response = $this->getJson('api/tipos-prenda');
    $response->assertStatus(200);
});

test('TP02. Search TipoPrenda', function () {
    TipoPrenda::factory()->count(10)->create();

    $response = $this->getJson('api/tipos-prenda/1');
    $response->assertStatus(200);
});

test('TP03. Store TipoPrenda', function () {
    $tipoPrenda = [
        'nombre' => 'Pantalón',
    ];

    $response = $this->postJson('api/tipos-prenda', $tipoPrenda);
    $response->assertStatus(201);
});

test('TP04. Update TipoPrenda', function () {
    TipoPrenda::factory()->count(10)->create();
    $tipoPrenda = [
        'nombre' => 'Pantalón',
    ];

    $response = $this->putJson('api/tipos-prenda/1', $tipoPrenda);
    $response->assertStatus(200);
});

test('TP05. Delete TipoPrenda', function () {
    TipoPrenda::factory()->count(10)->create();

    $response = $this->deleteJson('api/tipos-prenda/1');
    $response->assertStatus(200);
});