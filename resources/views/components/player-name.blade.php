@props(['card'])
<div class="space-y-4">
    <h1 class="text-2xl font-bold">{{ $card['name'] }}</h1>
    <div class="flex items-center gap-2">
        <span class="text-gray-600">{{ $card['rarity'] }}</span>
        <x-overall :card="$card"></x-overall>
    </div>