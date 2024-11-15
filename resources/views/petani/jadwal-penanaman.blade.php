<x-app-layout>
    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Jadwal Kegiatan</h2>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <div class="mb-4 flex justify-between items-center">
                <div class="flex space-x-4">
                    <input type="text" placeholder="Cari jadwal..." class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <button id="openModal" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>Tambah Jadwal
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

            <!-- Modal -->
            <div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full scale-95 opacity-0" id="modal-content">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Tambah Jadwal
                            </h3>
                            <div class="mt-2">
                                <!-- Form untuk menambah data tanaman akan ditambahkan di sini -->
                                <form id="addJadwalForm" class="space-y-4" action="{{ route('jadwal.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                        <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" required>
                                    </div>
                                    <div>
                                        <label for="tanaman_id" class="block text-sm font-medium text-gray-700">Nama Tanaman</label>
                                        <select name="tanaman_id" id="tanaman_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" required>
                                            <option value="">Pilih Tanaman</option>
                                            @foreach(\App\Models\DataTanaman::all() as $tanaman)
                                            <option value="{{ $tanaman->id }}">{{ $tanaman->nama_tanaman }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="kegiatan" class="block text-sm font-medium text-gray-700">Kegiatan</label>
                                        <select name="kegiatan" id="kegiatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" required>
                                            <option value="">Pilih Kegiatan</option>
                                            <option value="Penyiraman">Penyiraman</option>
                                            <option value="Pemupukan">Pemupukan</option>
                                            <option value="Perawatan">Perawatan</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="gambar_kegiatan" class="block text-sm font-medium text-gray-700">Gambar Kegiatan</label>
                                        <input type="file" name="gambar_kegiatan" id="gambar_kegiatan" class="mt-1 block w-full text-sm text-gray-500
                                            file:mr-4 file:py-2 file:px-4
                                            file:rounded-md file:border-0
                                            file:text-sm file:font-semibold
                                            file:bg-green-50 file:text-green-700
                                            hover:file:bg-green-100
                                            focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50" required>
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
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kegiatan</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nama Tanaman</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Gambar Kegiatan</th>
                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @php
                        $jadwalPetani = $jadwals->where('nama_petani', auth()->user()->name);
                        @endphp
                        @if($jadwalPetani->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                <p class="text-lg font-semibold">Jadwal kosong</p>
                                <p class="mt-1">Belum ada jadwal yang terdaftar.</p>
                            </td>
                        </tr>
                        @else
                        @php
                        $jadwals = $jadwals->where('nama_petani', auth()->user()->name);
                        @endphp
                        @foreach ($jadwals as $index => $jadwal)
                        <tr class="bg-white dark:bg-gray-900 dark:text-white border-b border-gray-300">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900 dark:text-white">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 dark:text-gray-400">
                                {{ $jadwal->tanggal }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 dark:text-gray-400">
                                {{ $jadwal->kegiatan }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 dark:text-gray-400">
                                {{ \App\Models\DataTanaman::find($jadwal->tanaman_id)->nama_tanaman }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 dark:text-gray-400">
                                @if($jadwal->gambar_kegiatan)
                                <img src="{{ asset('storage/' . $jadwal->gambar_kegiatan) }}" alt="Gambar Kegiatan" class="w-16 h-16 object-cover rounded">
                                @else
                                <span>Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <div class="flex space-x-2 items-center">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600" title="Ubah">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="openDeleteModal('{{ $jadwal->id }}')" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div id="deleteModal{{ $jadwal->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                                                    <form action="{{ route('jadwal.delete', $jadwal->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                    <button type="button" onclick="closeDeleteModal('{{ $jadwal->id }}')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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