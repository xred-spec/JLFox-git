<?php
use App\Models\Lote;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('L01. Get Lotes', function () {
    Lote::factory()->count(10)->create();

    $response = $this->getJson('api/lotes');
    $response->assertStatus(200);
});

test('L02. Search Lote', function () {
    Lote::factory()->count(10)->create();

    $response = $this->getJson('api/lotes/1');
    $response->assertStatus(200);
});

test('L03. Store Lote', function () {
    $lote = [
        'estado' => 'pendiente',
        'fecha_inicio' => '2026-07-07 18:00:00',
        'fecha_final' => '2026-07-07 18:00:00',
    ];

    $response = $this->postJson('api/lotes', $lote);
    $response->assertStatus(201);
});

test('L04. Update Lote', function () {
    Lote::factory()->count(10)->create(); 

    $lote = [
        'estado' => 'pendiente',
        'fecha_inicio' => '2026-07-07 18:00:00',
        'fecha_final' => '2026-07-07 18:00:00',
    ];

    $response = $this->putJson('api/lotes/1', $lote);
    $response->assertStatus(200);
});

test('L05. Delete Lote', function () {
    Lote::factory()->count(10)->create();

    $response = $this->deleteJson('api/lotes/1');
    $response->assertStatus(200);
});