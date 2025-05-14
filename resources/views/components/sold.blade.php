@props(['recentlySold'])
<div class="columns-5 gap-4">
    @foreach ($recentlySold as $item)
    <div class="border rounded p-2 mb-2">
        <span>{{ $item['date'] }}</span>
        <span>${{ $item['price'] }}</span>
    </div>
@endforeach
</div>