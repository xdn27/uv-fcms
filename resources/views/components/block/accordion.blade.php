@props(['data'])
<div>
    <ul class="accordion">
        @foreach($data['accordion'] as $i => $accordion)
            <li class="{{ $i == 0 ? 'active' : '' }}">
                <div class="head">
                    <div class="title">{{ $accordion['title'] }}</div>
                </div>
                <div class="body">
                    @blocks($accordion['block'])
                </div>
            </li>
        @endforeach
    </ul>
</div>