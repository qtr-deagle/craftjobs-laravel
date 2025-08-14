@props(['tagsCvs'])

@php
    $tags = explode(',', $tagsCvs);
@endphp

<ul class="flex">
    @foreach ($tags as $tag)
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs transition-shadow duration-300 hover:shadow-[0_0_10px_2px_rgba(0,0,0,0.8)]">
            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>