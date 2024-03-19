   <div class="flow-root w-full">
       <dl class="-my-3 divide-y divide-gray-100 text-sm">
           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-black">Title</dt>
               <dd class="text-gray-700 sm:col-span-2 line-clamp-2">{{ $manga->title }}</dd>
           </div>

           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-black">Author</dt>
               <dd class="text-gray-700 sm:col-span-2 line-clamp-2">{{ $manga->author }}</dd>
           </div>

           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-black">Genre</dt>
               <dd class="text-gray-700 sm:col-span-2 gap-2 flex flex-wrap">
                   @foreach ($manga->genre as $genre)
                       <span class="whitespace-nowrap rounded-full bg-primary/10 px-2.5 py-0.5 text-sm text-primary/70">
                           {{ $genre->title }}
                       </span>
                   @endforeach
               </dd>
           </div>


           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-black">synopsis</dt>
               <dd class="text-gray-700 sm:col-span-2">
                   {!! trim(nl2br($manga->synopsis)) !!}
               </dd>
           </div>
       </dl>
   </div>
