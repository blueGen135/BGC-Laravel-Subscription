@props([
    'trigger',
])

<div class="bg-gray-900 bg-opacity-60 items-center flex fixed top-0 h-full w-full" x-show="{{ $trigger }}"  @click.self="{{ $trigger }} = false" x-on:keydown.escape.window="{{ $trigger }} = false" x-cloak>

    <div {{ $attributes->merge(['class' => 'm-auto shadow-2xl rounded-xl'])}}>
        {{ $slot }}
   </div>

</div>