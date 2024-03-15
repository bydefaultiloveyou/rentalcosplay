<div class="flex justify-between items-center border border-gray-200 w-[49%] p-4 rounded-xl bg-gray-50">
    <div class="flex items-center gap-3">
        <div
            class=" bg-[url(https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png)] bg-cover w-12 h-12 rounded-full bg-red-600">
        </div>
        <div class="leading-3">
            <p class="font-bold text-lg text-black/90">
                {{ \App\Models\User::find(request()->cookie('uuid'))->username_instagram }}</p>
            <p class="text-sm text-black/70">Account Seller</p>
        </div>
    </div>
    <a href="{{ route('logout') }}" class="bg-gray-100 border border-gray-200 text-black px-3 py-1 rounded-md">
        Logout
    </a>
</div>
