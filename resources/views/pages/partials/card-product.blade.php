<a href="{{ route('product.show', ['product' => $id]) }}" class="group block overflow-hidden mb-6">
    <div class="relative h-[200px] lg:h-[350px] w-[200px] lg:w-[350px]"
        style="background-image: url('/storage/products/{{ $cover }}');background-size: contain; object-fit: contain;">
    </div>

    <div class="relative bg-white pt-3 px-2">
        <h1
            class="text-sm text-gray-700 group-hover:underline group-hover:underline-offset-4 line-clamp-1 lg:line-clamp-2 mb-1.5">
            {{ $title }}
        </h1>

        <div class="flex gap-2 flex-wrap">
            <span class="whitespace-nowrap font-medium rounded-full bg-blue-100 px-2.5 py-0.5 text-sm text-blue-500">
                {{ $owner }}
            </span>
            <span
                class="whitespace-nowrap font-medium rounded-full bg-emerald-100 px-2.5 py-0.5 text-sm text-emerald-500">
                {{ $duration }} Hari
            </span>
            <span class="whitespace-nowrap font-medium rounded-full bg-red-100 px-2.5 py-0.5 text-sm text-red-500">
                {{ $domisili }}
            </span>
        </div>

        <p class="mt-1.5 tracking-wide text-gray-900">Rp{{ $price }}</p>
    </div>
</a>
