<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class ApiController extends Controller
{
    public function fetchAllListings()
    {
        $response = Http::get('https://mlb25.theshow.com/apis/listings.json');

        if($response->failed()) {
            return abort(500, 'Failed To Receive Data');
        }
        $data = $response->json();
        $collection = collect($data['listings']);

            $collection = $collection->map(function($item) {
                $rarity = $item['item']['rarity'];
                if($rarity == 'Diamond') {
                    $item['item']['color'] = 'text-blue-400';
                } elseif ($rarity == 'Gold') {
                    $item['item']['color'] = 'text-yellow-400';
                } elseif ($rarity == 'Silver') {
                    $item['item']['color'] = 'text-slate-400';
                } elseif ($rarity == 'Bronze') {
                    $item['item']['color'] = 'text-yellow-800';
                } elseif ($rarity == 'Common') {
                    $item['item']['color'] = 'text-black-500';
                } else {$item['item']['color'] = '';}
                return $item;
            });
            return view('allListings', [
                'collection' => $collection
            ]);
    }
}
