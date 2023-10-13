<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('redirects a guest to the login page when this user attempts to access the index of notes', function () {
    // Act & Assert
    get(route('notes.index'))->assertRedirectToRoute('login');
});

it('allows an authenticated user to access the index of notes', function () {
    // Arrange & Act & Assert
    actingAs(User::factory()->create())
        ->get(route('notes.index'))
        ->assertOk();
});

it('forbids an authenticated user to access the index of notes from another user', function () {
    // Arrange
    $renaud = User::factory()
        ->hasNotes(1, [
            'description' => 'note of Renaud',
        ])->create([
            'name' => 'Renaud'
        ]);

    $dominique = User::factory()
        ->hasNotes(1, [
            'description' => 'note of Dominique',
        ])->create([
            'name' => 'Dominique'
        ]);

    // Act & Assert
    actingAs($renaud)
        ->get(route('notes.index'))
        ->assertSee('note of Renaud')
        ->assertDontSee('note of Dominique');
});
