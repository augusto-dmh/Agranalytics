<?php

use App\Models\Farmer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{assertDatabaseCount, assertDatabaseEmpty, post, put, delete, assertDatabaseHas};

uses(RefreshDatabase::class);

// Obs:

// If a test fails can be due to Model factory's wrong format - since the hidden data for the resource creation comes from there: attention!
// - If a test fails can be due to Model factory's wrong format - since the hidden data for the resource creation comes from there: attention!
// - The second array in $farmerData should gather only payload data not part of the model instance (e.g: `password_confirmation`),
//   but it brings also `password` to override the hash assigned to it after method `toArray` gets called
//   (password gets hashed before converted to json or array due to configuration in Farmer model).

// Store //
//////////////////////////////////////////////////////////////
test('can farmer be created with valid input', function () {
    $farmerData = array_merge(
        Farmer::factory()->make(['full_name' => 'Christopher Nolan'])->makeVisible('password')->toArray(),
        ['password' => 'Password123!', 'password_confirmation' => 'Password123!'],
    );

    $response = post(route('farmers.store'), $farmerData);
    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Farmer created successfully']);
    assertDatabaseHas('farmers', [
        'full_name' => 'Christopher Nolan',
    ]);
});

test('cant farmer be created without full_name', function () {
    $farmerData = array_merge(
        Farmer::factory()->make(['full_name' => ''])->makeVisible('password')->toArray(),
        ['password' => 'Password123!', 'password_confirmation' => 'Password123!'],
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['full_name' => 'full name is required.']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with full_name not string', function () {
    $farmerData = array_merge(
        Farmer::factory()->make(['full_name' => ['awdawd']])->makeVisible('password')->toArray(),
        ['password' => 'Password123!', 'password_confirmation' => 'Password123!'],
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['full_name' => 'full name must contain text.']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with full_name greater than 255 characters', function () {
    $farmerData = array_merge(
        Farmer::factory()->make(['full_name' => str_repeat('a', 256)])->makeVisible('password')->toArray(),
        ['password' => 'Password123!', 'password_confirmation' => 'Password123!'],
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['full_name' => 'full name must not be greater than 255 characters.']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created without phone_number', function () {
    $farmerData = array_merge(
        Farmer::factory()->make(['phone_number' => ''])->makeVisible('password')->toArray(),
        ['password' => 'Password123!', 'password_confirmation' => 'Password123!'],
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['phone_number' => 'phone number is required.']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with phone_number not string', function () {
    $farmerData = array_merge(
        Farmer::factory()->make(['phone_number' => ['awdawd']])->makeVisible('password')->toArray(),
        ['password' => 'Password123!', 'password_confirmation' => 'Password123!'],
    );
    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['phone_number' => 'phone number must contain text.']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with invalid phone_number format', function () {
    $farmerData = array_merge(
        Farmer::factory()->make(['phone_number' => '1234567890'])->makeVisible('password')->toArray(),
        ['password' => 'Password123!', 'password_confirmation' => 'Password123!'],
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['phone_number' => 'phone number should be in format (999) 999-9999']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created without email', function () {
    $farmerData = array_merge(
        Farmer::factory()->make(['email' => ''])->makeVisible('password')->toArray(),
        ['password' => 'Password123!', 'password_confirmation' => 'Password123!'],
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['email' => 'email is required.']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with invalid email format', function () {
    $farmerData = array_merge(
        Farmer::factory()->make(['email' => 'invalid-email'])->makeVisible('password')->toArray(),
        ['password' => 'Password123!', 'password_confirmation' => 'Password123!'],
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['email' => 'invalid email. try another.']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with duplicate email', function () {
    $existingFarmer = Farmer::factory()->create();
    $farmerData = array_merge(
        Farmer::factory()->make(['email' => $existingFarmer->email])->makeVisible('password')->toArray(),
        ['password' => 'Password123!', 'password_confirmation' => 'Password123!'],
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['email' => 'email already in use. try another.']);
    assertDatabaseCount('farmers', 1);
});

test('cant farmer be created without password', function () {
    $farmerData = array_merge(
        Farmer::factory()->make()->toArray(),
        ['password' => '', 'password_confirmation' => '']
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['password' => 'password is required.']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with password less than 8 characters', function () {
    $farmerData = array_merge(
        Farmer::factory()->make()->makeVisible('password')->toArray(),
        ['password' => 'short',  'password_confirmation' => 'short']
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['password' => 'password must be at least 8 characters.']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with password without letters', function () {
    $farmerData = array_merge(
        Farmer::factory()->make()->makeVisible('password')->toArray(),
        ['password' => '12345678', 'password_confirmation' => '12345678']
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['password' => 'The password must contain at least one letter']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with password without numbers', function () {
    $farmerData = array_merge(
        Farmer::factory()->make()->makeVisible('password')->toArray(),
        ['password' => 'password', 'password_confirmation' => 'password']
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['password' => 'The password must contain at least one number']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with password without symbols', function () {
    $farmerData = array_merge(
        Farmer::factory()->make()->makeVisible('password')->toArray(),
        ['password'  => 'password1', 'password_confirmation' => 'password1']
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['password' => 'The password must contain at least one symbol']);
    assertDatabaseEmpty('farmers');
});

test('cant farmer be created with password confirmation mismatch', function () {
    $farmerData = array_merge(
        Farmer::factory()->make()->makeVisible('password')->toArray(),
        ['password' => 'Password1!', 'password_confirmation' => 'Password2!']
    );

    $response = post(route('farmers.store'), $farmerData);

    $response->assertSessionHasErrors(['password' => 'password confirmation does not match.']);
    assertDatabaseEmpty('farmers');
});
// Store //
//////////////////////////////////////////////////////////////


// Update //
//////////////////////////////////////////////////////////////
test('can farmer be updated with valid input', function () {
    $farmer = Farmer::factory()->create();
    $updateData = Farmer::factory()->make(['full_name' => 'Updated Name', 'password' => null, 'password_confirmation' => null])->toArray();

    $response = put(route('farmers.update', $farmer), $updateData);

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Farmer updated successfully']);
    assertDatabaseHas('farmers', [
        'id' => $farmer->id,
        'full_name' => 'Updated Name',
    ]);
});

test('cant farmer be updated without full_name', function () {
    $farmer = Farmer::factory()->create();
    $updateData = Farmer::factory()->make(['full_name' => ''])->toArray();

    $response = put(route('farmers.update', $farmer), $updateData);

    $response->assertSessionHasErrors(['full_name' => 'full name is required.']);
    assertDatabaseHas('farmers', [
        'id' => $farmer->id,
        'full_name' => $farmer->full_name,
    ]);
});

test('cant farmer be updated with full_name not string', function () {
    $farmer = Farmer::factory()->create(['full_name' => 'valid name']);
    $farmerData = array_merge(
        Farmer::factory()->make(['full_name' => ['awdawd']])->toArray(),
    );

    $response = put(route('farmers.update', $farmer), $farmerData);

    $response->assertSessionHasErrors(['full_name' => 'full name must contain text.']);
    assertDatabaseHas('farmers', [
        'full_name' => 'valid name',
    ]);
});

test('cant farmer be updated with full_name greater than 255 characters', function () {
    $farmer = Farmer::factory()->create();
    $updateData = Farmer::factory()->make(['full_name' => str_repeat('a', 256)])->toArray();

    $response = put(route('farmers.update', $farmer), $updateData);

    $response->assertSessionHasErrors(['full_name' => 'full name must not be greater than 255 characters.']);
    assertDatabaseHas('farmers', [
        'id' => $farmer->id,
        'full_name' => $farmer->full_name,
    ]);
});

test('cant farmer be updated without phone_number', function () {
    $farmer = Farmer::factory()->create();
    $updateData = Farmer::factory()->make(['phone_number' => ''])->toArray();

    $response = put(route('farmers.update', $farmer), $updateData);

    $response->assertSessionHasErrors(['phone_number' => 'phone number is required.']);
    assertDatabaseHas('farmers', [
        'id' => $farmer->id,
        'phone_number' => $farmer->phone_number,
    ]);
});

test('cant farmer be updated with phone_number not string', function () {
    $farmer = Farmer::factory()->create(['phone_number' => '(123) 123-1234']);
    $farmerData = array_merge(
        Farmer::factory()->make(['phone_number' => ['awdawd']])->toArray(),
    );

    $response = put(route('farmers.update', $farmer), $farmerData);

    $response->assertSessionHasErrors(['phone_number' => 'phone number must contain text.']);
    assertDatabaseHas('farmers', [
        'phone_number' => '(123) 123-1234',
    ]);
});

test('cant farmer be updated with invalid phone_number format', function () {
    $farmer = Farmer::factory()->create();
    $updateData = Farmer::factory()->make(['phone_number' => '1234567890'])->toArray();

    $response = put(route('farmers.update', $farmer), $updateData);

    $response->assertSessionHasErrors(['phone_number' => 'phone number should be in format (999) 999-9999']);
    assertDatabaseHas('farmers', [
        'id' => $farmer->id,
        'phone_number' => $farmer->phone_number,
    ]);
});

test('cant farmer be updated without email', function () {
    $farmer = Farmer::factory()->create();
    $updateData = Farmer::factory()->make(['email' => ''])->toArray();

    $response = put(route('farmers.update', $farmer), $updateData);

    $response->assertSessionHasErrors(['email' => 'email is required.']);
    assertDatabaseHas('farmers', [
        'id' => $farmer->id,
        'email' => $farmer->email,
    ]);
});

test('cant farmer be updated with invalid email format', function () {
    $farmer = Farmer::factory()->create();
    $updateData = Farmer::factory()->make(['email' => 'invalid-email'])->toArray();

    $response = put(route('farmers.update', $farmer), $updateData);

    $response->assertSessionHasErrors(['email' => 'invalid email. try another.']);
    assertDatabaseHas('farmers', [
        'id' => $farmer->id,
        'email' => $farmer->email,
    ]);
});

test('cant farmer be updated with duplicate email', function () {
    $existingFarmer = Farmer::factory()->create();
    $farmer = Farmer::factory()->create();
    $updateData = Farmer::factory()->make(['email' => $existingFarmer->email])->toArray();

    $response = put(route('farmers.update', $farmer), $updateData);

    $response->assertSessionHasErrors(['email' => 'email already in use. try another.']);
    assertDatabaseHas('farmers', [
        'id' => $farmer->id,
        'email' => $farmer->email,
    ]);
});
// Update //
//////////////////////////////////////////////////////////////


// Destroy //
//////////////////////////////////////////////////////////////
test('can farmer be deleted with valid farmer_id', function () {
    $farmer = Farmer::factory()->create();

    $response = delete(route('farmers.destroy', $farmer->id));

    $response
        ->assertRedirect()
        ->assertSessionHas(['success' => 'Farmer deleted successfully']);
    assertDatabaseEmpty('farmers');
});
// Destroy //
//////////////////////////////////////////////////////////////
