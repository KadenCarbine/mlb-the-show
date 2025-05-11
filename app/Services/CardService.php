<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;


class CardService
{
    public function __construct(public Request $request)
    {
        //
    }
    public function getCards() {
        $currentPage = $this->request->query('page');
        $perPage = 25;
        $response = Http::get('https://mlb25.theshow.com/apis/listings.json', [
            'type' => 'mlb_card',
            'page' => $currentPage
        ]);
        $collection = $response->collect('listings')->all();
        $total = $perPage * $response->json('total_pages');

        $paginator = new LengthAwarePaginator($collection, $total, $perPage, null, ['path' => '/cards']);
        return [
            'collection' => $collection,
            'paginator' => $paginator
        ];
    }
}
