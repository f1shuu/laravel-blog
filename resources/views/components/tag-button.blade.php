@props(['tag'])

<a href="/?tags[]={{ $tag -> slug }}"
   class="right-0 px-3 py-1 border border-{{ $tag->color }} rounded-full text-{{ $tag->color }} text-xs uppercase font-semibold hover:bg-{{ $tag->color }} hover:text-white"
   style="font-size: 10px">#{{ $tag->name }}</a>
