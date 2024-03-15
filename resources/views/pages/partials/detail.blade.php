   <div class="flow-root w-full">
       <dl class="-my-3 divide-y divide-gray-100 text-sm">
           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-gray-900">Title</dt>
               <dd class="text-gray-700 sm:col-span-2 line-clamp-2">{{ $product->name }}</dd>
           </div>

           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-gray-900">Owner</dt>
               <dd class="text-gray-700 sm:col-span-2">{{ $product->user->username_instagram }}</dd>
           </div>

           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-gray-900">Karakter</dt>
               <dd class="text-gray-700 sm:col-span-2">{{ $product->character }}</dd>
           </div>

           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-gray-900">Domisili</dt>
               <dd class="text-gray-700 sm:col-span-2">{{ $product->user->domisili }}</dd>
           </div>

           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-gray-900">Ukuran</dt>
               <dd class="text-gray-700 sm:col-span-2 gap-2 flex">
                   @foreach (explode('+', $product->size) as $value)
                       <span class="whitespace-nowrap rounded-full bg-primary/10 px-2.5 py-0.5 text-sm text-primary/70">
                           {{ $value }}
                       </span>
                   @endforeach
               </dd>
           </div>

           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-gray-900">Harga</dt>
               <dd class="text-gray-700 sm:col-span-2">Rp{{ $product->price }}</dd>
           </div>

           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-gray-900">Pengembalian</dt>
               <dd class="text-gray-700 sm:col-span-2">{{ $product->rental_duration }} Hari</dd>
           </div>

           <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
               <dt class="font-medium text-gray-900">Bio</dt>
               <dd class="text-gray-700 sm:col-span-2">
                   {!! nl2br($product->description) !!}
               </dd>
           </div>
       </dl>
   </div>
