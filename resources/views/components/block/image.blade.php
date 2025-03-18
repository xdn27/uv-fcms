@props(['data'])
@php
$count = count($data['images']);
@endphp
<div>
    @if($count == 1)
        @foreach($data['images'] ?? [] as $image)
            <img src="{{ asset('storage/'.$image) }}">
        @endforeach
    @elseif($count == 2)
        <div class="tw:grid tw:grid-cols-2 tw:gap-2">
            @foreach($data['images'] ?? [] as $image)
                <img src="{{ asset('storage/'.$image) }}" class="tw:h-full tw:w-full">
            @endforeach
        </div>
    @elseif($count > 2)
        <div class="tw:grid tw:grid-cols-3 tw:gap-2">
            @foreach($data['images'] ?? [] as $image)
                <img src="{{ asset('storage/'.$image) }}" class="tw:h-full tw:w-full">
            @endforeach
        </div>
    @endif
</div>