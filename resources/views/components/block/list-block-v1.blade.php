@props(['data'])
<div>
    <h3>{{ $data['title'] }}</h3>
    <span class="label">{{ $data['subtitle'] }}</span>
    <ul class="no-style">
        @foreach($data['list'] ?? [] as $name => $link)
        <li><a href="{{ $link }}" target="_blank">{{ $name }}</a></li>
        @endforeach
    </ul>
</div>