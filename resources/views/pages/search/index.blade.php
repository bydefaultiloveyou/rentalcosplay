@extends('layout')

@section('content')
    @include('pages.partials.navbar')
    <main class="relative w-full lg:w-4/5 m-auto">
        <div>
            <div>

                <form action="/search" method="get">
                    <div class="w-full items-center flex flex-col lg:flex-row justify-center my-6 lg:my-10 gap-4">
                        <input type="text" name="query" value="{{ $query }}"
                            placeholder="Cari Kostum, Karakter atau Anime"
                            class="rounded-md outline-none border w-[90%] lg:w-[70%] px-2.5 border-gray-200 py-2.5 sm:text-sm">
                        <div class="w-[90%] lg:w-0">
                            <button
                                class="inline-block rounded bg-primary px-8 lg:px-12 py-2 lg:py-2.5 text-sm font-medium text-white hover:bg-gray-200 hover:text-black focus:outline-none focus:ring active:text-indigo-500">
                                <svg stroke="white" fill="white" stroke-width="0" viewBox="0 0 512 512" class="w-6"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M456.69 421.39 362.6 327.3a173.81 173.81 0 0 0 34.84-104.58C397.44 126.38 319.06 48 222.72 48S48 126.38 48 222.72s78.38 174.72 174.72 174.72A173.81 173.81 0 0 0 327.3 362.6l94.09 94.09a25 25 0 0 0 35.3-35.3zM97.92 222.72a124.8 124.8 0 1 1 124.8 124.8 124.95 124.95 0 0 1-124.8-124.8z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>

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
            </div>
        </div>
        @include('pages.partials.footer')
    </main>
@endsection
