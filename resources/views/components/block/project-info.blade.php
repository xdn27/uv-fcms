@props(['data'])
@php
$count = count($data['meta_info']);
$divider = ($count > 1) ? ceil($count / 2) : 1;
$metas = array_chunk($data['meta_info'], $divider, true);
@endphp
<div class="grid content">
    <div class="col-offset-1 col-3">
        <p>{{ nl2br($data['description'] ?? '') }}</p>
    </div>
    <div class="col-offset-1 col-1">
        @foreach($metas[0] ?? [] as $key => $meta)
        <div class="project-data">
            <div class="title">{{ $key }}</div>
            <div class="desc">{{ $meta }}</div>
        </div>
        @endforeach
    </div>
    <div class="col-1">
        @foreach($metas[1] ?? [] as $key => $meta)
        <div class="project-data">
            <div class="title">{{ $key }}</div>
            <div class="desc">{{ $meta }}</div>
        </div>
        @endforeach
    </div>
</div>