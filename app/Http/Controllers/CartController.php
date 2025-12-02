<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class CartController extends Controller
{
    public function cart()
    {
        return Inertia::render('components/Cart'); 
    }
}
