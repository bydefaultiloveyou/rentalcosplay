<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Cosplay Indonesia | Platform Catalog untuk kebutuhan ngewibu</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta name="title" content="Rental Cosplay Indonesia">
    <meta name="description" content="Penyedia catalog cosplay terlengkap, cari cosplay ngak ribet lagi langsung all in">
    <meta name="keywords"
        content="Cosplay, Wibu, Indonesia, RentalCosplay, Rental Cosplay, Rental Costum, Rental, Rental Kostum, Forum, Instagram">
    <meta name="author" content="Miko Meysa Bima">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>

    @if (session('success'))
        <div id="flash" class="bg-green-400 px-4 py-3 text-white">
            <p class="text-center text-sm font-medium">
                {{ session('success') }}
            </p>
        </div>
    @elseif(session('error'))
        <div id="flash" style="background-color: #f87171;" class="px-4 py-3 text-white">
            <p class="text-center text-sm font-medium">
                {{ session('error') }}
            </p>
        </div>
    @endif

    @yield('content')
    @livewireScripts

    <script>
        setTimeout(() => {
            document.querySelector("#flash").remove();
        }, 2000)
    </script>
</body>

</html>
