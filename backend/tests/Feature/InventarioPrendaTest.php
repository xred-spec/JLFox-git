<?php
use App\Models\PrendaLote;
use App\Models\InventarioPrenda;
use App\Models\Prenda;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('IP01. Get InventarioPrenda', function () {
    InventarioPrenda::factory()->count(10)->create();

    $response = $this->getJson('api/inventario');
    $response->assertStatus(200);
});

test('IP02. Search InventarioPrenda', function () {
    InventarioPrenda::factory()->count(10)->create();

    $response = $this->getJson('api/inventario/1');
    $response->assertStatus(200);
});

test('IP03. Store InventarioPrenda', function () {
    Prenda::factory()->count(10)->create();

    $inventarioPrenda = [
        'cantidad' => 10,
        'prenda_id' => 1,
    ];

    $response = $this->postJson('api/inventario', $inventarioPrenda);
    $response->assertStatus(201);
});

test('IP04. Update InventarioPrenda', function () {
    InventarioPrenda::factory()->count(10)->create();
    Prenda::factory()->count(10)->create();

    $inventarioPrenda = [
        'cantidad' => 10,
        'prenda_id' => 1,
    ];

    $response = $this->putJson('api/inventario/1', $inventarioPrenda);
    $response->assertStatus(200);
});

test('IP05. Delete InventarioPrenda', function () {
    InventarioPrenda::factory()->count(10)->create();

    $response = $this->deleteJson('api/inventario/1');
    $response->assertStatus(200);
});