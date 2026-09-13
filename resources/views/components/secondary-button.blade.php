@props(['disabled' => false])

<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border
    border-orange-500 rounded-full font-semibold text-orange-500 tracking-widest shadow-sm hover:bg-gray-100
    disabled:opacity-25 transition ease-in-out
    duration-150']) }} @disabled($disabled)>
    {{ $slot }}
</button>