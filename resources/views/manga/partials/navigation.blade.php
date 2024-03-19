   <div class="w-full flex">
       @if ($prev != null)
           <a href="/manga/read/{{ $slug }}/{{ $prev->chapter }}/{{ $prev->slug }}?title={{ request()->query('title') }}"
               class="w-full py-4 text-center bg-primary text-white font-semibold">Prev Chapter</a>
       @endif
       <p class="py-4 bg-indigo-500 text-white px-6">{{ $chapter }}</p>
       @if ($next != null)
           <a href="/manga/read/{{ $slug }}/{{ $next->chapter }}/{{ $next->slug }}?title={{ request()->query('title') }}"
               class="w-full py-4 text-center bg-primary text-white font-semibold">Next Chapter</a>
       @endif
   </div>
