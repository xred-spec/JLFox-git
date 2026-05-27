<?php
use App\Models\ColorHilo;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('CH01. Get ColoresHilo', function () {
    ColorHilo::factory()->count(10)->create();

    $response = $this->getJson('api/colores-hilo');
    $response->assertStatus(200);
});

test('CH02. Search ColorHilo', function () {
    ColorHilo::factory()->count(10)->create();

    $response = $this->getJson('api/colores-hilo/1');
    $response->assertStatus(200);
});

test('CH03. Store ColorHilo', function () {
    $colorHilo = [
        'color' => 'Vino',
    ];

    $response = $this->postJson('api/colores-hilo', $colorHilo);
    $response->assertStatus(201);
});

test('CH04. Update ColorHilo', function () {
    ColorHilo::factory()->count(10)->create();
    $colorHilo = [
        'color' => 'Dorado',
    ];

    $response = $this->putJson('api/colores-hilo/1', $colorHilo);
    $response->assertStatus(200);
});

test('CH05. Delete ColorHilo', function () {
    ColorHilo::factory()->count(10)->create();

    $response = $this->deleteJson('api/colores-hilo/1');
    $response->assertStatus(200);
});