@extends('layout')

@section('content')
    @include('pages.partials.navbar')
    <main class="relative w-full lg:w-4/5 m-auto">
        <div class="px-4">
            <form action="/search" method="get" class="mb-10">
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <input type="text" name="query" value="{{ request()->query('query') }}"
                        placeholder="Cari Kostum, Karakter, Anime atau Kota"
                        class="rounded-md border w-full lg:w-[70%] px-4 border-gray-200 py-3" />
                    @include('pages.partials.button')
                </div>
            </form>
        </div>

        @if (count($products) == 0)
            @include('pages.partials.notfound')
        @else
            <div class="grid grid-cols-2 lg:grid-cols-4">
                @foreach ($products as $product)
                    @include('pages.partials.card-product', [
                        'id' => $product->id,
                        'cover' => $product->image[0]->filename,
                        'title' => $product->name,
                        'price' => $product->price,
                        'domisili' => $product->user->domisili,
                        'duration' => $product->rental_duration,
                        'owner' => $product->user->username_instagram,
                    ])
                @endforeach
            </div>
        @endif
        @include('pages.partials.footer')
    </main>
@endsection
