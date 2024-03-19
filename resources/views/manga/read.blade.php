@extends('layout')

@section('content')
    @include('pages.partials.announcement')
    @include('pages.partials.navbar')
    <main class="relative w-full lg:w-4/5 m-auto">
        <div class="my-6">
            <p class="text-center text-black/90 font-semibold text-lg">{{ request()->query('title') }}</p>
            <p class=" text-center w-[90%] m-auto mt-2 text-black/90">Manga {{ request()->query('title') }} bisa di nikmati
                di
                website <span class="text-primary font-semibold">MangaPlay</span>
                support
                kami dengan memfollow akun instagram kami di <a class="text-indigo-500 font-semibold">Instagram</a> dan
                jangan lupa
                kunjungi
                website resminya di <a href="https://kiryuu.id/" class="text-primary font-semibold" target="_blank">Kiryuu</a>
            </p>
        </div>

        <div class="w-full mt-4">
            @include('manga.partials.navigation')
            @foreach ($images as $image)
                <img loading="lazy" class="w-full" src="{{ $image }}" />
            @endforeach
        </div>


    </main>
    <div class="w-full flex fixed bottom-0 lg:hidden">
        @if ($prev != null)
            <a href="/manga/read/{{ $slug }}/{{ $prev->chapter }}/{{ $prev->slug }}?title={{ request()->query('title') }}"
                class="w-full py-4 text-center bg-primary text-white font-semibold">Prev Chapter</a>
        @endif
        <p class="py-4 bg-indigo-500 text-white px-6">{{ $chapter }}</p>
        @if ($next != null)
            <a href="/manga/read/{{ $slug }}/{{ $next->chapter }}/{{ $next->slug }}?title={{ request()->query('title') }}"
                class="w-full py-4 text-center bg-primary text-white font-semibold">Next Chapter</a>
        @endif
    </div>
@endsection
