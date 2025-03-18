@props(['data'])
<div class="grid content">
    <div id="img-carousel" class="titanSlider">
        <ul class="slides">
            @foreach($data['images'] as $image)
            <li class="slide tw:max-h-[500px]">
                <img src="{{ asset('storage/'.$image) }}" class="fw">
            </li>
            @endforeach
        </ul>
    </div>
</div>