<section>
    <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:items-center">
        <div class="mx-auto max-w-xl text-center text-black">
            <h1 class="text-3xl font-extrabold sm:text-5xl">
                Cari Cosplay no Ribet
                <strong class="font-extrabold text-primary sm:block mt-3">Agar Karir makin Mantep</strong>
            </h1>

            <p class="mt-4 sm:text-xl/relaxed opacity-70">
                Cari kostum langsung all in agar gak kayak orang stalking
            </p>

            <form action="/search" method="get">
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <input type="text" id="Search" name="query"
                        placeholder="Cari Kostum, Karakter, Anime atau Kota"
                        class="rounded-md border w-[80%] lg:w-[70%] px-2.5 border-gray-200 py-2.5 sm:text-sm" />
                    @include('pages.partials.button')
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
