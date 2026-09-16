@props(['name'])

@error($name)
    {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
    <p class="text-sm text-red-600" {{ $attributes }}>
        {{ $message }}
    </p>
@enderror