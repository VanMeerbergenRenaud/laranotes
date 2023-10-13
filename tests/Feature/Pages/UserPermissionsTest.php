<?php
// fonctionnalité de user suspended en plus
// => state dans factory
// => scope dans les models

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

/*it('shows the user profil for every one', function () {
    // Arrange
    $user = User::factory()->create([
        'is_admin' => false
    ]);

    // Act & Assert
    actingAs($user)
        ->get(route('users.index', [
            'user' => $user->first()->id
        ]))
        ->assertOk();

    actingAs($user)
        ->get(route('users.show', [
            'user' => $user->first()->id
        ]))
        ->assertOk();
});*/

it('shows the user profil only for the person who is an authenticated user or an admin user', function () {
    // Arrange
    $user = User::factory()->create([
        'is_admin' => false
    ]);

    $admin = User::factory()->create([
        'is_admin' => true
    ]);

    get(route('users.index'))
        ->assertRedirect(route('login'));

    // Act & Assert
    actingAs($user)
        ->get(route('users.index'))
        ->assertForbidden();

    actingAs($admin)
        ->get(route('users.index'))
        ->assertOk();
});

it('shows the user profil only for the admin user and his corresponding views', function () {
    // Arrange
    $admin = User::factory()->create([
        'is_admin' => true
    ]);

    $user = User::factory()->create();

    // Act & Assert
    actingAs($admin)
        ->get(route('users.show', [
            'user' => $user->id
        ]))
        ->assertOk();

    actingAs($admin)
        ->get(route('users.edit', [
            'user' => $user->id
        ]))
        ->assertOk();
});
