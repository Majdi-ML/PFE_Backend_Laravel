<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Les URI qui doivent être exclues de la vérification CSRF.
     *
     * @var array<int, string>
     */
    protected array $except = [
           // Exclut toutes les sous-routes de /api/demandes/*
    ];
}
