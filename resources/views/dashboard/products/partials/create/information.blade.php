  <div class="w-full px-2 py-6 border border-gray-200 rounded-lg bg-gray-50  mb-8">
      <div class="flex mb-4">
          <div class="flex w-2/4 px-3 flex-col">
              <label class="text-black font-semibold mb-2 text-md">Nama Produk <span class="text-red-400">*</span></label>
              <input type="text" class="border rounded-lg border-gray-200" name="name"
                  value="{{ $product->name ?? '' }}" required>
          </div>

          <div class="flex w-2/4 px-3 flex-col">
              <label class="text-black font-semibold mb-2 text-md">Slug</label>
              <input type="text" class="border rounded-lg border-gray-200" value="{{ $product->slug ?? '' }}"
                  name="slug" readonly>
          </div>
      </div>

      <div class="px-3">
          <label for="OrderNotes" class="text-black font-semibold mb-2 text-md"> Deskripsi </label>

          <textarea id="OrderNotes" name="description"
              class="mt-2 w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="4" placeholder="">{{ $product->description ?? '' }}
            </textarea>
      </div>
  </div>

  <script>
      const nameInput = document.querySelector('input[name=name]');
      const slugInput = document.querySelector('input[name=slug]');
      nameInput.addEventListener('input', () => {
          // Menghapus semua special charcter
          const slug = nameInput.value.replace(/[^\w\s-]/g, '-');

          // replace spasi
          const spasi = slug.replace(/ /g, '-');

          // Menghapus duplikat "-"
          const finalSlug = spasi.replace(/-+/g, '-');

          // lower case
          slugInput.value = finalSlug.toLowerCase();
      })
  </script>
