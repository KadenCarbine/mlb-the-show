<x-layout heading="All Listings">
    @if(isset($error))
        <p style="color: red;">{{ $error }}</p>
    @else
    <div class="grid grid-cols-5 gap-4">
            @foreach($collection as $item)
            {{-- @php
                dd($item->uuid);
            @endphp --}}
            <a href="/cards/{{ $item->uuid }}">
                <div class="max-w-xs rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ $item->baked_img }}" alt="MLB The Show 25 Card {{ $item->name }} Series: {{ $item->series }}">
                    <div class="px-2 py-4">
                        <div class="font-bold text-xl mb-2 flex justify-between">
                            <div>{{ $item->name }} </div>
                            <div class="pr-2">{{ $item->ovr }}</div>
                        </div>
                        {{-- <p class="text-gray-700 text-base">${{ number_format($item['best_sell_price']) }}</p>
                        <p class="text-gray-700 text-base">${{ number_format($item['best_buy_price']) }}</p> --}}
                        {{-- <div class="flex justify-between">
                            <span class="text-gray-700 text-base"> Difference ${{ number_format($item['best_sell_price'] - $item['best_buy_price']) }}</span>
                            {{-- <span class="text-gray-700 text-base {{ $item['flip'] }}">{{ $item['percent'] }}%</span> --}}
                         {{-- </div> --}}
                    </div>
                    {{-- <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span> --}}
                </div>
            </a>
            @endforeach
            {{ $paginator->links() }}      
        @endif
    </div>
</x-layout>