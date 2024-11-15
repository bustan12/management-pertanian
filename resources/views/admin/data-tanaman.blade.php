<x-app-layout>
    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Data Tanaman</h2>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <div class="mb-4 flex justify-between items-center">
                <div class="flex space-x-4">
                    <input type="text" id="search" placeholder="Cari tanaman..." class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" onkeyup="filterTable()">
                    <script>
                        function filterTable() {
                            const input = document.getElementById('search');
                            const filter = input.value.toLowerCase();
                            const table = document.querySelector('table');
                            const rows = table.getElementsByTagName('tr');
                            let found = false;

                            for (let i = 1; i < rows.length; i++) { // Start from 1 to skip header
                                const cells = rows[i].getElementsByTagName('td');
                                const namaTanaman = cells[1].textContent.toLowerCase();

                                if (namaTanaman.includes(filter)) {
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
                    <i class="fas fa-plus mr-2"></i>Tambah Tanaman
                </button>
            </div>
            @if(session('success'))
            <div id="notification" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-md shadow-lg transition-opacity duration-500 opacity-100">
                {{ session('success') }}
            </div>
            @endif

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const notification = document.getElementById('notification');
                    if (notification) {
                        setTimeout(function() {
                            notification.classList.replace('opacity-100', 'opacity-0');
                            setTimeout(function() {
                                notification.remove();
                            }, 500);
                        }, 2500);
                    }
                });
            </script>

            <!-- Modal add -->
            <div id="modal" tabindex="-1" class="fixed z-10 inset-0 overflow-y-auto hidden modal-dialog-scrollable" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full scale-95 opacity-0" id="modal-content">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Tambah Data Tanaman
                                </h3>
                            </div>
                            <div class="mt-2">
                                <!-- Form untuk menambah data tanaman akan ditambahkan di sini -->
                                <form id="addTanamanForm" class="space-y-4" action="{{ route('data-tanaman.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for="nama_tanaman" class="block text-sm font-medium text-gray-700">Nama Tanaman</label>
                                        <input type="text" name="nama_tanaman" id="nama_tanaman" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" required>
                                    </div>
                                    <div>
                                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" rows="3" required></textarea>
                                    </div>
                                    <div>
                                        <label for="jenis_pupuk" class="block text-sm font-medium text-gray-700">Jenis Pupuk</label>
                                        <select name="jenis_pupuk" id="jenis_pupuk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                                            <option value="" disabled selected>Pilih Jenis Pupuk</option>
                                            @foreach ($pupuk as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="jenis_pestisida" class="block text-sm font-medium text-gray-700">Jenis Pestisida</label>
                                        <select name="jenis_pestisida" id="jenis_pestisida" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                                            <option value="" disabled selected>Pilih Jenis Pupuk</option>
                                            @foreach ($pestisida as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                                        <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" required>
                                    </div>
                                    <div>
                                        <label for="cara_penanaman" class="block text-sm font-medium text-gray-700">Cara Penanaman</label>
                                        <textarea name="cara_penanaman" id="cara_penanaman" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" rows="3" required></textarea>
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

            <div class="overflow-x-auto">
                <table class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-center text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" style="width: 5%;">No</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" style="width: 15%;">Nama Tanaman</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" style="width: 35%;">Deskripsi</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-center text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" style="width: 35%;">Gambar Tanaman</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-center text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @if($dataTanaman->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                <p class="text-lg font-semibold">Data tanaman kosong</p>
                                <p class="mt-1">Belum ada tanaman yang terdaftar.</p>
                            </td>
                        </tr>
                        @else
                        @foreach ($dataTanaman as $index => $tanaman)
                        <tr class="bg-white dark:bg-gray-900 dark:text-white border-b border-gray-300">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900 dark:text-white text-center">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 dark:text-gray-400">
                                {{ $tanaman->nama_tanaman }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 dark:text-gray-400">
                                {{ $tanaman->deskripsi }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $tanaman->image) }}" alt="{{ $tanaman->name }}" class="w-40 h-40 object-cover">
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <div class="flex space-x-2 items-center">
                                    <a href="{{ route('detail-tanaman', $tanaman->id) }}" target="_blank" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600" title="Detail">
                                        <i class="fas fa-list"></i>
                                    </a>
                                    <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600" title="Edit" onclick="openEditModal('{{ $tanaman->id }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <!--edit modal-->
                                    <div id="editModal{{ $tanaman->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden modal-dialog-scrollable" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                                <div class="sm:max-w-2xl">
                                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                        <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title">
                                                                Edit Data Tanaman
                                                            </h3>
                                                            <button type="button" onclick="closeEditModal('{{ $tanaman->id }}')" class="absolute top-3 right-4 mt-2 mr-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 focus:outline-none">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <div class="mt-2">
                                                            <form action="{{ route('data-tanaman.update', $tanaman->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mt-4">
                                                                    <label for="nama_tanaman" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Tanaman</label>
                                                                    <input type="text" name="nama_tanaman" id="nama_tanaman" value="{{ $tanaman->nama_tanaman }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                </div>
                                                                <div class="mt-4">
                                                                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                                                                    <textarea name="deskripsi" id="deskripsi" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" rows="3">{{ $tanaman->deskripsi }}</textarea>
                                                                </div>
                                                                <div class="mt-4">
                                                                    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                                                                    <input type="file" name="image" id="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                </div>
                                                                <div class="mt-4">
                                                                    <label for="jenis_pestisida" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Pestisida</label>
                                                                    <select name="jenis_pestisida" id="jenis_pestisida" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                        @foreach ($pestisida as $item)
                                                                        <option value="{{ $item->name }}" {{ $tanaman->jenis_pestisida == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mt-4">
                                                                    <label for="jenis_pupuk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Pupuk</label>
                                                                    <select name="jenis_pupuk" id="jenis_pupuk" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                        @foreach ($pupuk as $item)
                                                                        <option value="{{ $item->name }}" {{ $tanaman->jenis_pupuk == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mt-4">
                                                                    <label for="cara_penanaman" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cara Penanaman</label>
                                                                    <textarea name="cara_penanaman" id="cara_penanaman" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" rows="3">{{ $tanaman->deskripsi }}</textarea>
                                                                </div>
                                                                <div class="mt-5 sm:mt-6">
                                                                    <span class="flex w-full rounded-md shadow-sm">
                                                                        <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                                                                            Simpan
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                                <div class="mt-2 sm:mt-3">
                                                                    <span class="flex w-full rounded-md shadow-md">
                                                                        <button type="button" class="inline-flex justify-center w-full py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="closeEditModal('{{ $tanaman->id }}')">
                                                                            Close
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function openEditModal(id) {
                                            const modal = document.getElementById(`editModal${id}`);
                                            const modalContent = document.getElementById(`editModal${id}-content`);

                                            modal.classList.remove('hidden');
                                            modalContent.classList.remove('scale-95', 'opacity-0');
                                            modalContent.classList.add('scale-100', 'opacity-100');
                                        }
                                    </script>
                                    <script>
                                        function closeEditModal(id) {
                                            const modal = document.getElementById(`editModal${id}`);
                                            modal.classList.add('hidden');
                                        }
                                    </script>

                                    <button onclick="openDeleteModal('{{ $tanaman->id }}')" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div id="deleteModal{{ $tanaman->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                                                                Konfirmasi Penghapusan
                                                            </h3>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500">
                                                                    Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <form action="{{ route('data-tanaman.destroy', $tanaman->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                    <button type="button" onclick="closeDeleteModal('{{ $tanaman->id }}')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                        Batal
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function openDeleteModal(id) {
                                            document.getElementById('deleteModal' + id).classList.remove('hidden');
                                        }

                                        function closeDeleteModal(id) {
                                            document.getElementById('deleteModal' + id).classList.add('hidden');
                                        }
                                    </script>
                                </div>
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