<x-layout heading="{{ $collection['listing_name'] }}">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-lg rounded-xl p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex justify-center">
                    <img src="{{ $collection['item']['baked_img'] }}" alt="{{ $collection['listing_name'] }}" class="w-64 object-contain rounded-xl border border-gray-200 shadow-sm bg-white" />
                </div>
                <div class="space-y-4">
                    <h1 class="text-2xl font-bold">{{ $collection['listing_name'] }}</h1>
                    <div class="flex items-center gap-2">
                        <span class="text-gray-600">{{ $collection['item']['rarity'] }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-blue-600">Buy Price</h3>
                            <p class="text-2xl font-bold">{{ $collection['best_buy_price'] ?? 'N/A' }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-green-600">Sell Price</h3>
                            <p class="text-2xl font-bold">{{ $collection['best_sell_price'] ?? 'N/A' }}</p>
                        </div>
                    </div>
                    @if(isset($collection['best_buy_price']) && isset($collection['best_sell_price']) && $collection['best_buy_price'] > 0 && $collection['best_sell_price'] > 0)
                        @php
                            $percentageDiff = (($collection['best_sell_price'] - $collection['best_buy_price']) / $collection['best_buy_price']) * 100;
                            $percentageColor = $percentageDiff >= 15 ? 'text-green-600' : 'text-red-600';
                        @endphp
                        <div class="text-center">
                            <span class="text-lg font-medium {{ $percentageColor }}">Profit Margin: {{ number_format($percentageDiff, 1) }}%</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout> 