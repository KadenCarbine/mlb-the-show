@props(['card', 'prices'])
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-lg rounded-xl p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex justify-center">
                <img src="{{ $card['baked_img'] }}" alt="{{ $card['name'] }}" class="w-64 object-contain rounded-xl border border-gray-200 shadow-sm bg-white" />
            </div>
            <x-player-name :card="$card"></x-player-name>
            <x-prices :prices="$prices"></x-prices>
            <x-profit :prices="$prices"></x-profit>
            </div>
        </div>
    </div>