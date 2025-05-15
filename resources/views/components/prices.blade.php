@props(['prices'])
<div class="grid grid-cols-2 gap-4">
    <div class="bg-gray-50 p-4 rounded-lg">
        <h3 class="text-lg font-semibold text-blue-600">Buy Price</h3>
        <p class="text-2xl font-bold">{{ $prices['best_buy_price'] ?? 'N/A' }}</p>
    </div>
    <div class="bg-gray-50 p-4 rounded-lg">
        <h3 class="text-lg font-semibold text-green-600">Sell Price</h3>
        <p class="text-2xl font-bold">{{ $prices['best_sell_price'] ?? 'N/A' }}</p>
    </div>
</div>