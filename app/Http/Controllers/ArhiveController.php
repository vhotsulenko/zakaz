<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ArhiveController extends Controller
{
    public function index()
    {
        return Inertia::render('Arhive/Index');
    }
}
