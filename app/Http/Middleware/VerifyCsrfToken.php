<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * Vérifie qu'un formulaire à bien été signé
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
