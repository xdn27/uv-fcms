@props(['data'])
<div class="content-block">
    @if($data['type'] == 'center')
    <div class="tw:flex">
        <div class="tw:basis-6/12 tw:mx-auto">
            <p>{!! nl2br($data['text'] ?? '') !!}</p>
        </div>
    </div>
    @else($data['type'] == 'justify')
    <p>{!! nl2br($data['text'] ?? '') !!}</p>
    @endif
</div>