<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Lazuard Agritech</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    @vite('resources/css/app.css')

    <style>
        html {
            scroll-behavior: smooth;
        }

        @media (max-width: 640px) {
            .carousel-inner {
                width: 100%;
                padding: 10px;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated {
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .fadeInUp {
            animation-name: fadeInUp;
            animation-duration: 1s;
            animation-delay: 0.3s;
            /* Atur delay sesuai kebutuhan */
        }
    </style>


</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-lg fixed top-0 left-0 z-50 w-full h-24">
        <nav class="container mx-auto p-5 flex justify-between items-center h-full">
            <x-application-logo class="w-12 h-auto">Brand</x-application-logo>
            <div>
                <a onclick="navigateTo('about-us')" class="text-nav border-0 ml-2 cursor-pointer" onmouseover="this.style.color='#06D001';" onmouseout="this.style.color='';">Tentang Kami</a>
                <a onclick="navigateTo('produk-kami')" class="text-nav border-0 ml-2 cursor-pointer" onmouseover="this.style.color='#06D001';" onmouseout="this.style.color='';">Lihat Tanaman</a>
            </div>
            <script>
                function navigateTo(sectionId) {
                    const section = document.getElementById(sectionId);
                    if (section) {
                        section.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            </script>
        </nav>
    </header>

    @if (session('success'))
    <div class="fixed inset-0 z-50 flex items-center justify-center" id="flash-message-container">
        <div class="bg-white rounded-md shadow-lg p-4 animate-fade-in-up" id="flash-message">
            <p class="text-green-600 text-center">{{ session('success') }}</p>
        </div>
    </div>
    <script>
        setTimeout(function() {
            const flashMessage = document.getElementById('flash-message');
            const flashMessageContainer = document.getElementById('flash-message-container');
            flashMessage.classList.add('opacity-100');
            flashMessage.classList.remove('opacity-0');
            setTimeout(function() {
                flashMessage.classList.add('opacity-0');
                flashMessage.classList.remove('opacity-100');
                setTimeout(function() {
                    flashMessage.remove();
                    flashMessageContainer.remove();
                }, 500);
            }, 2500);
        }, 500);
    </script>
    @endif

    <section class="bg-black min-h-screen animated" id="awal">
        <div class="container mx-auto p-4 text-center">
            <div class="flex flex-col items-center justify-center mt-36">
                <x-application-logo class="mb-3 mt-8 text-white w-36 h-auto"></x-application-logo>
                <h1 class="text-5xl font-bold text-gray-600">Selamat Datang di <span class="text-5xl font-bold bg-gradient-to-r from-green-500 to-green-700 text-transparent bg-clip-text pb-6">SIMANTAN</span></h1>
                <h1 class="text-3xl font-bold text-gray-600 mt-3">Sistem Management Pertanian</h1>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-green-500 to-green-700 text-transparent bg-clip-text mt-3 pb-2">PT. Lazuard Agritech</h1>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-20 my-8 animated" id="about-us">
        <h2 class="text-4xl font-bold text-center mt-12 mb-12 text-gray-600">Tentang Kami</h2>
        <div class="flex justify-center items-center px-5">
            <div class="card bg-black shadow-md rounded-lg overflow-hidden mr-4 ml-6">
                <div class="card-body p-4">
                    <h5 class="text-lg font-bold text-green-600">Profil Perusahaan</h5>
                    <p class="text-md text-gray-400 mt-2">
                        PT. LAZUARD AGRITECH INDONESIA adalah perusahan yang bergerak dibidang jasa produksi dan pembangunan kontruksi Green House serta menyediakan hasil pertanian yang berkualitas dengan menggunakan teknologi modern. Sejak tahun 2013 dalam perjalanannya sebelum diresmikan berupa legalitas pada tahun 2022 telah budidaya cabai paprika dan sayuran premium lainya sekaligus mendirikan Green House diberbagai daerah di Pulau Jawa. Fokus PT. Lazuard Agritech adalah memenuhi kebutuhan hasil pertanian juga sarana pendukung pertanian modern yang berkualitas dan berkelanjutan.
                        Didalam bidang pembangunan proyek Green House PT. Lazuard Agritech menggabungkan teknologi modern dengan pengalaman praktis PT. Lazuard Agritech dalam pertanian dan kontruksi untuk keperluan dibidang budidaya sendiri, juga beberapa perusahaan rekanan. PT. Lazuard Agritech percaya bahwa pertanian modern dan berkelanjutan dapat turut serta dalam menjaga ketahanan pangan, juga meningkatkan kualitas pertanian Nasional.
                        PT. LAZUARD AGRITECH INDONESIA siap melayani kebutuhan hasil pertanian serta Pembangunan Green House ke seluruh wilayah nusantara. Pada bidang Green House PT. Lazuard Agritech Melayani mulai dari desain, perencanaan, dan pemasangan dengan didukung tim ahli yang profesional. Komitmen PT. Lazuard Agritech adalah memberikan solusi yang inovatif dan efisien bagi pertanian. Serta meningkatkan hasil panen dan keuntungan pada pelaku bisnis dibidang pertanian.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-20 my-8 animated" id="produk-kami">
        <h2 class="text-4xl font-bold text-center mt-12 mb-4 text-gray-600">Tanaman</h2>
        <div class="flex flex-wrap justify-center">
            @foreach ($tanaman as $tanaman)
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <img src="{{ asset('storage/' . $tanaman->image) }}" alt="{{ $tanaman->name }}" class="w-full h-48 object-cover">
                    <h3 class="text-2xl font-bold mt-2">{{ $tanaman->name }}</h3>
                    <p class="text-sm mt-2">{{ Str::limit($tanaman->deskripsi, 150) }}</p>
                    <div class="flex justify-end mt-3">
                        <a href="{{ route('detail', $tanaman->nama_tanaman) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" target="_blank">Lihat Detail...</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <footer class="bg-black text-white p-2">
        <div class="container mx-auto flex flex-wrap justify-between">
            <div class="w-full md:w-1/2 lg:w-1/3 p-4 text-gray-400">
                <h3 class="font-bold text-2xl mb-4">Kontak Kami</h3>
                <ul class="list-none mb-4">
                    <li class="mb-1"><i class="fas fa-phone mr-2"></i> 085157388409</li>
                    <li class="mb-1"><i class="fas fa-envelope mr-2"></i> lazuardagritech@gmail.com</li>
                    <li class="mb-1"><i class="fas fa-map-marker-alt mr-2"></i> Alamat : Ds. Gesing, Kec. Garung, Kabupaten Wonosobo, Jawa Tengah</li>
                </ul>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 p-4 text-gray-400">
                <h3 class="font-bold text-2xl mb-4">Social Media</h3>
                <ul class="list-none mb-4 flex justify-center md:justify-start">
                    <li class="mr-4">
                        <a href="https://www.instagram.com/pt.lazuardagritech?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-instagram text-3xl"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fadeInUp');
                    }
                });
            }, {
                threshold: 0.5 // Trigger ketika 50% elemen masuk dalam viewport
            });

            // Mengamati elemen dengan kelas 'animated'
            document.querySelectorAll('.animated').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>

</html>