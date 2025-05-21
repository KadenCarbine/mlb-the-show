
<x-layout heading="{{ $card->name }}">
        <x-full-player-card :card="$card" :prices="$prices"></x-full-player-card>
        <div class="mb-4 size-full">
            <x-chartjs-component :chart="$chart" />
        </div>
        <x-sold :recentlySold="$recentlySold"></x-sold>
    </div>
</x-layout> 