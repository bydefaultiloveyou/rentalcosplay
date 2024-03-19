@extends('layout')
@section('content')
    @include('pages.partials.announcement')

    @include('pages.partials.navbar')
    <main class="relative w-full lg:w-4/5 m-auto">
        <div class="flex flex-col lg:flex-row p-4 justify-center gap-10 mt-10">
            <div>
                <div class="relative h-[350px] lg:h-[600px] w-[100%] lg:w-[400px] mb-2">
                    <img id="show-image" src="{{ $manga->cover }}" alt=""
                        class="absolute inset-0 h-full w-full rounded-lg object-cover opacity-100" />
                </div>
            </div>

            <div class=" w-full lg:w-2/4">
                @include('manga.partials.detail')

                <div class=" flex flex-col py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-black">Chapters</dt>
                    <div class="mt-5 lg:mt-0 h-80 w-full overflow-y-scroll flex flex-col-reverse gap-6">
                        @foreach ($manga->chapter as $chapter)
                            <a target="_blank"
                                href="/manga/read/{{ $slug }}/{{ $chapter->chapter }}/{{ $chapter->slug }}?title={{ $manga->title }}"
                                class="px-10 text-center rounded-full py-3 border border-gray-200 text-black">Chapter
                                {{ $chapter->chapter }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
