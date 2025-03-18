@props(['data'])
<div class="tw:flex tw:gap-10">
    <div class="tw:basis-5/12">
        <img src="{{ asset('storage/'.$data['image']) }}" class="tw:w-full">
    </div>
    <div class="tw:basis-7/12">
        <div><h3>{!! nl2br($data['title']) !!}</h3></div>
        <div>
            <p>{!! nl2br($data['description']) !!}</p>
        </div>
    </div>
</div>