<html class="scroll-smooth light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Beasiswow
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .carousel-container {
            overflow: hidden;
            width: 100%;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            flex: 0 0 33.33%;
            padding: 0 12px;
            box-sizing: border-box;
        }

        @media (max-width: 1024px) {
            .carousel-item {
                flex: 0 0 50%;
            }
        }

        @media (max-width: 640px) {
            .carousel-item {
                flex: 0 0 100%;
            }
        }

        .faq-item p {
            transition: color 0.3s;
        }

        .faq-item:hover p,
        .faq-item.active p {
            color: #f97316;
            /* Tailwind's amber-500 */
        }

        .faq-item:hover i,
        .faq-item.active i {
            color: #f97316;
            /* Tailwind's amber-500 */
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-[#09090B]">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-[#18181B] shadow-md fixed w-full z-50">
        <div class="container mx-auto px-1 py-2 flex items-center">
            <div class="flex items-center gap-3">
                <img alt="Logo" class="h-10 w-10 hover:opacity-75 transition-opacity duration-300 rounded" height="40"
                    src="{{URL::asset('img/Logo1.png')}}"
                    width="40" />
                    <a class="text-amber-500 dark:text-gray-300 hover:text-amber-600 transition-colors duration-300 font-bold" href="#">
                        Beasiswow
                    </a>
            </div>
            <div class="hidden md:flex space-x-4 ml-8">
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300"
                    href="#">
                    Beranda
                </a>
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300"
                    href="/daftar-beasiswa">
                    Beasiswa
                </a>
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300"
                    href="#faq">
                    Tentang
                </a>
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300"
                    href="#alumni">
                    Alumni
                </a>
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300"
                    href="#kontak">
                    Kontak
                </a>
            </div>
            <div class="flex items-center space-x-2 ml-auto">
                {{-- <button
                    class="bg-amber-500 text-white px-4 py-2 rounded-full hover:bg-amber-600 transition-colors duration-300" id="theme-toggle">
                    <i id="theme-icon" class="fa fa-moon"></i>
                </button> --}}
                <a class="bg-amber-500 text-white px-4 py-2 rounded-full hover:bg-amber-600 transition-colors duration-300"
                    href="{{ route('login') }}">
                    Masuk/Daftar
                </a>
            </div>
            <!-- Hamburger Menu Button -->
            <button class="md:hidden ml-4 space-x-2 text-gray-700 dark:text-gray-300" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <!-- Mobile Menu -->
            <div id="mobile-menu"
                class="hidden fixed top-[3.5rem] left-0 right-0 bg-white dark:bg-[#18181B] shadow-lg border-t border-gray-200 dark:border-gray-700 p-4 md:hidden">
                <div class="flex flex-col">
                    <a class="py-3 text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300 border-b border-gray-100 dark:border-gray-800"
                        href="#">
                        Beranda
                    </a>
                    <a class="py-3 text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300 border-b border-gray-100 dark:border-gray-800"
                        href="/daftar-beasiswa">
                        Beasiswa
                    </a>
                    <a class="py-3 text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300 border-b border-gray-100 dark:border-gray-800"
                        href="#faq">
                        Tentang
                    </a>
                    <a class="py-3 text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300 border-b border-gray-100 dark:border-gray-800"
                        href="#alumni">
                        Alumni
                    </a>
                    <a class="py-3 text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300"
                        href="#kontak">
                        Kontak
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-36 flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2">
            <h1 class="text-4xl font-bold text-amber-500">
                Beasiswow
            </h1>
            <p class="mt-4 text-gray-700 dark:text-gray-300">
                Beasiswow adalah platform online yang dirancang untuk mempermudah pengelolaan dan akses
                beasiswa di satu institusi pendidikan. Website ini membantu mahasiswa di kampus tersebut untuk
                mendaftar dan mengakses informasi beasiswa yang telah disediakan oleh institusi secara transparan
                dan efisien. Dengan Beasiswow, proses pengajuan beasiswa menjadi lebih praktis dan terorganisir,
                mendukung mahasiswa yang berprestasi atau membutuhkan bantuan finansial untuk meraih pendidikan
                terbaik.
            </p>
            </p>
        </div>
        <div class="md:w-1/2 mt-8 md:mt-0">
            <img alt="Graduation hats being thrown in the air"
                class="rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" height="300"
                src="https://st.depositphotos.com/1718940/2891/i/450/depositphotos_28916007-stock-photo-historic-tate-laboratory-of-physics.jpg" width="500" />
        </div>
    </section>
    <!-- Statistics Section -->
    <section class="bg-white dark:bg-[#18181B] py-16">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-around text-center">
            <div class="mb-8 md:mb-0">
                <h2 class="text-4xl font-bold text-amber-500">
                    100+
                </h2>
                <p class="text-gray-700 dark:text-gray-300">
                    Penerima
                </p>
            </div>
            <div class="mb-8 md:mb-0">
                <h2 class="text-4xl font-bold text-amber-500">
                    10+
                </h2>
                <p class="text-gray-700 dark:text-gray-300">
                    Perguruan Tinggi
                </p>
            </div>
            <div>
                <h2 class="text-4xl font-bold text-amber-500">
                    50+
                </h2>
                <p class="text-gray-700 dark:text-gray-300">
                    Alumni
                </p>
            </div>
        </div>
    </section>
    <!-- Testimonials Section -->
    <section class="container mx-auto px-4 py-16" id="alumni">
        <h2 class="text-3xl font-bold text-center text-amber-500">
            Testimoni Alumni
        </h2>
        <div class="relative mt-8">
            <div class="carousel-container">
                <div class="carousel gap-6">
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col justify-between">
                        <p class="text-gray-700 dark:text-gray-300">
                            "Beasiswow sangat membantu saya dalam proses pengajuan beasiswa. Semua informasi mudah diakses dan sangat transparan, sehingga saya bisa fokus pada studi saya."
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Bela
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Mahasiswa Penerima Beasiswa Akademik.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col justify-between">
                        <p class="text-gray-700 dark:text-gray-300">
                            "Proses pengajuan beasiswa di kampus jadi lebih mudah dan tidak memakan waktu lama. Saya sangat merekomendasikan Beasiswow untuk mahasiswa lain."
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Nizar
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Mahasiswa Penerima Beasiswa Unggulan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col justify-between">
                        <p class="text-gray-700 dark:text-gray-300">
                            "Dengan Beasiswow, saya merasa lebih percaya diri karena prosesnya jelas dan adil. Sistem ini sangat membantu saya untuk mendapatkan beasiswa yang sesuai."
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Rainova
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Mahasiswa Penerima Beasiswa Kebutuhan Khusus.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col justify-between">
                        <p class="text-gray-700 dark:text-gray-300">
                            "Website ini sangat user-friendly. Saya bisa menemukan informasi beasiswa dengan cepat dan mengajukannya tanpa ribet."
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Siti
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Mahasiswa Penerima Beasiswa Akademik.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col justify-between">
                        <p class="text-gray-700 dark:text-gray-300">
                            "Tidak ada lagi kebingungan dalam mencari informasi beasiswa. Semua sudah tersedia di satu tempat."
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Yanto
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Mahasiswa Penerima Beasiswa Unggulan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col justify-between">
                        <p class="text-gray-700 dark:text-gray-300">
                            "Proses pendaftaran beasiswa yang mudah dan sistem yang transparan membuat saya sangat terbantu. Terima kasih, Beasiswow!"
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Toyib
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Mahasiswa Penerima Beasiswa Kebutuhan Khusus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button
                class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-amber-500 text-white p-2 px-3 rounded-full hover:bg-amber-600 transition-colors duration-300"
                onclick="prevSlide()">
                <i class="fas fa-chevron-left">
                </i>
            </button>
            <button
                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-amber-500 text-white p-2 px-3 rounded-full hover:bg-amber-600 transition-colors duration-300"
                onclick="nextSlide()">
                <i class="fas fa-chevron-right">
                </i>
            </button>
        </div>
    </section>
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-amber-500 mb-8">
                Informasi Beasiswa Terbaru
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Artikel 1 -->
                <a href="#" class="block">
                    <div class="bg-white dark:bg-[#18181B] rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 h-full">
                        <div class="aspect-[16/9] w-full">
                            <img src="https://placehold.co/350x200" alt="Artikel Beasiswa 1"
                                 class="rounded-t-lg w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-700 dark:text-gray-300">
                                Beasiswa Kuliah Gratis 2025
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
                                <span class="font-semibold text-gray-700 dark:text-gray-300">Periode:</span> Januari 2025 - Desember 2025
                            </p>
                            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
                                Program beasiswa ini mencakup biaya kuliah penuh hingga lulus bagi mahasiswa berprestasi.
                            </p>
                        </div>
                    </div>
                </a>
                <!-- Artikel 2 -->
                <a href="#" class="block">
                    <div class="bg-white dark:bg-[#18181B] rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 h-full">
                        <div class="aspect-[16/9] w-full">
                            <img src="https://placehold.co/350x200" alt="Artikel Beasiswa 2"
                                 class="rounded-t-lg w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-700 dark:text-gray-300">
                                Beasiswa Penelitian 2025
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
                                <span class="font-semibold text-gray-700 dark:text-gray-300">Periode:</span> Maret 2025 - Agustus 2025
                            </p>
                            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
                                Beasiswa ini mendukung mahasiswa aktif dan berprestasi dengan menunjang biaya kuliah penuh.
                            </p>
                        </div>
                    </div>
                </a>
                <!-- Artikel 3 -->
                <a href="#" class="block">
                    <div class="bg-white dark:bg-[#18181B] rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 h-full">
                        <div class="aspect-[16/9] w-full">
                            <img src="https://placehold.co/350x200" alt="Artikel Beasiswa 1"
                                 class="rounded-t-lg w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-700 dark:text-gray-300">
                                Beasiswa Siswa Berprestasi
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
                                <span class="font-semibold text-gray-700 dark:text-gray-300">Periode:</span> April 2025 - November 2025
                            </p>
                            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
                                Program ini ditujukan untuk mahasiswa berprestasi,beasiswa ini juga mencakup tunjangan bulanan.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Tombol Show All -->
        <div class="mt-8 text-center">
            <a href="/daftar-beasiswa"
            class="px-6 py-2 bg-amber-500 text-white font-semibold rounded-lg shadow-md hover:bg-amber-600 transition-colors duration-300
                hover:bg-white hover:text-amber-500 hover:border-amber-500 border-2 border-transparent">
                Show All
            </a>
        </div>
    </section>
    <!-- FAQ Section -->
    <section class="bg-white dark:bg-[#18181B] py-16" id="faq">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-amber-500">
                Frequently Asked Questions
            </h2>
            <div class="mt-8 flex flex-col md:flex-row">
                <div class="md:w-1/2">
                    <div class="faq-item bg-gray-100 dark:bg-[#18181B] p-4 rounded-lg shadow-md mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300"
                        onclick="updateFAQ(0)">
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-300">
                                Apa saja jenis beasiswa yang tersedia?
                            </p>
                            <i class="fas fa-chevron-right text-gray-500 dark:text-gray-400">
                            </i>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-100 dark:bg-[#18181B] p-4 rounded-lg shadow-md mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300"
                        onclick="updateFAQ(1)">
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-300">
                                Bagaimana syarat dan ketentuan pendaftaran beasiswa ini?
                            </p>
                            <i class="fas fa-chevron-right text-gray-500 dark:text-gray-400">
                            </i>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-100 dark:bg-[#18181B] p-4 rounded-lg shadow-md mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300"
                        onclick="updateFAQ(2)">
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-300">
                                Bagaimana alur pendaftaran beasiswa ini?
                            </p>
                            <i class="fas fa-chevron-right text-gray-500 dark:text-gray-400">
                            </i>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-100 dark:bg-[#18181B] p-4 rounded-lg shadow-md mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300"
                        onclick="updateFAQ(3)">
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-300">
                                Apa saja dokumen yang perlu disiapkan?
                            </p>
                            <i class="fas fa-chevron-right text-gray-500 dark:text-gray-400">
                            </i>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-100 dark:bg-[#18181B] p-4 rounded-lg shadow-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300"
                        onclick="updateFAQ(4)">
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-300">
                                Bagaimana jadwal seleksi dan pengumuman beasiswa?
                            </p>
                            <i class="fas fa-chevron-right text-gray-500 dark:text-gray-400">
                            </i>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 mt-8 md:mt-0 md:ml-8">
                    <div class="bg-gray-100 dark:bg-[#18181B] p-6 rounded-lg shadow-md">
                        <h3 class="text-amber-500 font-bold" id="faq-title">
                            Bagaimana syarat dan ketentuan pendaftaran beasiswa ini?
                        </h3>
                        <p class="mt-4 text-gray-700 dark:text-gray-300" id="faq-content">
                            Untuk mendaftar beasiswa ini, mahasiswa perlu memenuhi kriteria tertentu seperti prestasi akademik, kebutuhan finansial, dan melengkapi dokumen yang diminta. Semua persyaratan dan ketentuan dapat ditemukan di portal Beasiswow.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to Action Section -->
    <section class="container mx-auto px-4 py-16 flex flex-col md:flex-row items-center" id="kontak">
        <div class="md:w-1/2">
            <h2 class="text-3xl font-bold text-amber-500">
                Siap menjadi bagian dari kami?
            </h2>
            <p class="mt-4 text-gray-700 dark:text-gray-300">
                Jangan lewatkan kesempatan untuk mendapatkan beasiswa yang mendukung pendidikan Anda. Daftar sekarang dan raih masa depan yang lebih cerah bersama kami.
            </p>
            <div class="mt-8 flex space-x-4">
                <a class="bg-amber-500 text-white px-4 py-2 rounded-full hover:bg-amber-600 transition-colors duration-300
                    hover:bg-white hover:text-amber-500 hover:border-amber-500 border-2 border-transparent"
                    href="#">
                    Daftar
                </a>
                <a class="bg-white dark:bg-[#18181B] text-amber-500 border-amber-500 border-2 px-4 py-2 rounded-full transition-colors duration-300
                    hover:bg-amber-500 hover:text-white"
                    href="#kontak">
                    Kontak
                </a>
            </div>
        </div>
        <div class="md:w-1/2 mt-8 md:mt-0">
            <img alt="Graduation cap on top of books and diploma"
                class="rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" height="300"
                src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/47/2023/09/23/Foto-freepik-4293748762.jpg" width="450" />
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-white dark:bg-[#18181B] py-8 border-t border-gray-200">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Logo Section -->
                <div class="flex flex-col items-center md:items-start">
                <img src="{{URL::asset('img/Logo1.png')}}" alt="Logo" class="h-10 w-10 hover:opacity-75 transition-opacity duration-300">
                <span class="text-amber-500 dark:text-gray-300 text-sm font-semibold">Beasiswow</span>
                </div>

                <!-- Social Media Section -->
                <div class="text-center md:text-left">
                <h3 class="text-gray-700 dark:text-gray-300 font-semibold mb-2">Follow Us</h3>
                <div class="flex justify-center md:justify-start space-x-4">
                    <a class="text-gray-500 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="text-gray-500 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="text-gray-500 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="text-gray-500 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="text-gray-500 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300" href="#"><i class="fab fa-youtube"></i></a>
                </div>
                </div>

                <!-- Copyright Section -->
                <div class="text-center md:text-right">
                <h3 class="text-gray-700 dark:text-gray-300 font-semibold mb-2">Copyright</h3>
                <p class="text-gray-500 dark:text-gray-300 text-sm">© 2025 Beasiswow | All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        const faqData = [
            {
                question: "Apa saja jenis beasiswa yang tersedia?",
                answer: "Beasiswow menyediakan berbagai jenis beasiswa, termasuk beasiswa prestasi, beasiswa bantuan finansial, dan beasiswa khusus untuk program tertentu. Informasi lebih lanjut dapat diakses di halaman katalog beasiswa."
            },
            {
                question: "Bagaimana Syarat dan Ketentuan Pendaftaran Beasiswa ini?",
                answer: "Syarat dan ketentuan pendaftaran bergantung pada jenis beasiswa yang dipilih. Umumnya, pelamar perlu memiliki IPK minimal tertentu, melampirkan dokumen pendukung, dan memenuhi kriteria tambahan yang telah ditentukan oleh institusi."
            },
            {
                question: "Bagaimana alur pendaftaran Beasiswa ini?",
                answer: "Proses pendaftaran dimulai dengan membuat akun di platform Beasiswow, memilih jenis beasiswa yang diinginkan, melengkapi formulir pendaftaran, mengunggah dokumen yang diperlukan, dan menunggu konfirmasi seleksi administrasi."
            },
            {
                question: "Apa saja dokumen yang perlu disiapkan?",
                answer: "Dokumen yang umumnya diperlukan meliputi transkrip nilai, surat rekomendasi, esai motivasi, dokumen pendukung finansial (jika relevan), dan KTP atau kartu identitas mahasiswa."
            },
            {
                question: "Bagaimana jadwal seleksi dan pengumuman beasiswa?",
                answer: "Jadwal seleksi dan pengumuman dapat berbeda untuk setiap jenis beasiswa. Informasi lengkap terkait tahapan seleksi akan tersedia di dashboard akun Beasiswow masing-masing pelamar."
            }
        ];


            function updateFAQ(index) {
                const faqTitle = document.getElementById('faq-title');
                const faqContent = document.getElementById('faq-content');
                faqTitle.innerText = faqData[index].question;
                faqContent.innerText = faqData[index].answer;

                // Remove active class from all items
                document.querySelectorAll('.faq-item').forEach(item => {
                    item.classList.remove('active');
                });

                // Add active class to the clicked item
                document.querySelectorAll('.faq-item')[index].classList.add('active');
            }

            const carousel = document.querySelector('.carousel');
            let currentIndex = 0;
            let touchStartX = 0;
            let touchEndX = 0;

            function updateCarousel() {
                const items = document.querySelectorAll('.carousel-item');
                const gap = 26;
                const containerWidth = document.querySelector('.carousel-container').offsetWidth;
                const itemWidth = items[0].offsetWidth;
                const offset = currentIndex * (itemWidth + gap);
                carousel.style.transform = `translateX(-${offset}px)`;
            }

            function prevSlide() {
                const items = document.querySelectorAll('.carousel-item');
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = items.length - 3; // Sesuaikan jumlah slide yang terlihat
                }
                updateCarousel();
            }

            function nextSlide() {
                const items = document.querySelectorAll('.carousel-item');
                if (currentIndex < items.length - 3) { // Sesuaikan jumlah slide yang terlihat
                    currentIndex++;
                } else {
                    currentIndex = 0;
                }
                updateCarousel();
            }

            // Tambahkan dukungan sentuh untuk perangkat mobile
            carousel.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            });

            carousel.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].clientX;
                handleSwipe();
            });

            function handleSwipe() {
                if (touchEndX < touchStartX) {
                    nextSlide();
                } else if (touchEndX > touchStartX) {
                    prevSlide();
                }
            }

            // Responsif
            window.addEventListener('resize', updateCarousel);

            // Opsional: Otomatis geser
            setInterval(nextSlide, 5000);

            function toggleMobileMenu() {
                const mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                } else {
                    mobileMenu.classList.add('hidden');
                }
            }

            // Menutup menu saat mengklik di luar menu
            document.addEventListener('click', function(event) {
                const mobileMenu = document.getElementById('mobile-menu');
                const hamburgerButton = document.querySelector('.fa-bars');

                if (!mobileMenu.contains(event.target) && !hamburgerButton.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });

            // Menutup menu saat mengklik link di menu mobile
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    document.getElementById('mobile-menu').classList.add('hidden');
                });
            });

            // Sinkronkan tombol theme antara mobile dan desktop
            document.getElementById('theme-toggle-mobile').addEventListener('click', function() {
                document.getElementById('theme-toggle').click();
            });

            // Menutup menu saat layar di-resize ke desktop
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768) {
                    document.getElementById('mobile-menu').classList.add('hidden');
                }
            });

            document.addEventListener('DOMContentLoaded', function () {
                const themeToggle = document.getElementById('theme-toggle');
                const themeIcon = document.getElementById('theme-icon');
                const currentTheme = localStorage.getItem('theme') || 'light';

                const applyTheme = (theme) => {
                    if (theme === 'dark') {
                        document.documentElement.classList.add('dark');
                        themeIcon.classList.replace('fa-moon', 'fa-sun');
                    } else {
                        document.documentElement.classList.remove('dark');
                        themeIcon.classList.replace('fa-sun', 'fa-moon');
                    }
                    localStorage.setItem('theme', theme);
                };

                applyTheme(currentTheme);

                if (themeToggle) {
                    themeToggle.addEventListener('click', function () {
                        const newTheme = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
                        applyTheme(newTheme);
                    });
                } else {
                    console.error("Element with id 'theme-toggle' not found.");
                }
            });
    </script>
</body>

</html>
