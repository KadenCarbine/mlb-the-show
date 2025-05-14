@props(['prices'])
@if(isset($prices['best_buy_price']) && isset($prices['best_sell_price']) && $prices['best_buy_price'] > 0 && $prices['best_sell_price'] > 0)
@php
    $percentageDiff = (($prices['best_sell_price'] - $prices['best_buy_price']) / $prices['best_buy_price']) * 100;
    $percentageColor = $percentageDiff >= 15 ? 'text-green-600' : 'text-red-600';
@endphp
<div class="text-center">
    <span class="text-lg font-medium {{ $percentageColor }}">Profit Margin: {{ number_format($percentageDiff, 1) }}%</span>
</div>
@endif