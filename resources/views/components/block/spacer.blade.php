@props(['data'])
<div>
    @foreach($data as $text)
    <h4>{{ $text }}</h4>
    @endforeach
</div>