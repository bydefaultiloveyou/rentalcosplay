    @if (count($products) == 0)
        <div class="mt-4 grid place-items-center rounded-lg border border-gray-200">
            <div class="my-20">
                <img class="w-80" src="{{ asset('/img/src/data-notfound.png') }}">
                <p class="text-2xl text-center mt-2 font-semibold text-black">Belum Ada Products</p>
            </div>
        </div>
    @else
        <div class="mt-4 rounded-lg border border-gray-200">
            <p class="text-lg border-b p-4 border-gray-200 font-bold text-black">List Product</p>
            <div class="p-4 border-b border-gray-200 flex justify-end">
                <input type="text" name="search" class="w-[30%] rounded-lg border-gray-200 p-3 pe-12 text-sm"
                    placeholder="Cari Kostum" />
            </div>

            <table class="w-full rounded-lg overflow-hidden">
                <tr class="text-black bg-gray-50 border-b border-gray-200">
                    <th class="text-md py-3 w-[8%]">
                        <input type="checkbox" class="size-5 rounded border-gray-300" />
                    </th>
                    <th class="text-md py-3 w-[12%]">Image</th>
                    <th class="text-md py-3 w-[30%]">Name Product</th>
                    <th class="text-md py-3">Character</th>
                    <th class="text-md py-3">Price</th>
                    <th class="text-md py-3"></th>
                </tr>
                @if (isset($products))
                    @foreach ($products as $product)
                        <tr class="text-black border-b border-gray-200 odd:bg-gray-50 last:border-none">
                            <td class="text-center text-md py-3">
                                <div>
                                    <input type="checkbox" class="size-5 rounded border-gray-300" />
                                </div>
                            </td>
                            <td class="text-center text-md py-3 flex justify-center">
                                <img src="/storage/products/{{ $product->image[0]->filename }}" class="w-14 h-14" />
                            </td>
                            <td class="text-center text-md">
                                <p class="line-clamp-1 px-2">
                                    {{ $product->name }}
                                </p>
                            </td>
                            <td class="text-center text-md py-3 w-[20%]">{{ $product->character }}</td>
                            <td class="text-center text-md py-3 w-[10%]">Rp{{ $product->price }}</td>
                            <td class="text-center text-md">
                                <a class="flex justify-center text-primary gap-1"
                                    href="{{ route('product.dashboard.edit', ['product' => $product->id]) }}">
                                    <img src="/img/svg/edit.svg" class="w-5 mt-[2px] h-5" />
                                    <p class=" text-md font-semibold">Edit</p>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </table>
        </div>
    @endif
