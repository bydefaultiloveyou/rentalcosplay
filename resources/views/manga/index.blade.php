@extends('layout')

@section('content')
    @include('pages.partials.announcement')

    @include('pages.partials.navbar')

    <main class="w-full lg:w-4/5 p-4 m-auto">
        <div class="w-full h-40 lg:h-96 bg-red-400 bg-center lg:bg-contain bg-cover rounded-lg"
            style="background-image: url({{ asset('img/src/banner.png') }})">
        </div>

        <form action="/manga/search" method="get">
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <input type="text" id="Search" name="query" placeholder="Cari judul manga"
                    class="rounded-md border w-[80%] lg:w-[70%] px-2.5 border-gray-200 py-2.5 sm:text-sm" />
                @include('pages.partials.button')
            </div>
        </form>
        <div class="px-2 lg:px-0 my-10">
            <p class=" text-3xl lg:text-4xl text-black font-extrabold">Manga Rekomendasi <span
                    class="lg:text-3xl opacity-90 text-primary">#BestForYou</span></p>
        </div>

        @if (count($mangas) == 0)
            @include('pages.partials.notfound')
        @else
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
                @foreach ($mangas as $manga)
                    @include('manga.partials.card')
                @endforeach
            </div>
        @endif

        @include('manga.partials.footer')
    </main>
@endsection
