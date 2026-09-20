@props(['title', 'icon' => 'images/icon_category_gouvergance.png', 'default_icon' => 'images/icon_section_gouvernance.png'])

<div class="bg-indigo-200 h-52 text-center rounded relative flex hover:bg-indigo-300 z-10 duration-300">
    <div class="align-middle mx-auto mt-10">
        <img src="{{ Storage::disk('public')->exists($icon) ? Storage::disk('public')->url($icon) : asset($default_icon) }}" alt="icon" class="mx-auto h-20">
    </div>
    <div class="rounded h-14 bg-slate-700 text-white content-center self-end w-full absolute bottom-0 px-2">
        <span class="text-lg">{{ $title }}</span>
    </div>
</div>
