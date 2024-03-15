@extends('layout')

@section('content')
    @include('pages.partials.navbar')
    @include('pages.partials.announcement')

    <main class="relative w-full lg:w-4/5 m-auto">
        <div class="flex flex-col lg:flex-row p-4 justify-center gap-10 mt-10">
            <div>
                <div class="relative h-[350px] lg:h-[400px] w-[100%] lg:w-[400px] mb-2">
                    <img id="show-image" src="/storage/products/{{ $product->image[0]->filename }}" alt=""
                        class="absolute inset-0 h-full w-full object-cover opacity-100" />
                </div>


                <div class="grid grid-cols-4 gap-1">
                    @foreach ($product->image as $image)
                        <img onclick="changeImage('{{ $image->filename }}')" class="w-[95px] h-[95px]"
                            src="/storage/products/{{ $image->filename }}" />
                    @endforeach
                </div>
            </div>

            <div class=" w-full lg:w-2/4">
                @include('pages.partials.detail')

                <div class=" mt-10 lg:mt-20 flex flex-col lg:flex-row gap-6">
                    <a target="_blank" href="{{ $product->instagram_post }}"
                        class="px-10 text-center rounded-full py-3 bg-primary text-white">Kunjungi Kostum</a>
                    <a target="_blank" href="https://instagram.com/{{ strtolower($product->user->username_instagram) }}"
                        class="px-10 text-center rounded-full py-3 bg-fuchsia-500 text-white">Kunjungi Toko</a>
                    @if ($wishlist)
                        <form class="flex relative" action="/wishlist/delete/{{ $product->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="bg-indigo-500 w-full px-10 text-white  py-3 rounded-full flex justify-center ">
                                Hapus dari wishlist
                            </button>
                        </form>
                    @else
                        <form class="flex relative" action="/wishlist/store/{{ $product->id }}" method="post">
                            @csrf
                            <button class="bg-indigo-500 w-full px-10 text-white  py-3 rounded-full flex justify-center ">
                                Simpam ke wishlist
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <script>
        const changeImage = (filename) => {
            const showImage = document.querySelector('#show-image')
            showImage.src = `/storage/products/${filename}`
        }
    </script>
@endsection
