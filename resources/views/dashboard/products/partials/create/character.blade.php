<div class="w-full border border-gray-200 rounded-lg bg-gray-50 mb-8">
    <p class=" border-b border-gray-200 p-4 text-black/80 font-semibold text-md">Kostum</p>
    <div class="p-4">
        <div class="flex w-full flex-col mb-4">
            <label class="text-black/80 font-semibold mb-2 text-md" required>Ukuran <span class="text-red-400">*</span>
            </label></label>
            <input type="text" value="{{ $product->size ?? '' }}" class="border rounded-lg border-gray-200"
                name="size">
            <p class="text-sm text-black/60 mt-2">Berikan tanda + untuk ukuran baru contoh: <span class=" text-primary">
                    XL+XXL+XXXL</span></p>
        </div>
        <div class="flex w-full flex-col">
            <label class="text-black/80 font-semibold mb-2 text-md">Nama Karakter <span class="text-red-400">*</span>
            </label>
            <input type="text" value="{{ $product->character ?? '' }}" class="border rounded-lg border-gray-200"
                name="character" required>
        </div>
    </div>
</div>
