<?php

use App\Models\IrrigationMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{assertDatabaseEmpty, post, put, delete, assertDatabaseHas};

uses(RefreshDatabase::class);

// Obs:
// If a test fails can be due to Model factory's wrong format - since the hidden data for the resource creation comes from there: attention!

// Store //
//////////////////////////////////////////////////////////////
test('can irrigation method be created with valid input', function () {
    $irrigationMethodData = IrrigationMethod::factory()->make(['name' => 'Drip Irrigation'])->toArray();

    $response = post(route('irrigation_methods.store'), $irrigationMethodData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Irrigation method created successfully']);
    assertDatabaseHas('irrigation_methods', [
        'name' => 'Drip Irrigation',
    ]);
});

test('cant irrigation method be created without name', function () {
    $irrigationMethodData = IrrigationMethod::factory()->make(['name' => ''])->toArray();

    $response = post(route('irrigation_methods.store'), $irrigationMethodData);

    $response->assertSessionHasErrors(['name' => 'name is required.']);
    assertDatabaseEmpty('irrigation_methods');
});

test('cant irrigation method be created with name greater than 255 characters', function () {
    $irrigationMethodData = IrrigationMethod::factory()->make(['name' => str_repeat('a', 256)])->toArray();

    $response = post(route('irrigation_methods.store'), $irrigationMethodData);

    $response->assertSessionHasErrors(['name' => 'name may not be greater than 255 characters.']);
    assertDatabaseEmpty('irrigation_methods');
});

test('cant irrigation method be created without description', function () {
    $irrigationMethodData = IrrigationMethod::factory()->make(['description' => ''])->toArray();

    $response = post(route('irrigation_methods.store'), $irrigationMethodData);

    $response->assertSessionHasErrors(['description' => 'description is required.']);
    assertDatabaseEmpty('irrigation_methods');
});

test('cant irrigation method be created without efficiency', function () {
    $irrigationMethodData = IrrigationMethod::factory()->make(['efficiency' => ''])->toArray();

    $response = post(route('irrigation_methods.store'), $irrigationMethodData);

    $response->assertSessionHasErrors(['efficiency' => 'efficiency is required.']);
    assertDatabaseEmpty('irrigation_methods');
});

test('cant irrigation method be created with efficiency not numeric', function () {
    $irrigationMethodData = IrrigationMethod::factory()->make(['efficiency' => 'not-a-number'])->toArray();

    $response = post(route('irrigation_methods.store'), $irrigationMethodData);

    $response->assertSessionHasErrors(['efficiency' => 'efficiency must be a number.']);
    assertDatabaseEmpty('irrigation_methods');
});

test('cant irrigation method be created with efficiency less than 0', function () {
    $irrigationMethodData = IrrigationMethod::factory()->make(['efficiency' => -1])->toArray();

    $response = post(route('irrigation_methods.store'), $irrigationMethodData);

    $response->assertSessionHasErrors(['efficiency' => 'efficiency must be at least 0.']);
    assertDatabaseEmpty('irrigation_methods');
});

test('cant irrigation method be created with efficiency greater than 100', function () {
    $irrigationMethodData = IrrigationMethod::factory()->make(['efficiency' => 101])->toArray();

    $response = post(route('irrigation_methods.store'), $irrigationMethodData);

    $response->assertSessionHasErrors(['efficiency' => 'efficiency may not be greater than 100.']);
    assertDatabaseEmpty('irrigation_methods');
});
// Store //
//////////////////////////////////////////////////////////////


// Update //
//////////////////////////////////////////////////////////////
test('can irrigation method be updated with valid input', function () {
    $irrigationMethod = IrrigationMethod::factory()->create();
    $updateData = IrrigationMethod::factory()->make(['name' => 'Updated Irrigation Method'])->toArray();

    $response = put(route('irrigation_methods.update', $irrigationMethod), $updateData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Irrigation method updated successfully']);
    assertDatabaseHas('irrigation_methods', [
        'id' => $irrigationMethod->id,
        'name' => 'Updated Irrigation Method',
    ]);
});

test('cant irrigation method be updated without name', function () {
    $irrigationMethod = IrrigationMethod::factory()->create();
    $updateData = IrrigationMethod::factory()->make(['name' => ''])->toArray();

    $response = put(route('irrigation_methods.update', $irrigationMethod), $updateData);

    $response->assertSessionHasErrors(['name' => 'name is required.']);
    assertDatabaseHas('irrigation_methods', [
        'id' => $irrigationMethod->id,
        'name' => $irrigationMethod->name,
    ]);
});

test('cant irrigation method be updated with name greater than 255 characters', function () {
    $irrigationMethod = IrrigationMethod::factory()->create();
    $updateData = IrrigationMethod::factory()->make(['name' => str_repeat('a', 256)])->toArray();

    $response = put(route('irrigation_methods.update', $irrigationMethod), $updateData);

    $response->assertSessionHasErrors(['name' => 'name may not be greater than 255 characters.']);
    assertDatabaseHas('irrigation_methods', [
        'id' => $irrigationMethod->id,
        'name' => $irrigationMethod->name,
    ]);
});

test('cant irrigation method be updated without description', function () {
    $irrigationMethod = IrrigationMethod::factory()->create();
    $updateData = IrrigationMethod::factory()->make(['description' => ''])->toArray();

    $response = put(route('irrigation_methods.update', $irrigationMethod), $updateData);

    $response->assertSessionHasErrors(['description' => 'description is required.']);
    assertDatabaseHas('irrigation_methods', [
        'id' => $irrigationMethod->id,
        'description' => $irrigationMethod->description,
    ]);
});

test('cant irrigation method be updated without efficiency', function () {
    $irrigationMethod = IrrigationMethod::factory()->create();
    $updateData = IrrigationMethod::factory()->make(['efficiency' => ''])->toArray();

    $response = put(route('irrigation_methods.update', $irrigationMethod), $updateData);

    $response->assertSessionHasErrors(['efficiency' => 'efficiency is required.']);
    assertDatabaseHas('irrigation_methods', [
        'id' => $irrigationMethod->id,
        'efficiency' => $irrigationMethod->efficiency,
    ]);
});

test('cant irrigation method be updated with efficiency not numeric', function () {
    $irrigationMethod = IrrigationMethod::factory()->create();
    $updateData = IrrigationMethod::factory()->make(['efficiency' => 'not-a-number'])->toArray();

    $response = put(route('irrigation_methods.update', $irrigationMethod), $updateData);

    $response->assertSessionHasErrors(['efficiency' => 'efficiency must be a number.']);
    assertDatabaseHas('irrigation_methods', [
        'id' => $irrigationMethod->id,
        'efficiency' => $irrigationMethod->efficiency,
    ]);
});

test('cant irrigation method be updated with efficiency less than 0', function () {
    $irrigationMethod = IrrigationMethod::factory()->create();
    $updateData = IrrigationMethod::factory()->make(['efficiency' => -1])->toArray();

    $response = put(route('irrigation_methods.update', $irrigationMethod), $updateData);

    $response->assertSessionHasErrors(['efficiency' => 'efficiency must be at least 0.']);
    assertDatabaseHas('irrigation_methods', [
        'id' => $irrigationMethod->id,
        'efficiency' => $irrigationMethod->efficiency,
    ]);
});

test('cant irrigation method be updated with efficiency greater than 100', function () {
    $irrigationMethod = IrrigationMethod::factory()->create();
    $updateData = IrrigationMethod::factory()->make(['efficiency' => 101])->toArray();

    $response = put(route('irrigation_methods.update', $irrigationMethod), $updateData);

    $response->assertSessionHasErrors(['efficiency' => 'efficiency may not be greater than 100.']);
    assertDatabaseHas('irrigation_methods', [
        'id' => $irrigationMethod->id,
        'efficiency' => $irrigationMethod->efficiency,
    ]);
});
// Update //
//////////////////////////////////////////////////////////////


// Destroy //
//////////////////////////////////////////////////////////////
test('can irrigation method be deleted with valid irrigation_method_id', function () {
    $irrigationMethod = IrrigationMethod::factory()->create();

    $response = delete(route('irrigation_methods.destroy', $irrigationMethod->id));

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Irrigation method deleted successfully']);
    assertDatabaseEmpty('irrigation_methods');
});
// Destroy //
//////////////////////////////////////////////////////////////
