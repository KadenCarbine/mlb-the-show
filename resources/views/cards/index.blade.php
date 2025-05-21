<x-layout heading="All Listings">
    @if(isset($error))
        <p style="color: red;">{{ $error }}</p>
    @else
    <form method="GET" action="{{ url('/cards') }}" class="max-w-md mx-auto p-6 bg-white rounded-2xl shadow-md space-y-4 mb-6" >
        <label for="team" class="block text-sm font-medium text-gray-700">
            Choose a Team
          </label>
        <select name="team" id="team" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 cursor-pointer">
            <option value="">All Teams</option>
            @foreach (config('teams') as $key => $value)
                <option value="{{ $key }}" {{ request('team') == $key ? 'selected' : '' }} >{{ $value }}</option>
            @endforeach
        </select>
        <button
        type="submit"
        class="w-full inline-flex justify-center items-center px-4 py-2 bg-gray-800 text-white text-sm font-medium rounded-xl shadow hover:bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >
        Filter
      </button>
    </form>
    <div class="grid grid-cols-5 gap-4">
            @foreach($collection as $item)
            <a href="/cards/{{ $item->uuid }}">
                <div class="max-w-xs rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ $item->baked_img }}" alt="MLB The Show 25 Card {{ $item->name }} Series: {{ $item->series }}">
                    <div class="px-2 py-4">
                        <div class="font-bold text-xl mb-2 flex justify-between">
                            <div>{{ $item->name }} </div>
                            <div class="pr-2">{{ $item->ovr }}</div>
                        </div>
                    </div>
                    {{-- <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span> --}}
                </div>
            </a>
            @endforeach
            {{ $paginator->links() }}      
        @endif
    </div>
</x-layout>