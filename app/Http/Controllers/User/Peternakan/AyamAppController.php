<?php

namespace App\Http\Controllers\User\Peternakan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AyamAppController extends Controller
{
    /**
     * Show the dashboard page
     */
    public function app()
    {
        return Inertia::render('User/Peternakan/App/Ayam/Index');
    }
}
