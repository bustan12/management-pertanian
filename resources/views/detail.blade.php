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
                <a href="{{ route('welcome') }}" class="text-nav border-0 ml-2 cursor-pointer" onmouseover="this.style.color='#06D001';" onmouseout="this.style.color='';">Kembali</a>
            </div>
        </nav>
    </header>

    <main class="container mx-auto p-5 mt-24">
        <section class="bg-white rounded-lg shadow-lg p-5">
            @foreach($tanaman as $tanaman)
            <h2 class="text-3xl font-bold mb-4 text-center">{{ $tanaman->nama_tanaman }}</h2>
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $tanaman->image) }}" alt="{{ $tanaman->nama_tanaman }}" class="rounded-lg shadow-lg max-w-md mx-auto">
            </div>
            <p class="text-lg mb-4">{{ $tanaman->deskripsi }}</p>
            <h3 class="text-2xl font-bold mb-4">Jenis Pupuk yang Dipakai</h3>
            <ul class="list-disc list-inside mb-4">
                <li>{{ $tanaman->jenis_pupuk }}</li>
            </ul>
            <h3 class="text-2xl font-bold mb-4">Jenis Pestisida yang Dipakai</h3>
            <ul class="list-disc list-inside mb-4">
                <li>{{ $tanaman->jenis_pestisida }}</li>
            </ul>
            <h3 class="text-2xl font-bold mb-4">Cara Penanaman</h3>
            <p class="mb-4">{{ $tanaman->cara_penanaman }}</p>
            @endforeach
        </section>
    </main>

</body>

</html>