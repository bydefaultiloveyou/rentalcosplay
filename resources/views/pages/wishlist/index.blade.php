@extends('layout')

@section('content')
    @include('pages.partials.navbar')

    <main class="w-full lg:w-4/5 m-auto">
        <p class="text-2xl text-black my-6 lg:my-10 font-semibold px-4 lg:px-0">Simpanan nih ye..</p>

        @if (count($wishlists) == 0)
            @include('pages.partials.notfound')
        @else
            <div class="grid grid-cols-2 lg:grid-cols-4">
                @foreach ($wishlists as $wishlist)
                    @include('pages.partials.card-product', [
                        'id' => $wishlist->product->id,
                        'cover' => $wishlist->product->image[0]->filename,
                        'title' => $wishlist->product->name,
                        'price' => $wishlist->product->price,
                        'domisili' => $wishlist->user->domisili,
                        'duration' => $wishlist->product->rental_duration,
                        'owner' => $wishlist->user->username_instagram,
                    ])
                @endforeach
            </div>
        @endif

        @include('pages.partials.footer')
    </main>
@endsection
