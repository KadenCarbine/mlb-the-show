@props(['card'])

@php
    $rarityColors = [
        'Diamond' => 'text-blue-400',
        'Gold' => 'text-yellow-400',
        'Silver' => 'text-slate-400',
        'Bronze' => 'text-yellow-800',
        'Common' => 'text-black-500'
    ];
    
    $color = $rarityColors[$card['rarity']] ?? '';
@endphp

<span class="{{ $color }} text-xs font-bold px-2 py-0.5 rounded-full shadow ml-2">
    {{ $card['ovr'] }}
</span>