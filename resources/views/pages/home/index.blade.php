@extends('layout')

@section('content')
    @include('pages.partials.announcement')
    @include('pages.partials.navbar')

    <main class="relative w-full lg:w-4/5 m-auto">
        @include('pages.partials.banner')

        <div class="px-4 lg:px-0">
            <p class=" text-3xl lg:text-4xl text-black font-extrabold">Random Kostum <span
                    class="lg:text-3xl opacity-90 text-primary">#BestForYou</span></p>
        </div>

        @if (count($products) == 0)
            @include('pages.partials.notfound')
        @else
            <div class="grid grid-cols-2 lg:grid-cols-4 mt-6">
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
