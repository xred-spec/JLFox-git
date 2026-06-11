<?php
use App\Models\Proceso;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('P01. Get Procesos', function () {
    Proceso::factory()->count(10)->create();

    $response = $this->getJson('api/procesos');
    $response->assertStatus(200);
});

test('P02. Search Proceso', function () {
    Proceso::factory()->count(10)->create();

    $response = $this->getJson('api/procesos/1');
    $response->assertStatus(200);
});

test('P03. Store Proceso', function () {
    $proceso = [
        'nombre' => 'Corte',
    ];

    $response = $this->postJson('api/procesos', $proceso);
    $response->assertStatus(201);
});

test('P04. Update Proceso', function () {
    Proceso::factory()->count(10)->create();
    $proceso = [
        'nombre' => 'Corte',
    ];

    $response = $this->putJson('api/procesos/1', $proceso);
    $response->assertStatus(200);
});

test('P05. Delete Proceso', function () {
    Proceso::factory()->count(10)->create();

    $response = $this->deleteJson('api/procesos/1');
    $response->assertStatus(200);
});