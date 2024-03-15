<div class="flex h-screen w-80 flex-col justify-between bg-white">
    <div class="px-4">
        <ul class="mt-6 space-y-1">
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="block rounded-lg px-4 py-2 text-sm font-medium  {{ $page == 'dashboard' ? 'text-primary bg-gray-100' : 'text-gray-700' }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('product.dashboard.index') }}"
                    class="block rounded-lg px-4 py-2 text-sm font-medium {{ $page == 'product' ? 'text-primary bg-gray-100' : 'text-gray-700' }}">
                    Products
                </a>
            </li>
        </ul>
    </div>
</div>
