<?php

use function Pest\Laravel\get;

it('returns a successful response when visiting home route', function () {
    get('/')->assertOk();
});

// Raccourci : ctrl+maj+r

// test ou it

// Triple A :
// 1. Arranger des données
// 2. Agir, faire fonctionner la fonctionnalité que l'on souhaite tester
// 3. Assertion (affirmation hypothétique)
