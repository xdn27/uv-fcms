@props(['data'])
<div class="list-block">
    @if(!empty($data['title']))
    <h3 class="stripe">{{ $data['title'] }}</h3>
    @endif

    @if(!empty($data['subtitle']))
    <span class="label">{{ $data['subtitle'] }}</span>
    @endif

    @if(!empty($data['list']))
    <ul class="striped">
        @foreach($data['list'] ?? [] as $name => $link)
        <li><a href="{{ $link }}" target="_blank">{{ $name }}</a></li>
        @endforeach
    </ul>
    @endif
</div>