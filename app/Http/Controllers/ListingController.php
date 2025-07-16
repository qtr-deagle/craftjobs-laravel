<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display listings
        return view('/listings.index'); // Assuming you have a view at resources/views/listings/index.blade.php
    }
}
