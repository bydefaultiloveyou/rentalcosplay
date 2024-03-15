@extends('layout')

@section('content')
    <div class="h-dvh">
        @include('dashboard.partials.navbar')
        <div class="flex gap-6">
            @include('dashboard.partials.sidebar')
            <div class="py-6 w-full">
                @yield('content.dashboard')
            </div>
        </div>
    </div>
@endsection
