<x-app-layout>
    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Data Pupuk</h2>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <div class="mb-4 flex justify-between items-center">
                <div class="relative">
                    <input type="text" id="search" placeholder="Cari Pupuk..." class="border border-gray-300 rounded-md px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500" onkeyup="filterTable()">
                    <script>
                        function filterTable() {
                            const input = document.getElementById('search');
                            const filter = input.value.toLowerCase();
                            const table = document.querySelector('table');
                            const rows = table.getElementsByTagName('tr');
                            let found = false;

                            for (let i = 1; i < rows.length; i++) { // Start from 1 to skip header
                                const cells = rows[i].getElementsByTagName('td');
                                const namaPupuk = cells[1].textContent.toLowerCase();

                                if (namaPupuk.includes(filter)) {
                                    rows[i].style.display = '';
                                    found = true;
                                } else {
                                    rows[i].style.display = 'none';
                                }
                            }

                            const notification = document.getElementById('no-results');

                            if (!found && filter.length > 0) { // Check if filter is not empty
                                if (!notification) {
                                    const noResults = document.createElement('div');
                                    noResults.id = 'no-results';
                                    noResults.className = 'text-red-500 mt-2';
                                    noResults.textContent = 'Nama Tanaman yang dicari tidak ada.';
                                    document.querySelector('.overflow-x-auto').appendChild(noResults);
                                }
                            } else {
                                if (notification) {
                                    notification.remove();
                                }
                            }
                        }
                    </script>
                </div>
                <button id="openModal" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>Tambah Data
                </button>
                <div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full scale-95 opacity-0" id="modal-content">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Tambah Data Pupuk
                                    </h3>
                                </div>
                                <div class="mt-2">
                                    <!-- Form untuk menambah data tanaman akan ditambahkan di sini -->
                                    <form class="space-y-4" action="{{ route('data-pupuk.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Pupuk</label>
                                            <input type="text" name="name" id="name" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" required>
                                        </div>

                                        <div>
                                            <label for="image" class="block text-sm font-medium text-gray-700">Gambar (max 10MB)</label>
                                            <input type="file" name="image" id="image" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm" id="saveButton">
                                                Simpan
                                            </button>
                                            <button type="button" id="closeModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    document.getElementById('openModal').addEventListener('click', function() {
                        const modal = document.getElementById('modal');
                        const modalContent = document.getElementById('modal-content');

                        modal.classList.remove('hidden');
                        modalContent.classList.remove('scale-95', 'opacity-0');
                        modalContent.classList.add('scale-100', 'opacity-100');

                    });

                    document.getElementById('closeModal').addEventListener('click', function() {
                        const modal = document.getElementById('modal');
                        const modalContent = document.getElementById('modal-content');

                        modalContent.classList.remove('scale-100', 'opacity-100');
                        modalContent.classList.add('scale-95', 'opacity-0');

                        // Menunggu animasi selesai sebelum menyembunyikan modal
                        setTimeout(() => {
                            modal.classList.add('hidden');
                        }, 300); // Sesuaikan dengan durasi animasi
                    });
                </script>
            </div>
            <script>
                function filterTable() {
                    const input = document.getElementById('search');
                    const filter = input.value.toLowerCase();
                    const table = document.querySelector('table');
                    const rows = table.getElementsByTagName('tr');
                    let found = false;

                    for (let i = 1; i < rows.length; i++) { // Start from 1 to skip header
                        const cells = rows[i].getElementsByTagName('td');
                        let rowContainsText = false;

                        for (let j = 0; j < cells.length; j++) {
                            if (cells[j].textContent.toLowerCase().includes(filter)) {
                                rowContainsText = true;
                                break;
                            }
                        }

                        if (rowContainsText) {
                            rows[i].style.display = '';
                            found = true;
                        } else {
                            rows[i].style.display = 'none';
                        }
                    }

                    // Show notification if no results found
                    const notification = document.getElementById('no-results');
                    if (!found && filter.length > 0) { // Check if filter is not empty
                        if (!notification) {
                            const noResults = document.createElement('div');
                            noResults.id = 'no-results';
                            noResults.className = 'text-red-500 mt-2';
                            noResults.textContent = 'Data yang dicari tidak ada.';
                            document.querySelector('.overflow-x-auto').appendChild(noResults);
                        }
                    } else {
                        if (notification) {
                            notification.remove();
                        }
                    }
                }
            </script>
            @if(session('success'))
            <div id="notification" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-md shadow-lg transition-opacity duration-500 opacity-100">
                {{ session('success') }}
            </div>
            @elseif(session('error'))
            <div id="notification" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-md shadow-lg transition-opacity duration-500 opacity-100">
                {{ session('error') }}
            </div>
            @endif
            <script>
                const notification = document.getElementById('notification');

                if (notification) {
                    setTimeout(function() {
                        notification.classList.replace('opacity-100', 'opacity-0');
                        setTimeout(function() {
                            notification.remove();
                        }, 500);
                    }, 2500);
                }
            </script>
            <div class="overflow-x-auto">
                <table class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" style="width: 5%;">No</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" style="width: 20%;">Nama Pupuk</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-center text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" style="width: 50%;">Image</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-center text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @if($pupuk->isEmpty())
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                <p class="text-lg font-semibold">Data pupuk kosong</p>
                                <p class="mt-1">Belum ada pupuk yang terdaftar.</p>
                            </td>
                        </tr>
                        @else
                        @foreach ($pupuk as $index => $pupuk)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100 text-center">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $pupuk->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $pupuk->image) }}" alt="{{ $pupuk->name }}" class="w-40 h-40 object-cover">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 text-center">
                                <button type="button" onclick="openDeleteModal('{{ $pupuk->id }}')" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Hapus
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div id="delete-modal-{{ $pupuk->id }}" class="fixed z-10 inset-0 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                            Konfirmasi Hapus Data
                                                        </h3>
                                                        <div class="mt-2">
                                                            <p class="text-sm text-gray-500">
                                                                Apakah Anda yakin ingin menghapus data "{{ $pupuk->name }}"? Data yang dihapus tidak dapat dikembalikan.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <form action="{{ route('data-pupuk.destroy', $pupuk->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                        Hapus
                                                    </button>
                                                </form>
                                                <button type="button" onclick="closeDeleteModal('{{ $pupuk->id }}')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                    Batal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function openDeleteModal(id) {
                                        const modal = document.getElementById(`delete-modal-${id}`);
                                        const modalContent = document.getElementById(`delete-modal-${id}-content`);

                                        modal.classList.remove('hidden');
                                        modalContent.classList.remove('scale-95', 'opacity-0');
                                        modalContent.classList.add('scale-100', 'opacity-100');

                                    }

                                    function closeDeleteModal(id) {
                                        const modal = document.getElementById(`delete-modal-${id}`);
                                        const modalContent = document.getElementById(`delete-modal-${id}-content`);

                                        modalContent.classList.remove('scale-100', 'opacity-100');
                                        modalContent.classList.add('scale-95', 'opacity-0');

                                        // Menunggu animasi selesai sebelum menyembunyikan modal
                                        setTimeout(() => {
                                            modal.classList.add('hidden');
                                        }, 300); // Sesuaikan dengan durasi animasi
                                    }
                                </script>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>