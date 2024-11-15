<x-app-layout>
    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Dashboard</h2>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 w-full max-w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-100 dark:bg-blue-800 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-200 mb-2">Total Tanaman</h3>
                    <p class="text-3xl font-bold text-blue-600 dark:text-blue-300">{{ $dataTanaman }}</p>
                </div>

                <div class="bg-green-100 dark:bg-green-800 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-green-800 dark:text-green-200 mb-2">Total Pupuk</h3>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-300">{{ $pupuk }}</p>
                </div>

                <div class="bg-red-100 dark:bg-red-800 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-red-800 dark:text-red-200 mb-2">Total Pestisida</h3>
                    <p class="text-3xl font-bold text-red-600 dark:text-red-300">{{ $pestisida }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>