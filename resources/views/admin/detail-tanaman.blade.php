<x-app-layout>
    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Detail Tanaman</h2>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                @foreach($tanaman as $tanaman)
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 dark:text-gray-300">
                        Nama Tanaman
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 dark:text-white">
                        {{ $tanaman->nama_tanaman }}
                    </dd>
                </dl>
                <dl class="mt-5">
                    <dt class="text-sm leading-5 font-medium text-gray-500 dark:text-gray-300">
                        Deskripsi
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 dark:text-white">
                        {{ $tanaman->deskripsi }}
                    </dd>
                </dl>
                <dl class="mt-5">
                    <dt class="text-sm leading-5 font-medium text-gray-500 dark:text-gray-300">
                        Jenis Pupuk
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 dark:text-white">
                        {{ $tanaman->jenis_pupuk }}
                    </dd>
                </dl>
                <dl class="mt-5">
                    <dt class="text-sm leading-5 font-medium text-gray-500 dark:text-gray-300">
                        Jenis Pestisida
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 dark:text-white">
                        {{ $tanaman->jenis_pestisida }}
                    </dd>
                </dl>
                <dl class="mt-5">
                    <dt class="text-sm leading-5 font-medium text-gray-500 dark:text-gray-300">
                        Cara Penanaman
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 dark:text-white">
                        {{ $tanaman->cara_penanaman }}
                    </dd>
                </dl>

                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>