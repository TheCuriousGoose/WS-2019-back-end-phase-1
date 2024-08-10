@props(['name', 'alertColor'])

@if (session()->has($name))
    <div class="mt-2 alert alert-{{ $alertColor }}">
        {{ session($name) }}
    </div>
@endif
