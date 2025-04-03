<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function fetchAllListings()
    {
        $response = Http::get('https://mlb25.theshow.com/apis/listings.json');

        if($response->successful()) {
            $data = $response->json();
            return view('allListings', ['data' => $data]);
        } else {
            return view('allListings', ['error' => 'Failed to fetch data.']);
        }
    }

    
}
