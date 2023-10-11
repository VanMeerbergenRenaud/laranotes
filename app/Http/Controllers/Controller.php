<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

// Middleware : code annexe pour ajouter à des fonctionnalités de bases.
// Un peu comme un empilement d'autres bouts de code aux controllers (vérification, sécurité, ...).
