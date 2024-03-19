 <a href="{{ route('manga.show', ['slug' => $manga->slug]) }}"
     class="group h-64 lg:h-96 rounded-lg overflow-hidden relative block bg-black">
     <img alt="" src="{{ $manga->cover }}" loading="lazy"
         class="absolute inset-0 h-full w-full object-cover group-hover:object-contain duration-300 opacity-50 transition-opacity" />

     <div class="relative p-4 sm:p-6 lg:p-8">
         <p class="text-sm font-medium uppercase tracking-widest text-pink-500">Manga</p>

         <p class="text-xl font-bold text-white sm:text-2xl line-clamp-4">{{ $manga->title }}</p>
     </div>
 </a>
