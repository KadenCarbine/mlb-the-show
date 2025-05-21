<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;


class CardService
{
    protected string $baseUrl;

    public function __construct(public Request $request)
    {   
        $this->baseUrl = config('services.api.base_url');
    }

    public function getChart($id)
    {
        $response = Http::get($this->baseUrl . '/listing.json', [
            'uuid' => $id
        ]);
        $collection = $response->collect()->all();
        $labels = collect($collection['price_history'])->pluck('date')->toArray();
        $buy = collect($collection['price_history'])->pluck('best_buy_price')->toArray();
        $sell = collect($collection['price_history'])->pluck('best_sell_price')->toArray();
        $prices = ['best_buy_price' => $collection['best_buy_price'], 'best_sell_price' => $collection['best_sell_price']];
        $recentlySold = collect($collection['completed_orders'])->take(25)->toArray();


        $chart = Chartjs::build()
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 600, 'height' => 300])
        ->labels($labels)
        ->datasets([
            [
                "label" => "Best Sell Price",
                "backgroundColor" => "rgba(137, 53, 206, 0.31)",
                "borderColor" => "rgba(137, 53, 206, 0.7)",
                "data" => $sell
            ],
            [
                "label" => "Best Buy Price",
                "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                "borderColor" => "rgba(38, 185, 154, 0.7)",
                "data" => $buy
            ], 
        ])
        ->options([
            "scales" => [
                "y" => [
                    "beginAtZero" => true
                    ]
                ]
         ]);

        return compact('chart', 'prices', 'recentlySold');
    }

    public function getCard($id)
    {
        $response = Http::get($this->baseUrl . '/item.json', [
            'uuid' => $id
        ]);
        $card = $response->collect()->all();

        return compact('card');
    }
}
