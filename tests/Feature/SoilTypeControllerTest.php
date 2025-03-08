<?php

use App\Models\SoilType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{assertDatabaseCount, assertDatabaseEmpty, post, put, delete, assertDatabaseHas};

uses(RefreshDatabase::class);

// Obs:
// If a test fails can be due to Model factory's wrong format - since the hidden data for the resource creation comes from there: attention!

// Store //
//////////////////////////////////////////////////////////////
test('can soil type be created with valid input', function () {
    $soilTypeData = SoilType::factory()->make(['name' => 'Loamy Soil'])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Soil type created successfully']);
    assertDatabaseHas('soil_types', [
        'name' => 'Loamy Soil',
    ]);
});

test('cant soil type be created without name', function () {
    $soilTypeData = SoilType::factory()->make(['name' => ''])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['name' => 'name is required.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with name greater than 255 characters', function () {
    $soilTypeData = SoilType::factory()->make(['name' => str_repeat('a', 256)])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['name' => 'name may not be greater than 255 characters.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created without description', function () {
    $soilTypeData = SoilType::factory()->make(['description' => ''])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['description' => 'description is required.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created without ph_min', function () {
    $soilTypeData = SoilType::factory()->make(['ph_min' => ''])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['ph_min' => 'pH minimum value is required.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with ph_min not numeric', function () {
    $soilTypeData = SoilType::factory()->make(['ph_min' => 'not-a-number'])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['ph_min' => 'pH minimum value must be a number.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with ph_min less than 0', function () {
    $soilTypeData = SoilType::factory()->make(['ph_min' => -1])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['ph_min' => 'pH minimum value must be at least 0.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with ph_min greater than 14', function () {
    $soilTypeData = SoilType::factory()->make(['ph_min' => 15])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['ph_min' => 'pH minimum value may not be greater than 14.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with ph_min greater than ph_max', function () {
    $soilTypeData = SoilType::factory()->make(['ph_min' => 7.5, 'ph_max' => 6.0])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['ph_min' => 'pH minimum value must be less than or equal to pH maximum value.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created without ph_max', function () {
    $soilTypeData = SoilType::factory()->make(['ph_max' => ''])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['ph_max' => 'pH maximum value is required.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with ph_max not numeric', function () {
    $soilTypeData = SoilType::factory()->make(['ph_max' => 'not-a-number'])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['ph_max' => 'pH maximum value must be a number.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with ph_max less than 0', function () {
    $soilTypeData = SoilType::factory()->make(['ph_max' => -1])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['ph_max' => 'pH maximum value must be at least 0.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with ph_max greater than 14', function () {
    $soilTypeData = SoilType::factory()->make(['ph_max' => 15])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['ph_max' => 'pH maximum value may not be greater than 14.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created without organic_matter_percentage', function () {
    $soilTypeData = SoilType::factory()->make(['organic_matter_percentage' => ''])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['organic_matter_percentage' => 'organic matter percentage is required.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with organic_matter_percentage not numeric', function () {
    $soilTypeData = SoilType::factory()->make(['organic_matter_percentage' => 'not-a-number'])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['organic_matter_percentage' => 'organic matter percentage must be a number.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with organic_matter_percentage less than 0', function () {
    $soilTypeData = SoilType::factory()->make(['organic_matter_percentage' => -1])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['organic_matter_percentage' => 'organic matter percentage must be at least 0.']);
    assertDatabaseEmpty('soil_types');
});

test('cant soil type be created with organic_matter_percentage greater than 100', function () {
    $soilTypeData = SoilType::factory()->make(['organic_matter_percentage' => 101])->toArray();

    $response = post(route('soil_types.store'), $soilTypeData);

    $response->assertSessionHasErrors(['organic_matter_percentage' => 'organic matter percentage may not be greater than 100.']);
    assertDatabaseEmpty('soil_types');
});
// Store //
//////////////////////////////////////////////////////////////


// Update //
//////////////////////////////////////////////////////////////
test('can soil type be updated with valid input', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['name' => 'Updated Soil Type'])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Soil type updated successfully']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'name' => 'Updated Soil Type',
    ]);
});

test('cant soil type be updated without name', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['name' => ''])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['name' => 'name is required.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'name' => $soilType->name,
    ]);
});

test('cant soil type be updated with name greater than 255 characters', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['name' => str_repeat('a', 256)])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['name' => 'name may not be greater than 255 characters.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'name' => $soilType->name,
    ]);
});

test('cant soil type be updated without description', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['description' => ''])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['description' => 'description is required.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'description' => $soilType->description,
    ]);
});

test('cant soil type be updated without ph_min', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['ph_min' => ''])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['ph_min' => 'pH minimum value is required.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'ph_min' => $soilType->ph_min,
    ]);
});

test('cant soil type be updated with ph_min not numeric', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['ph_min' => 'not-a-number'])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['ph_min' => 'pH minimum value must be a number.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'ph_min' => $soilType->ph_min,
    ]);
});

test('cant soil type be updated with ph_min less than 0', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['ph_min' => -1])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['ph_min' => 'pH minimum value must be at least 0.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'ph_min' => $soilType->ph_min,
    ]);
});

test('cant soil type be updated with ph_min greater than 14', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['ph_min' => 15])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['ph_min' => 'pH minimum value may not be greater than 14.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'ph_min' => $soilType->ph_min,
    ]);
});

test('cant soil type be updated with ph_min greater than ph_max', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['ph_min' => 8.0, 'ph_max' => 7.0])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['ph_min' => 'pH minimum value must be less than or equal to pH maximum value.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'ph_min' => $soilType->ph_min,
    ]);
});

test('cant soil type be updated without ph_max', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['ph_max' => ''])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['ph_max' => 'pH maximum value is required.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'ph_max' => $soilType->ph_max,
    ]);
});

test('cant soil type be updated with ph_max not numeric', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['ph_max' => 'not-a-number'])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['ph_max' => 'pH maximum value must be a number.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'ph_max' => $soilType->ph_max,
    ]);
});

test('cant soil type be updated with ph_max less than 0', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['ph_max' => -1])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['ph_max' => 'pH maximum value must be at least 0.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'ph_max' => $soilType->ph_max,
    ]);
});

test('cant soil type be updated with ph_max greater than 14', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['ph_max' => 15])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['ph_max' => 'pH maximum value may not be greater than 14.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'ph_max' => $soilType->ph_max,
    ]);
});

test('cant soil type be updated without organic_matter_percentage', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['organic_matter_percentage' => ''])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['organic_matter_percentage' => 'organic matter percentage is required.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'organic_matter_percentage' => $soilType->organic_matter_percentage,
    ]);
});

test('cant soil type be updated with organic_matter_percentage not numeric', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['organic_matter_percentage' => 'not-a-number'])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['organic_matter_percentage' => 'organic matter percentage must be a number.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'organic_matter_percentage' => $soilType->organic_matter_percentage,
    ]);
});

test('cant soil type be updated with organic_matter_percentage less than 0', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['organic_matter_percentage' => -1])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['organic_matter_percentage' => 'organic matter percentage must be at least 0.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'organic_matter_percentage' => $soilType->organic_matter_percentage,
    ]);
});

test('cant soil type be updated with organic_matter_percentage greater than 100', function () {
    $soilType = SoilType::factory()->create();
    $updateData = SoilType::factory()->make(['organic_matter_percentage' => 101])->toArray();

    $response = put(route('soil_types.update', $soilType), $updateData);

    $response->assertSessionHasErrors(['organic_matter_percentage' => 'organic matter percentage may not be greater than 100.']);
    assertDatabaseHas('soil_types', [
        'id' => $soilType->id,
        'organic_matter_percentage' => $soilType->organic_matter_percentage,
    ]);
});
// Update //
//////////////////////////////////////////////////////////////


// Destroy //
//////////////////////////////////////////////////////////////
test('can soil type be deleted with valid soil_type_id', function () {
    $soilType = SoilType::factory()->create();

    $response = delete(route('soil_types.destroy', $soilType->id));

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Soil type deleted successfully']);
    assertDatabaseEmpty('soil_types');
});
// Destroy //
//////////////////////////////////////////////////////////////
