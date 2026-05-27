<?php
use App\Models\Bordado;
use App\Models\ColorHilo;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('B01. Get Bordados', function () {
    Bordado::factory()->count(10)->create();

    $response = $this->getJson('api/bordados');
    $response->assertStatus(200);
});

test('B02. Search Bordado', function () {
    Bordado::factory()->count(10)->create();

    $response = $this->getJson('api/bordados/1');
    $response->assertStatus(200);
});

test('B03. Store Bordado', function () {
    ColorHilo::factory()->count(10)->create();
    $bordado = [
        'forma' => 'Corazón',
        'color_hilo_id' => 1,
    ];

    $response = $this->postJson('api/bordados', $bordado);
    $response->assertStatus(201);
});

test('B04. Update Bordado', function () {
    ColorHilo::factory()->count(10)->create();
    Bordado::factory()->count(10)->create();
    $bordado = [
        'forma' => 'Corazón',
        'color_hilo_id' => 1,
    ];

    $response = $this->putJson('api/bordados/1', $bordado);
    $response->assertStatus(200);
});

test('B05. Delete Bordado', function () {
    Bordado::factory()->count(10)->create();

    $response = $this->deleteJson('api/bordados/1');
    $response->assertStatus(200);
});