@props([
    'color' => 'orange',
    // 'variant' => 'primary',
])

<flux:button {{ $attributes->merge(['class' => '']) }} :color="$color">
    {{ $slot }}
</flux:button>
