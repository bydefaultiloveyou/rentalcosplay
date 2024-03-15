@extends('dashboard.layout')

@section('content.dashboard')
    <form action="/dashboard/product/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-evenly">
            @include('dashboard.products.partials.sidebar')
            <div class="w-[75%]">
                @include('dashboard.partials.breadcrub', ['items' => ['Dashboard', 'Products', 'Create']])
                <p class="font-bold text-black my-6 text-3xl">Create Products</p>
                <div class="flex justify-between">
                    <div class="w-2/3">
                        @include('dashboard.products.partials.create.information')
                        @include('dashboard.products.partials.create.upload')
                        @include('dashboard.products.partials.create.price')
                        <button class="p-3 bg-primary w-full rounded-lg text-white font-semibold">Tambah</button>
                    </div>
                    <div class=" w-[32%]">
                        @include('dashboard.products.partials.create.character')
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="/js/dashboard/products/create.js"></script>
@endsection
