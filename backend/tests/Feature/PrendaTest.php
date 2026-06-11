<?php
use App\Models\Prenda;
use App\Models\TipoPrenda;
use App\Models\ColorTela;
use App\Models\Bordado;
use App\Models\Forro;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('P01. Get Prendas', function () {
    Prenda::factory()->count(10)->create();

    $response = $this->getJson('api/prendas');
    $response->assertStatus(200);
});

test('P02. Search Prenda', function () {
    Prenda::factory()->count(10)->create();

    $response = $this->getJson('api/prendas/1');
    $response->assertStatus(200);
});

test('P03. Store Prenda', function () {
    TipoPrenda::factory()->count(10)->create();
    ColorTela::factory()->count(10)->create();
    Bordado::factory()->count(10)->create();
    Forro::factory()->count(10)->create();

    $prenda = [
        'tipo' => 'adulto',
        'talla' => 36,
        'tiene_cartera' => true,
        'cartera_tiene_bordado' => true,
        'tipo_prenda_id' => 1,
        'color_tela_id' => 1,
        'bordado_id' => 1,
        'forro_id' => 1
    ];

    $response = $this->postJson('api/prendas', $prenda);
    $response->assertStatus(201);
});

test('P04. Update Prenda', function () {
    Prenda::factory()->count(10)->create();
    TipoPrenda::factory()->count(10)->create();
    ColorTela::factory()->count(10)->create();
    Bordado::factory()->count(10)->create();
    Forro::factory()->count(10)->create();

    $prenda = [
        'tipo' => 'adulto',
        'talla' => 36,
        'tiene_cartera' => true,
        'cartera_tiene_bordado' => true,
        'tipo_prenda_id' => 1,
        'color_tela_id' => 1,
        'bordado_id' => 1,
        'forro_id' => 1
    ];

    $response = $this->putJson('api/prendas/1', $prenda);
    $response->assertStatus(200);
});

test('P05. Delete Prenda', function () {
    Prenda::factory()->count(10)->create();

    $response = $this->deleteJson('api/prendas/1');
    $response->assertStatus(200);
});