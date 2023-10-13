<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

it('shows the user menu only to the admin user', function () {
    // Arrange
    $admin = User::factory()
        ->create([
            'is_admin' => true
        ]);

    $user = User::factory()
        ->create([
            'is_admin' => false
        ]);

    // Act & Assert
    actingAs($admin)
        ->get(route('dashboard'))
        ->assertSeeInOrder([
            'Dashboard',
            'About',
            'Contact',
            'Notes',
            'Users'
        ]);

    actingAs($user)
        ->get(route('dashboard'))
        ->assertDontSee(
            'Users'
        );
});
