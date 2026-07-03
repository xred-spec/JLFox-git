<?php
use App\Models\PrendaProceso;
use App\Models\Prenda;
use App\Models\Proceso;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('PP01. Get PrendasProcesos', function () {
    PrendaProceso::factory()->count(10)->create();

    $response = $this->getJson('api/prendas-procesos/procesos');
    $response->assertStatus(200);
});

test('PP02. Search PrendaProceso', function () {
    PrendaProceso::factory()->count(10)->create();

    $response = $this->getJson('api/prendas-procesos/1');
    $response->assertStatus(200);
});

test('PP03. Store PrendaProceso', function () {
    Prenda::factory()->count(10)->create();
    Proceso::factory()->count(10)->create();

    $prendaProceso = [
        'prenda_id' => 1,
        'procesos' => [1,3,5]
    ];

    $response = $this->postJson('api/prendas-procesos', $prendaProceso);
    $response->assertStatus(201);
});

