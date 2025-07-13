<a {{ $attributes->merge([
        'class' => 'tw:group tw:inline-flex tw:justify-center tw:items-center tw:border tw:border-white tw:size-16 tw:rounded-full tw:text-xl tw:hover:bg-white! tw:hover:text-black!',
    ]) }}>
    {{ $slot }}
</a>