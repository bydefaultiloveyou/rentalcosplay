@extends('layout')

@section('content')
    @include('pages.partials.announcement')
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
    @include('pages.partials.navbar')
@endsection
