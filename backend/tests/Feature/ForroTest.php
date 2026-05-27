<?php
use App\Models\Forro;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('F01. Get Forros', function () {
    Forro::factory()->count(10)->create();

    $response = $this->getJson('api/forros');
    $response->assertStatus(200);
});

test('F02. Search Forro', function () {
    Forro::factory()->count(10)->create();

    $response = $this->getJson('api/forros/1');
    $response->assertStatus(200);
});

test('F03. Store Forro', function () {
    Forro::factory()->count(10)->create();
    $forro = [
        'color' => 'Rojo'
    ];

    $response = $this->postJson('api/forros', $forro);
    $response->assertStatus(201);
});

test('F04. Update Forro', function () {
    Forro::factory()->count(10)->create();
    $forro = [
        'color' => 'Rojo'
    ];

    $response = $this->putJson('api/forros/1', $forro);
    $response->assertStatus(200);
});

test('F05. Delete Forro', function () {
    Forro::factory()->count(10)->create();

    $response = $this->deleteJson('api/forros/1');
    $response->assertStatus(200);
});