@props(['data'])
<div>
    <p>{!! nl2br($data['text'] ?? '') !!}</p>
</div>
