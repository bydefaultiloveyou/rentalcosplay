   <div class="w-full  border border-gray-200 rounded-lg bg-gray-50 mb-8">
       <p class=" border-b border-gray-200 p-4 text-black/80 font-semibold text-md">Harga</p>
       <div class="p-2 py-4">
           <div class="flex mb-3">
               <div class="flex w-2/4 px-3 flex-col">
                   <label class="text-black/80 font-semibold mb-2 text-md">Harga Item <span
                           class="text-red-400">*</span></label>
                   <input required value="{{ $product->price ?? '' }}" type="number" name="price"
                       class="border rounded-lg border-gray-200">
               </div>
               <div class="flex w-2/4 px-3 flex-col">
                   <label class="text-black/80 font-semibold mb-2 text-md">Durasi Rental <span
                           class="text-red-400">*</span></label>
                   <input required type="number" value="{{ $product->rental_duration ?? '' }}" name="rental_duration"
                       class="border rounded-lg border-gray-200">
               </div>
           </div>
           <div class="flex w-full px-3 flex-col">
               <label class="text-black/80 font-semibold mb-2 text-md">Link Postingan Instagram <span
                       class="text-red-400">*</span></label>
               <input required value="{{ $product->instagram_post ?? '' }}" type="text" name="instagram_post"
                   class="border rounded-lg border-gray-200">
           </div>
       </div>

   </div>
