<?php
use App\Models\PrendaLote;
use App\Models\Lote;
use App\Models\PrendaProceso;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('PL01. Get PrendasLotes', function () {
    PrendaLote::factory()->count(10)->create();

    $response = $this->getJson('api/prenda-lote');
    $response->assertStatus(200);
});

test('PL02. Search PrendaLote', function () {
    PrendaLote::factory()->count(10)->create();

    $response = $this->getJson('api/prenda-lote/1');
    $response->assertStatus(200);
});

test('PL03. Store PrendaLote', function () {
    PrendaProceso::factory()->count(10)->create();
    Lote::factory()->count(10)->create();

    $prendaLote = [
        'cantidad_prevista' => 10,
        'cantidad_proceso' => null,
        'cantidad_final' => null,
        'proceso_actual' => null,
        'lote_id' => 1,
        'prenda_proceso_id' => 1
    ];

    $response = $this->postJson('api/prenda-lote', $prendaLote);
    $response->assertStatus(201);
});

test('PL04. Update PrendaLote', function () {
    PrendaLote::factory()->count(10)->create();
    PrendaProceso::factory()->count(10)->create();
    Lote::factory()->count(10)->create();

    $prendaLote = [
        'cantidad_prevista' => 10,
        'cantidad_proceso' => null,
        'cantidad_final' => null,
        'proceso_actual' => null,
        'lote_id' => 1,
        'prenda_proceso_id' => 1
    ];

    $response = $this->putJson('api/prenda-lote/1', $prendaLote);
    $response->assertStatus(200);
});

test('PL05. Delete PrendaLote', function () {
    PrendaLote::factory()->count(10)->create();

    $response = $this->deleteJson('api/prenda-lote/1');
    $response->assertStatus(200);
});