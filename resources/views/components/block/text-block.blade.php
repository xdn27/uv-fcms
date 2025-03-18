@props(['data'])
<div class="content-block">
    @if(isset($data['title']) && !empty($data['title']))
    <h2>{!! nl2br($data['title']) !!}</h2>
    @endif

    @if(isset($data['subtitle']) && !empty($data['subtitle']))
    <h3>{!! nl2br($data['subtitle']) !!}</h3>
    @endif

    @if(isset($data['paragraph']) && !empty($data['paragraph']))
    <p>{!! nl2br($data['paragraph']) !!}</p>
    @endif
</div>