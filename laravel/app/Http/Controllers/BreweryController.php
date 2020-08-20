<?php

namespace App\Http\Controllers;

use App\Brewery;
use Illuminate\Http\Request;

class BreweryController extends Controller
{
    public function index()
    {
        $breweries = Brewery::all()->sortByDesc('created_at');
        return view('breweries.index', ['breweries' => $breweries]);
    }
}