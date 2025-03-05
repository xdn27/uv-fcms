@props(['data'])
@php
$count = count($data['grid']);
@endphp
<div class="">
    <div class="grid" style="clear: both;">
        @foreach($data['grid'] as $i => $blocks)
        <div style="width: {{ 100 / $count }}%; float: left;">
            @blocks($blocks)
        </div>
        @endforeach
    </div>
</div>