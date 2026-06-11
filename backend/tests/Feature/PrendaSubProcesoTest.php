<?php
use App\Models\PrendaSubProceso;
use App\Models\PrendaProceso;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('PSP01. Get PrendasSubProcesos', function () {
    PrendaSubProceso::factory()->count(10)->create();

    $response = $this->getJson('api/prendas-sub-procesos');
    $response->assertStatus(200);
});

test('PSP02. Search PrendaSubProceso', function () {
    PrendaSubProceso::factory()->count(10)->create();

    $response = $this->getJson('api/prendas-sub-procesos/1');
    $response->assertStatus(200);
});

test('PSP03. Store PrendaSubProceso', function () {
    PrendaProceso::factory()->count(10)->create();

    $prendaSubProceso = [
        'nombre' => 'Corte mangas',
        'prenda_proceso_id' => 1
    ];

    $response = $this->postJson('api/prendas-sub-procesos', $prendaSubProceso);
    $response->assertStatus(201);
});

test('PSP04. Update PrendaSubProceso', function () {
    PrendaSubProceso::factory()->count(10)->create();
    PrendaProceso::factory()->count(10)->create();

    $prendaSubProceso = [
        'nombre' => 'Corte mangas',
        'prenda_proceso_id' => 1,
    ];

    $response = $this->putJson('api/prendas-sub-procesos/1', $prendaSubProceso);
    $response->assertStatus(200);
});

test('PSP05. Delete PrendaSubProceso', function () {
    PrendaSubProceso::factory()->count(10)->create();

    $response = $this->deleteJson('api/prendas-sub-procesos/1');
    $response->assertStatus(200);
});