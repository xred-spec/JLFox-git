<?php
use App\Models\Lote;
use App\Models\Prenda;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('L01. Get Lotes Pendientes', function () {
    Lote::factory()->count(10)->create();

    $response = $this->getJson('api/lotes/pendientes');
    $response->assertStatus(200);
});

test('L02. Get Lotes Produccion', function () {
    Lote::factory()->count(10)->create();

    $response = $this->getJson('api/lotes/produccion');
    $response->assertStatus(200);
});

test('L03. Get Lotes Terminados', function () {
    Lote::factory()->count(10)->create();

    $response = $this->getJson('api/lotes/terminados');
    $response->assertStatus(200);
});

test('L04. Store Lote', function () {
    Prenda::factory()->count(10)->create();

    $lote = [
        'estado' => 'pendiente',
        'fecha_inicio' => '2026-07-07 18:00:00',
        'fecha_final' => '2026-07-07 18:00:00',
        'prendas' => [
            ['prenda_id' => 1, 'cantidad' => 50]
        ]
    ];

    $response = $this->postJson('api/lotes', $lote);
    $response->assertStatus(201);
});

test('L04. Update Lote', function () {
    Lote::factory()->count(10)->create(); 
    Prenda::factory()->count(10)->create();

    $lote = [
        'estado' => 'pendiente',
        'fecha_inicio' => '2026-07-07 18:00:00',
        'fecha_final' => '2026-07-07 18:00:00',
        'prendas' => [
            ['prenda_id' => 1, 'cantidad' => 50]
        ]
    ];

    $response = $this->putJson('api/lotes/1', $lote);
    $response->assertStatus(200);
});

test('L05. Delete Lote', function () {
    Lote::factory()->count(10)->create();

    $response = $this->deleteJson('api/lotes/1');
    $response->assertStatus(200);
});