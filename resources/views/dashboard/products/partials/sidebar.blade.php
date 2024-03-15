   <div class="w-1/5">
       <div class="flex h-screen w-80 flex-col justify-between bg-white">
           <div class="px-4">
               <ul class="space-y-1">
                   <li>
                       <a href="{{ route('product.dashboard.index') }}"
                           class="block rounded-lg px-4 py-2 text-sm font-medium {{ $page == 'product' ? 'text-primary bg-gray-100' : 'text-gray-700' }}">
                           Products
                       </a>
                   </li>

                   <li>
                       <a href="{{ route('product.dashboard.create') }}"
                           class="block rounded-lg px-4 py-2 text-sm font-medium {{ $page == 'create' ? 'text-primary bg-gray-100' : 'text-gray-700' }}">
                           Add Products
                       </a>
                   </li>
               </ul>
           </div>
       </div>
   </div>
