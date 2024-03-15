@extends('layout')

@section('content')
    @include('pages.partials.navbar')
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">

            <h1 class="text-center text-2xl font-bold text-primary sm:text-3xl">Pendaftaran Seller</h1>

            <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
                Daftar akun instagram yang ada pakai untuk rental
            </p>

            <form action="{{ route('register.dashboard.store') }}" method='post'
                class="mb-0 mt-6 space-y-4 rounded-lg p-4 sm:p-6 lg:p-8">
                @csrf

                <p class="text-center text-lg font-medium">Daftarkan akun instagram anda</p>

                @include('dashboard.register.partials.input', [
                    'labelText' => 'Akun Instagram',
                    'type' => 'text',
                    'placeholder' => 'Masukan username akun instagram anda',
                    'name' => 'username_instagram',
                ])

                @include('dashboard.register.partials.input', [
                    'labelText' => 'Kota tempat toko berjualan',
                    'type' => 'text',
                    'placeholder' => 'Masukan kota tempat kamu berjualan',
                    'name' => 'domisili',
                ])

                <button type="submit" class="block w-full rounded-lg bg-primary px-5 py-3 text-sm font-medium text-white">
                    Daftar
                </button>
            </form>
        </div>
    </div>
@endsection
