<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Beasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-[#18181B] shadow-md fixed w-full z-50">
        <div class="container mx-auto px-1 py-2 flex items-center">
            <div class="flex items-center">
                <img alt="Logo" class="h-10 w-10 hover:opacity-75 transition-opacity duration-300 rounded-full" height="40"
                    src="https://storage.googleapis.com/a1aa/image/ZlhvLD4yCBqmBtbis6lShwAAaPe7KoDJu1Lwh4KLh9hf3FAUA.jpg"
                    width="40" />
            </div>
            <div class="hidden md:flex space-x-4 ml-8">
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300" href="#">
                    Beranda
                </a>
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300" href="#faq">
                    Tentang
                </a>
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300" href="#">
                    Alumni
                </a>
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300" href="#">
                    Kontak
                </a>
            </div>
            <div class="flex items-center space-x-2 ml-auto">
                <button
                    class="bg-amber-500 text-white px-4 py-2 rounded-full hover:bg-amber-600 transition-colors duration-300"
                    id="theme-toggle">
                    <i class="fas fa-moon">
                    </i>
                </button>
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
                    <a class="py-3 text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300 border-b border-gray-100 dark:border-gray-800" href="#">
                        Beranda
                    </a>
                    <a class="py-3 text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300 border-b border-gray-100 dark:border-gray-800" href="#faq">
                        Tentang
                    </a>
                    <a class="py-3 text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300 border-b border-gray-100 dark:border-gray-800" href="#">
                        Alumni
                    </a>
                    <a class="py-3 text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300" href="#">
                        Kontak
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="flex items-center space-x-2 text-gray-600">
            <a href="#" class="hover:text-gray-900">Home</a>
            <span>/</span>
            <span class="text-gray-900">Beasiswa</span>
        </div>
    </div>

    <!-- Header -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-gray-900">Daftar Beasiswa</h1>
    </div>

    <!-- Scholarship Grid -->
    <div class="bg-gray-50 py-6"> 
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Row 1 -->
                <!-- Scholarship Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full">
                    <div class="relative h-48">
                        <img src="https://placehold.co/600x400" alt="BNI Scholarship" class="w-full h-full object-cover">
                        <div class="absolute bottom-4 left-4">
                            <img src="https://placehold.jp/-16x-16.png" alt="BNI Logo" class="w-16 h-16 bg-white rounded-lg shadow">
                        </div>
                    </div>
                    <div class="p-4 flex-grow flex flex-col">
                        <h2 class="text-lg font-semibold mb-2">Beasiswa Perguruan Tinggi D3</h2>
                        <div class="space-y-2 text-sm text-gray-600 flex-grow">
                            <p>Periode: 2024-06-28 s/d 2024-07-12</p>
                            <p>Penerima: 0 orang</p>
                            <p>Minimal IPK: 3</p>
                        </div>
                        <button class="mt-4 bg-amber-500 text-white px-4 py-2 rounded-md w-full">Informasi Selanjutnya</button>
                    </div>
                </div>

                <!-- Scholarship Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full">
                    <div class="relative h-48">
                        <img src="https://placehold.co/600x400" alt="JFLS" class="w-full h-full object-cover">
                        <div class="absolute bottom-4 left-4">
                            <img src="https://placehold.jp/-16x-16.png" alt="JFLS Logo" class="w-16 h-16 bg-white rounded-lg shadow">
                        </div>
                    </div>
                    <div class="p-4 flex-grow flex flex-col">
                        <h2 class="text-lg font-semibold mb-2">Beasiswa Perguruan Tinggi S1</h2>
                        <div class="space-y-2 text-sm text-gray-600 flex-grow">
                            <p>Periode: 2024-06-20 s/d 2024-07-20</p>
                            <p>Penerima: 0 orang</p>
                            <p>Minimal IPK: 3.5</p>
                        </div>
                        <button class="mt-4 bg-amber-500 text-white px-4 py-2 rounded-md w-full">Informasi Selanjutnya</button>
                    </div>
                </div>

                <!-- Scholarship Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full">
                    <div class="relative h-48">
                        <img src="https://placehold.co/600x400" alt="Beasiswa Pendidikan" class="w-full h-full object-cover">
                        <div class="absolute bottom-4 left-4">
                            <img src="https://placehold.jp/-16x-16.png" alt="Pendidikan Logo" class="w-16 h-16 bg-white rounded-lg shadow">
                        </div>
                    </div>
                    <div class="p-4 flex-grow flex flex-col">
                        <h2 class="text-lg font-semibold mb-2">Beasiswa Perguruan Tinggi S2</h2>
                        <div class="space-y-2 text-sm text-gray-600 flex-grow">
                            <p>Periode: 2024-02-05 s/d 2024-07-30</p>
                            <p>Penerima: 0 orang</p>
                            <p>Minimal IPK: 3</p>
                        </div>
                        <button class="mt-4 bg-amber-500 text-white px-4 py-2 rounded-md w-full">Informasi Selanjutnya</button>
                    </div>
                </div>

                <!-- Scholarship Card 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full">
                    <div class="relative h-48">
                        <img src="https://placehold.co/600x400" alt="RMP" class="w-full h-full object-cover">
                        <div class="absolute bottom-4 left-4">
                            <img src="https://placehold.jp/-16x-16.png" alt="RMP Logo" class="w-16 h-16 bg-white rounded-lg shadow">
                        </div>
                    </div>
                    <div class="p-4 flex-grow flex flex-col">
                        <h2 class="text-lg font-semibold mb-2">Beasiswa Perguruan Tinggi S3</h2>
                        <div class="space-y-2 text-sm text-gray-600 flex-grow">
                            <p>Periode: 2024-04-26 s/d 2024-05-15</p>
                            <p>Penerima: 0 orang</p>
                            <p>Minimal IPK: 3.75</p>
                        </div>
                        <button class="mt-4 bg-amber-500 text-white px-4 py-2 rounded-md w-full">Informasi Selanjutnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <footer class="bg-white dark:bg-[#18181B] py-8 border-t border-gray-200">
        <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo Section -->
            <div class="flex flex-col items-center md:items-start">
            <img src="https://placehold.co/80x40" alt="Logo" class="h-10 w-20 hover:opacity-75 transition-opacity duration-300 mb-2">
            <span class="text-gray-700 dark:text-gray-300 text-sm font-semibold">Beasiswow</span>
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
</body>
  
</html>