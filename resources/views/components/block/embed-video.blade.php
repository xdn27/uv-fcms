@props(['data'])
<div class="grid content">
    <div class="col-8">
        <div class="video-frame mb-xl">
            @if(isset($data['embed']))
            {!! $data['embed'] !!}
            @endif
        </div>
    </div>
</div>