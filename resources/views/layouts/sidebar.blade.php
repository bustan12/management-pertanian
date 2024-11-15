<div class="w-64 bg-white dark:bg-gray-800 shadow-md">
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 text-center">
            Admin Panel
        </h1>
    </div>
    <hr class="my-4 border-t-2 border-gray-300 dark:border-gray-600">
    <nav class="mt-2">
        <a href="{{ route('dashboard') }}" class="flex items-center justify-between block py-2.5 px-4 transition duration-200 hover:bg-green-500 hover:text-white dark:hover:bg-green-700 dark:text-gray-100 @if(request()->is('admin/dashboard')) bg-green-500 text-white hover:bg-green-900 @endif">
            <span class="flex items-center">
                <i class="fas fa-home pl-2 mr-3"></i>
                Dashboard
            </span>
            @if(request()->is('admin/dashboard'))
            <span class="ml-2 h-full w-1 bg-green-500"></span>
            @endif
        </a>

        <a href="{{ route('data-tanaman') }}" class="flex items-center justify-between block py-2.5 px-4 transition duration-200 hover:bg-green-500 hover:text-white dark:hover:bg-green-700 dark:text-gray-100 @if(request()->is('admin/data-tanaman')) bg-green-500 text-white hover:bg-green-900 @endif">
            <span class="flex items-center">
                <i class="fas fa-seedling pl-2 mr-3"></i>
                Data Tanaman
            </span>
            @if(request()->is('admin/tanaman'))
            <span class="ml-2 h-full w-1 bg-green-500"></span>
            @endif
        </a>

        <a href="{{ route('data-pupuk') }}" class="flex items-center justify-between block py-2.5 px-4 transition duration-200 hover:bg-green-500 hover:text-white dark:hover:bg-green-700 dark:text-gray-100 @if(request()->is('admin/data-pupuk')) bg-green-500 text-white hover:bg-green-900 @endif">
            <span class="flex items-center">
                <i class="fas fa-recycle pl-2 mr-3"></i>
                Data Pupuk
            </span>
            @if(request()->is('admin/data-pupuk'))
            <span class="ml-2 h-full w-1 bg-green-500"></span>
            @endif
        </a>

        <a href="{{ route('data-pestisida') }}" class="flex items-center justify-between block py-2.5 px-4 transition duration-200 hover:bg-green-500 hover:text-white hover:text-white dark:hover:bg-green-700 dark:text-gray-100 @if(request()->is('admin/data-pestisida')) bg-green-500 text-white hover:bg-green-900 @endif">
            <span class="flex items-center">
                <i class="fas fa-bug pl-2 mr-3"></i>
                Data Pestisida
            </span>
            @if(request()->is('admin/data-pestisida'))
            <span class="ml-2 h-full w-1 bg-green-500"></span>
            @endif
        </a>
    </nav>
</div>