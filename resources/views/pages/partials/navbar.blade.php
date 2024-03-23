<header class="w-full border border-b-gray-200">
    <div class="w-full lg:w-4/5 m-auto p-3 lg:p-4 flex justify-between items-center">
        <a href="{{ route('home.index') }}">
            <p class="text-2xl font-extrabold text-black">Rental<span class="text-primary">Cosplay</span></p>
        </a>
        <div class="flex flex-row-reverse lg:flex-row gap-2 lg:gap-8 items-center">
            <a href="{{ route('wishlist.index') }}">
                <div class="p-2 hover:bg-gray-100 rounded-lg relative">
                    <div
                        class="bg-red-500 rounded-full w-5 flex justify-center items-center h-5 right-0 -top-[2px] absolute">
                        <p class="text-white font-semibold text-[14px] mb-[1px]">
                            {{ count(App\Models\Wishlist::with('product')->with('user')->where('user_id', request()->cookie('uuid'))->get()) }}
                        </p>
                    </div>
                    <svg class="w-8 text-black" stroke="currentColor" fill="currentColor" stroke-width="0"
                        viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
                            d="M80 176a16 16 0 0 0-16 16v216c0 30.24 25.76 56 56 56h272c30.24 0 56-24.51 56-54.75V192a16 16 0 0 0-16-16zm80 0v-32a96 96 0 0 1 96-96h0a96 96 0 0 1 96 96v32">
                        </path>
                        <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
                            d="M160 224v16a96 96 0 0 0 96 96h0a96 96 0 0 0 96-96v-16"></path>
                    </svg>
                </div>
            </a>
            @if (request()->cookie('authenticated'))
                @if (\App\Models\User::find(request()->cookie('uuid'))->role == 'seller')
                    <a href="{{ route('dashboard.index') }}" class="hidden lg:block">
                        <div
                            class="border-2 border-indigo-400 text-indigo-400 hover:bg-indigo-400 hover:text-white rounded-full py-1 px-4">
                            <p class=" font-semibold text-md">Dashboard</p>
                        </div>
                    </a>
                @endif
                <a href="{{ route('logout') }}">
                    <div
                        class="border-2 border-red-400 text-red-400 hover:bg-red-400 hover:text-white rounded-full py-1 px-4">
                        <p class=" font-semibold text-md">Keluar</p>
                    </div>
                </a>
            @else
                <a href="{{ route('login.create') }}">
                    <div
                        class="border-2 border-primary text-primary hover:bg-primary hover:text-white rounded-full py-1 px-4">
                        <p class=" font-semibold text-md">Masuk</p>
                    </div>
                </a>
            @endif
            <p class=" mr-2 hidden lg:block">|</p>

            <form action="/search" method="get">
                <input type="text" placeholder="Search..." name="query"
                    class="w-full hidden lg:block rounded-md border p-2 outline-none border-gray-200 sm:text-sm">
            </form>
        </div>
    </div>
</header>
