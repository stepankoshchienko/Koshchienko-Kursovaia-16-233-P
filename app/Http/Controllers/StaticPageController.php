<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function vacancies()
    {
        return Inertia::render('components/Vacancies');
    }

    public function terms()
    {
        return Inertia::render('components/Terms');
    }

    public function privacy()
    {
        return Inertia::render('components/Privacy');
    }
}
