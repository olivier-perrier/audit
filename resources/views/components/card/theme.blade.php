@props(['title', 'icon', 'default_icon'])

<div class="bg-indigo-200 h-52 text-center rounded relative flex hover:bg-indigo-300 z-10 duration-300">
    <div class="align-middle mx-auto p-2">
        <img src="{{ $icon ? Storage::disk('public')->url($icon) : asset($default_icon) }}" alt="icon" class="mx-auto h-full">
    </div>
    <div class="rounded h-14 bg-slate-700 text-white content-center self-end w-full absolute bottom-0 px-2">
        <span class="text-lg">{{ $title }}</span>
    </div>
</div>
