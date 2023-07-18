@props(['name'])

<label class="block mb-2 uppercase font-bold text-xs text-black"
       for="{{ $name }}"
>{{ ucwords($name) }}
</label>
