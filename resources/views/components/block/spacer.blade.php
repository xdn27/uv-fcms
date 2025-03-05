@props(['data'])
<div class="content-block">
    @foreach($data as $text)
    <h4>{{ $text }}</h4>
    @endforeach
</div>