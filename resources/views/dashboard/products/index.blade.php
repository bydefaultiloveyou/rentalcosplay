@extends('dashboard.layout')

@section('content.dashboard')
    <div class="flex justify-evenly">
        @include('dashboard.products.partials.sidebar')
        <div class="w-[75%]">
            @include('dashboard.partials.breadcrub', ['items' => ['Dashboard', 'Products']])
            <p class="font-bold text-black my-1 text-3xl">Products</p>
            <div class="flex gap-6 my-6">
                @include('dashboard.products.partials.badge', [
                    'label' => 'Total Products',
                    'value' => count(\App\Models\Product::where('user_id', request()->cookie('uuid'))->get()),
                ])
                @include('dashboard.products.partials.badge', [
                    'label' => 'Total Views',
                    'value' => \App\Models\Product::where('user_id', request()->cookie('uuid'))->sum('views'),
                ])
            </div>
            <div class="mt-10">
                @include('dashboard.partials.table', [])
            </div>
        </div>
    </div>
@endsection
