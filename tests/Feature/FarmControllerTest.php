<?php

use App\Models\Crop;
use App\Models\Farm;
use App\Models\Farmer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{assertDatabaseCount, assertDatabaseEmpty, post, put, delete, assertDatabaseHas};

// Obs:
// If a test fails can be due to Model factory's wrong format - since the hidden data for the resource creation comes from there: attention!

uses(RefreshDatabase::class);

// Store //
//////////////////////////////////////////////////////////////
test('can farm be created with valid input', function () {
    $farmData = Farm::factory()->make(['name' => "Beacher's Ranch"])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Farm created successfully']);
    assertDatabaseHas('farms', [
        'name' => "Beacher's Ranch",
    ]);
});

test('cant farm be created without name', function () {
    $farmData = Farm::factory()->make(['name' => ''])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['name' => 'name is required.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created with name not string', function () {
    $farmData = Farm::factory()->make(['name' => 123])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['name' => 'name must contain text.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created with name greater than 255 characters', function () {
    $farmData = Farm::factory()->make(['name' => str_repeat('a', 256)])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['name' => 'name may not be greater than 255 characters.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created without address', function () {
    $farmData = Farm::factory()->make(['address' => ''])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['address' => 'address is required.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created with address greater than 255 characters', function () {
    $farmData = Farm::factory()->make(['address' => str_repeat('a', 256)])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['address' => 'address may not be greater than 255 characters.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created without size_in_ha', function () {
    $farmData = Farm::factory()->make(['size_in_ha' => ''])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['size_in_ha' => 'size is required.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created with size_in_ha not numeric', function () {
    $farmData = Farm::factory()->make(['size_in_ha' => 'asdw'])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['size_in_ha' => 'size must be a number.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created with size_in_ha beyond the allowed range', function () {
    $farmData = Farm::factory()->make(['size_in_ha' => 1234567.12])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['size_in_ha' => 'size must be between 0 and 999999.99.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created without a soil_type', function () {
    $farmData = Farm::factory()->make(['soil_type_id' => ''])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['soil_type_id' => 'soil type is required.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created with an invalid soil_type', function () {
    $farmData = Farm::factory()->make(['soil_type_id' => 123123])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['soil_type_id' => 'selected soil type is invalid.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created without a irrigation_method', function () {
    $farmData = Farm::factory()->make(['irrigation_method_id' => ''])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['irrigation_method_id' => 'irrigation method is required.']);
    assertDatabaseEmpty('farms');
});

test('cant farm be created with an invalid irrigation_method', function () {
    $farmData = Farm::factory()->make(['irrigation_method_id' => 123123])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['irrigation_method_id' => 'selected irrigation method is invalid.']);
    assertDatabaseEmpty('farms');
});

test('can farm be created with valid crops', function () {
    $crop = Crop::factory()->create();
    $farmData = array_merge(Farm::factory()->make()->toArray(), ['crop_id' => [$crop->id]]);

    $response = post(route('farms.store'), $farmData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Farm created successfully']);
    assertDatabaseHas('crop_farm', [
        'farm_id' => 1,
        'crop_id' => 1,
    ]);
});

test('can farm be created without crops', function () {
    $farmData = Farm::factory()->make(["name" => "Beacher's Ranch"])->toArray();

    $response = post(route('farms.store'), $farmData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Farm created successfully']);
    assertDatabaseHas('farms', [
        "name" => "Beacher's Ranch"
    ]);
});

test('cant farm be created with invalid crops', function () {
    $farmData = array_merge(Farm::factory()->make()->toArray(), ['crop_id' => [123]]);

    $response = post(route('farms.store'), $farmData);

    $response->assertSessionHasErrors(['crop_id.0' => 'crop of position #1 is invalid.']);
    assertDatabaseEmpty('farms');
});
// Store //
//////////////////////////////////////////////////////////////


// Update //
//////////////////////////////////////////////////////////////
test('can farm be updated with valid input', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['name' => "Updated Ranch"])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Farm updated successfully']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'name' => "Updated Ranch",
    ]);
});

test('cant farm be updated without name', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['name' => ''])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['name' => 'name is required.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'name' => $farm->name,
    ]);
});

test('cant farm be updated with name not string', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['name' => 123])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['name' => 'name must contain text.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'name' => $farm->name,
    ]);
});

test('cant farm be updated with name greater than 255 characters', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['name' => str_repeat('a', 256)])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['name' => 'name may not be greater than 255 characters.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'name' => $farm->name,
    ]);
});

test('cant farm be updated without address', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['address' => ''])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['address' => 'address is required.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'address' => $farm->address,
    ]);
});

test('cant farm be updated with address greater than 255 characters', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['address' => str_repeat('a', 256)])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['address' => 'address may not be greater than 255 characters.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'address' => $farm->address,
    ]);
});

test('cant farm be updated without size_in_ha', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['size_in_ha' => ''])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['size_in_ha' => 'size is required.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'size_in_ha' => $farm->size_in_ha,
    ]);
});

test('cant farm be updated with size_in_ha not numeric', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['size_in_ha' => 'asdw'])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['size_in_ha' => 'size must be a number.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'size_in_ha' => $farm->size_in_ha,
    ]);
});

test('cant farm be updated with size_in_ha beyond the allowed range', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['size_in_ha' => 1234567.12])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['size_in_ha' => 'size must be between 0 and 999999.99.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'size_in_ha' => $farm->size_in_ha,
    ]);
});

test('cant farm be updated without a soil_type', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['soil_type_id' => ''])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['soil_type_id' => 'soil type is required.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'soil_type_id' => $farm->soil_type_id,
    ]);
});

test('cant farm be updated with an invalid soil_type', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['soil_type_id' => 123123])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['soil_type_id' => 'selected soil type is invalid.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'soil_type_id' => $farm->soil_type_id,
    ]);
});

test('cant farm be updated without an irrigation_method', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['irrigation_method_id' => ''])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['irrigation_method_id' => 'irrigation method is required.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'irrigation_method_id' => $farm->irrigation_method_id,
    ]);
});

test('cant farm be updated with an invalid irrigation_method', function () {
    $farm = Farm::factory()->create();
    $updateData = Farm::factory()->make(['irrigation_method_id' => 123123])->toArray();

    $response = put(route('farms.update', $farm), $updateData);

    $response->assertSessionHasErrors(['irrigation_method_id' => 'selected irrigation method is invalid.']);
    assertDatabaseHas('farms', [
        'id' => $farm->id,
        'irrigation_method_id' => $farm->irrigation_method_id,
    ]);
});

test('can farm when updated synchronize valid crops correctly', function () {
    $farm = Farm::factory()->create();
    $cropToLoseAssociation = Crop::factory()->create();
    $farm->crops()->attach($cropToLoseAssociation->id);
    $cropToAssociate = Crop::factory()->create();
    $farmData = array_merge(Farm::factory()->make()->toArray(), ['crop_id' => [$cropToAssociate->id]]);

    $response = put(route('farms.update', $farm), $farmData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Farm updated successfully']);
    assertDatabaseHas('crop_farm', [
        'farm_id' => 1,
        'crop_id' => 2,
    ]);
    assertDatabaseCount('crop_farm', 1);
});

test('cant farm be updated with invalid crops', function () {
    $farm = Farm::factory()->create();
    $farmData = array_merge(Farm::factory()->make()->toArray(), ['crop_id' => [123]]);

    $response = put(route('farms.update', $farm), $farmData);

    $response->assertSessionHasErrors(['crop_id.0' => 'crop of position #1 is invalid.']);
    assertDatabaseEmpty('crop_farm');
});
// Update //
//////////////////////////////////////////////////////////////


// Destroy //
//////////////////////////////////////////////////////////////
test('can farm be deleted with valid farm_id', function () {
    $farm = Farm::factory()->create();

    $response = delete(route('farms.destroy', $farm->id));

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Farm deleted successfully']);
    assertDatabaseEmpty('farms');
});
// Destroy //
//////////////////////////////////////////////////////////////
