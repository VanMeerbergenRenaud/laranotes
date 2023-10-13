<?php

use App\Models\Note;
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
    // Arrange // trouver un autre indicateur qui permet de savoir si la note apppartient à un autre utilisateur avec un text associé dedans
    $renaud = User::factory()
        ->has(Note::factory())->create([
            'name' => 'Renaud'
        ]);

    $dominique = User::factory()
        ->has(Note::factory())->create([
            'name' => 'Dominique'
        ]);

    // Act

    // Assert
});
