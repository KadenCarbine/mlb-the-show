<?php

namespace App\Http\Controllers;

use App\Services\CardService;
use Illuminate\Http\Request;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use App\Models\MLBCard;
use Illuminate\Pagination\LengthAwarePaginator;

class CardsController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teamFilter = $request->input('team');
        $initialQuery = MLBCard::query();
        $applyFilters = $initialQuery
            ->when($teamFilter, function ($query, $teamFilter) {
                return $query->where('team', '=', $teamFilter);
            })
            ->paginate(25);
        $collection = $applyFilters;
        return view('cards.index', [
            'collection' => $collection->all(),
            'paginator' => $collection
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, CardService $cardService)
    {   
        $card = MLBCard::where('uuid', '=', $id)->firstOrFail();
        $chart = $cardService->getChart($id);


        return view('cards.show', [
            'chart' => $chart['chart'],
            'card' => $card,
            'prices' => $chart['prices'],
            'recentlySold' => $chart['recentlySold']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
