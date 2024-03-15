@extends('dashboard.layout')

@section('content.dashboard')
    <div class=" w-4/5 m-auto">
        <p class="font-bold text-black text-3xl">Dashboard</p>
        <div class="mt-4">
            <div class="flex justify-between">
                @include('dashboard.home.partials.badge-account')

                {{-- advertisment --}}
                <div class="flex gap-4 items-center border border-gray-200 w-[49%] p-4 rounded-xl bg-gray-50">
                    <img src="/img/svg/store.svg" class="w-12 h-12 bg-primary/20 box-border p-3 rounded-full" />
                    <div class="leading-3">
                        <p class="font-bold text-lg text-black/90">Iklankan Tokomu</p>
                        <p class="text-sm text-black/70">Untuk Mengaet Costumer lebih banyak</p>
                    </div>
                </div>
            </div>
            <div>
                @include('dashboard.partials.table', ['products' => $products])
            </div>
        </div>
    </div>
@endsection
