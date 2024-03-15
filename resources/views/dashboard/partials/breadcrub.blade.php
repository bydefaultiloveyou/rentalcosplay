   <nav aria-label="Breadcrumb">
       <ol class="flex items-cente mb-3 gap-1 text-sm text-gray-600">

           @foreach ($items as $value)
               <li>
                   <a href="#" class="block transition hover:text-gray-700">
                       {{ $value }}
                   </a>
               </li>

               <li class="rtl:rotate-180 last:hidden">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                       <path fill-rule="evenodd"
                           d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                           clip-rule="evenodd" />
                   </svg>
               </li>
           @endforeach
       </ol>
   </nav>
