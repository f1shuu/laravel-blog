@props(['input', 'name', 'textColor' => 'black'])

<x-form.field>
    <x-form.label name="{{ str_replace('_', ' ', $name) }}"/>
    <input class="text-{{ $textColor }} border border-gray-400 p-2 w-full rounded-xl"
           name="{{ $input }}"
           id="{{ $input }}"
           {{ $attributes(['value' => old($input)]) }}
    >

    <x-form.error name="{{ $input }}"/>
</x-form.field>
