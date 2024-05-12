<?php

use App\Models\Heartbeat;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a heartbeat with valid data', function () {
    $data = [
        'device_id' => 1,
        'device_time' => '2023-05-10T12:00:00+00:00',
        'status' => 'operational'
    ];

    $response = $this->postJson('/api/heartbeat', $data);

    $response->assertCreated();
    $this->assertDatabaseHas('heartbeats', $data);
});

it('fails to create a heartbeat without required fields', function () {
    $data = [
        'device_time' => '2023-05-10T12:00:00+00:00',
        'status' => 'operational'
    ];

    $response = $this->postJson('/api/heartbeat', $data);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['device_id']);
});
