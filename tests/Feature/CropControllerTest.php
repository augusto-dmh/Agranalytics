<?php

use App\Models\Crop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{assertDatabaseEmpty, post, put, delete, assertDatabaseHas};

// Obs:
// If a test fails can be due to Model factory's wrong format - since the hidden data for the resource creation comes from there: attention!

uses(RefreshDatabase::class);

// Store //
//////////////////////////////////////////////////////////////
test('can crop be created with valid input', function () {
    $cropData = Crop::factory()->make(['name' => 'Corn'])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response
        ->assertRedirect(route('crops.edit', 1))
        ->assertSessionHas('success', 'Crop created successfully');
    assertDatabaseHas('crops', [
        'name' => 'Corn',
    ]);
});

test('cant crop be created without name', function () {
    $cropData = Crop::factory()->make(['name' => ''])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['name' => 'name is required.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with name not string', function () {
    $cropData = Crop::factory()->make(['name' => 123])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['name' => 'name must contain text.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with name greater than 255 characters', function () {
    $cropData = Crop::factory()->make(['name' => str_repeat('a', 256)])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['name' => 'name may not be greater than 255 characters.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created without scientific_name', function () {
    $cropData = Crop::factory()->make(['scientific_name' => ''])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['scientific_name' => 'scientific name is required.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with scientific_name greater than 255 characters', function () {
    $cropData = Crop::factory()->make(['scientific_name' => str_repeat('a', 256)])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['scientific_name' => 'scientific name may not be greater than 255 characters.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created without optimal_ph_min', function () {
    $cropData = Crop::factory()->make(['optimal_ph_min' => ''])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['optimal_ph_min' => 'optimal pH min is required.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with optimal_ph_min not numeric', function () {
    $cropData = Crop::factory()->make(['optimal_ph_min' => 'abc'])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['optimal_ph_min' => 'optimal pH min must be a number.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with optimal_ph_min beyond the allowed range', function () {
    // not informing greater optimal_ph_max => get the "lte" and "gte" errors
    $cropData = Crop::factory()->make(['optimal_ph_min' => 15, 'optimal_ph_max' => 16])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['optimal_ph_min' => 'optimal pH min must not be greater than 14.0.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created without optimal_ph_max', function () {
    $cropData = Crop::factory()->make(['optimal_ph_max' => ''])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['optimal_ph_max' => 'optimal pH max is required.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with optimal_ph_max not numeric', function () {
    $cropData = Crop::factory()->make(['optimal_ph_max' => 'abc'])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['optimal_ph_max' => 'optimal pH max must be a number.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with optimal_ph_max beyond the allowed range', function () {
    $cropData = Crop::factory()->make(['optimal_ph_max' => 15])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['optimal_ph_max' => 'optimal pH max must not be greater than 14.0.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created without water_requirement_per_season_in_mm', function () {
    $cropData = Crop::factory()->make(['water_requirement_per_season_in_mm' => ''])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['water_requirement_per_season_in_mm' => 'water requirement per season is required.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with water_requirement_per_season_in_mm not integer', function () {
    $cropData = Crop::factory()->make(['water_requirement_per_season_in_mm' => 'abc'])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['water_requirement_per_season_in_mm' => 'water requirement per season must be an integer.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with water_requirement_per_season_in_mm beyond the allowed range', function () {
    $cropData = Crop::factory()->make(['water_requirement_per_season_in_mm' => 70000])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['water_requirement_per_season_in_mm' => 'water requirement cannot be greater than 65535.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created without growth_duration_in_days', function () {
    $cropData = Crop::factory()->make(['growth_duration_in_days' => ''])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['growth_duration_in_days' => 'growth duration is required.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with growth_duration_in_days not integer', function () {
    $cropData = Crop::factory()->make(['growth_duration_in_days' => 'abc'])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['growth_duration_in_days' => 'growth duration must be an integer.']);
    assertDatabaseEmpty('crops');
});

test('cant crop be created with growth_duration_in_days beyond the allowed range', function () {
    $cropData = Crop::factory()->make(['growth_duration_in_days' => 300])->toArray();

    $response = post(route('crops.store'), $cropData);

    $response->assertSessionHasErrors(['growth_duration_in_days' => 'growth duration cannot be greater than 255.']);
    assertDatabaseEmpty('crops');
});
// Store //
//////////////////////////////////////////////////////////////


// Update //
//////////////////////////////////////////////////////////////
test('can crop be updated with valid input', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['name' => 'Updated Crop'])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Crop updated successfully']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'name' => 'Updated Crop',
    ]);
});

test('cant crop be updated without name', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['name' => ''])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['name' => 'name is required.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'name' => $crop->name,
    ]);
});

test('cant crop be updated with name not string', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['name' => 123])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['name' => 'name must contain text.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'name' => $crop->name,
    ]);
});

test('cant crop be updated with name greater than 255 characters', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['name' => str_repeat('a', 256)])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['name' => 'name may not be greater than 255 characters.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'name' => $crop->name,
    ]);
});

test('cant crop be updated without scientific_name', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['scientific_name' => ''])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['scientific_name' => 'scientific name is required.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'scientific_name' => $crop->scientific_name,
    ]);
});

test('cant crop be updated with scientific_name greater than 255 characters', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['scientific_name' => str_repeat('a', 256)])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['scientific_name' => 'scientific name may not be greater than 255 characters.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'scientific_name' => $crop->scientific_name,
    ]);
});

test('cant crop be updated without optimal_ph_min', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['optimal_ph_min' => ''])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['optimal_ph_min' => 'optimal pH min is required.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'optimal_ph_min' => $crop->optimal_ph_min,
    ]);
});

test('cant crop be updated with optimal_ph_min not numeric', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['optimal_ph_min' => 'abc'])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['optimal_ph_min' => 'optimal pH min must be a number.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'optimal_ph_min' => $crop->optimal_ph_min,
    ]);
});

test('cant crop be updated with optimal_ph_min beyond the allowed range', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['optimal_ph_min' => 15, 'optimal_ph_max' => 16])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['optimal_ph_min' => 'optimal pH min must not be greater than 14.0.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'optimal_ph_min' => $crop->optimal_ph_min,
    ]);
});

test('cant crop be updated without optimal_ph_max', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['optimal_ph_max' => ''])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['optimal_ph_max' => 'optimal pH max is required.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'optimal_ph_max' => $crop->optimal_ph_max,
    ]);
});

test('cant crop be updated with optimal_ph_max not numeric', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['optimal_ph_max' => 'abc'])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['optimal_ph_max' => 'optimal pH max must be a number.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'optimal_ph_max' => $crop->optimal_ph_max,
    ]);
});

test('cant crop be updated with optimal_ph_max beyond the allowed range', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['optimal_ph_max' => 15])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['optimal_ph_max' => 'optimal pH max must not be greater than 14.0.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'optimal_ph_max' => $crop->optimal_ph_max,
    ]);
});

test('cant crop be updated without water_requirement_per_season_in_mm', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['water_requirement_per_season_in_mm' => ''])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['water_requirement_per_season_in_mm' => 'water requirement per season is required.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'water_requirement_per_season_in_mm' => $crop->water_requirement_per_season_in_mm,
    ]);
});

test('cant crop be updated with water_requirement_per_season_in_mm not integer', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['water_requirement_per_season_in_mm' => 'abc'])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['water_requirement_per_season_in_mm' => 'water requirement per season must be an integer.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'water_requirement_per_season_in_mm' => $crop->water_requirement_per_season_in_mm,
    ]);
});

test('cant crop be updated with water_requirement_per_season_in_mm beyond the allowed range', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['water_requirement_per_season_in_mm' => 70000])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['water_requirement_per_season_in_mm' => 'water requirement cannot be greater than 65535.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'water_requirement_per_season_in_mm' => $crop->water_requirement_per_season_in_mm,
    ]);
});

test('cant crop be updated without growth_duration_in_days', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['growth_duration_in_days' => ''])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['growth_duration_in_days' => 'growth duration is required.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'growth_duration_in_days' => $crop->growth_duration_in_days,
    ]);
});

test('cant crop be updated with growth_duration_in_days not integer', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['growth_duration_in_days' => 'abc'])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['growth_duration_in_days' => 'growth duration must be an integer.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'growth_duration_in_days' => $crop->growth_duration_in_days,
    ]);
});

test('cant crop be updated with growth_duration_in_days beyond the allowed range', function () {
    $crop = Crop::factory()->create();
    $updateData = Crop::factory()->make(['growth_duration_in_days' => 300])->toArray();

    $response = put(route('crops.update', $crop), $updateData);

    $response->assertSessionHasErrors(['growth_duration_in_days' => 'growth duration cannot be greater than 255.']);
    assertDatabaseHas('crops', [
        'id' => $crop->id,
        'growth_duration_in_days' => $crop->growth_duration_in_days,
    ]);
});
// Update //
//////////////////////////////////////////////////////////////


// Destroy //
//////////////////////////////////////////////////////////////
test('can crop be deleted with valid crop_id', function () {
    $crop = Crop::factory()->create();

    $response = delete(route('crops.destroy', $crop->id));

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Crop deleted successfully']);
    assertDatabaseEmpty('crops');
});
// Destroy //
//////////////////////////////////////////////////////////////
