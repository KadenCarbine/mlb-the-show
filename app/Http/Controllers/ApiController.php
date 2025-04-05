<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class ApiController extends Controller
{
    public function fetchAllListings(Request $request)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $response = Http::get("https://mlb25.theshow.com/apis/listings.json", [
            'page' => $currentPage
        ]);

        if($response->failed()) {
            return abort(500, 'Failed To Receive Data');
        }
        $data = $response->json();
        $perPage = $data['per_page'];
        $totalitems = $perPage * $data['total_pages'];
        $collection = collect($data['listings']);
        // This takes the rarity of the card and adds a new value to the array to display the rarity color on the ovr
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
        // Adding a percentage difference between the buy and sell price. 
        $collection = $collection->map(function($item) {
            if($item['best_buy_price'] == 0) {
                return $item['percent'] = 0;
            }
            $percentDifference = (($item['best_sell_price'] - $item['best_buy_price']) / abs($item['best_buy_price'])) * 100;
            $percentDifference = round($percentDifference, 2);
            $item['percent'] = $percentDifference;
            return $item;
        });
        // Adding a flip value to show green / red if the percent is greater than 20 % difference. 
        $collection = $collection->map(function($item) {
            if($item['percent'] == 'N/A') {
                $item['flip'] = 'text-red-500';
                return $item;
            }
            if($item['percent'] > 25) {
                $item['flip'] = 'text-green-500';
                return $item;
            }
            if($item['percent'] > 17.5) {
                $item['flip'] = 'text-yellow-500';
                return $item;
            }
            $item['flip'] = 'text-red-500';
            return $item;
        });

        $pagination = new LengthAwarePaginator(
            $collection,
            $totalitems,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        return view('allListings', [
            'collection' => $collection,
            'pagination' => $pagination,
        ]);
    }
}
