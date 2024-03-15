@extends('dashboard.layout')

@section('content.dashboard')
    <div class="flex justify-evenly">
        <div class="w-[75%]">
            @include('dashboard.partials.breadcrub', ['items' => ['Dashboard', 'Products', 'Edit']])
            <p class="font-bold text-black my-6 text-3xl">Edit Product Products</p>

            <form action="/dashboard/product/put/{{ $product->id }}" id="put" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="flex justify-between">
                    <div class="w-2/3">
                        @include('dashboard.products.partials.create.information')
                        @include('dashboard.products.partials.create.price')
                    </div>
                    <div class=" w-[32%]">
                        @include('dashboard.products.partials.create.character')
                    </div>
                </div>
            </form>

            <div class="flex gap-3">
                <button class="p-3 bg-primary w-full rounded-lg text-white font-semibold" form="put">Simpan</button>

                <form class="w-full" action="/dashboard/product/delete/{{ $product->id }}" id="put" method="post">
                    @csrf
                    @method('delete')
                    <button class="p-3 bg-red-400 w-full rounded-lg text-white font-semibold">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script src="/js/dashboard/products/create.js"></script>
@endsection
