<?php
// fonctionnalité de user suspended en plus
// => state dans factory
// => scope dans les models

use App\Models\User;
use function Pest\Laravel\actingAs;

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

    // Act & Assert
    actingAs($user)
        ->get(route('users.index'))
        ->assertRedirect('login');

    actingAs($admin)
        ->get(route('users.index'))
        ->assertOk();
});
