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
    $user = User::factory()->create();

    actingAs($user)
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

// Vérifie si un utilisateur a accès à la modification d'une note
it('forbids an authenticated user to view the edit form of a note from another user', function () {
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
        ->get(route('notes.edit', [
            'note' => $renaud->notes()->first()->id
        ]))
        ->assertOk(); // Good

    actingAs($renaud)
        ->get(route('notes.edit', [
            'note' => $dominique->notes()->first()->id
        ]))
        ->assertForbidden(); // Je n'y ai pas accès
});
