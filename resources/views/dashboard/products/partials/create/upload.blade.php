   <div class="w-full border border-gray-200 rounded-lg bg-gray-50 mb-8">
       <p class=" border-b border-gray-200 p-4 text-black font-semibold text-md">Gambar Produk</p>
       <div class="p-4">

           <input type="file" class="hidden" name="images[]" id="input-file" multiple>

           <label for="input-file" id="drop-area"
               class="flex justify-center items-center w-full border border-gray-200 bg-gray-100 h-16 rounded-lg">
               <p class="text-sm text-black">Drag & Drop your files or <span class="text-primary">Browser</span></p>
           </label>


           <div id="image-show-container">
               @include('dashboard.products.partials.create.image')
           </div>
       </div>
   </div>
