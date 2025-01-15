<html class="scroll-smooth dark" lang="en">

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
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img alt="Logo" class="h-10 w-10 hover:opacity-75 transition-opacity duration-300" height="40"
                    src="https://storage.googleapis.com/a1aa/image/ZlhvLD4yCBqmBtbis6lShwAAaPe7KoDJu1Lwh4KLh9hf3FAUA.jpg"
                    width="40" />
            </div>
            <div class="hidden md:flex space-x-8">
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300"
                    href="#">
                    Beranda
                </a>
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300"
                    href="#faq">
                    Tentang
                </a>
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300"
                    href="#">
                    Alumni
                </a>
                <a class="text-gray-700 dark:text-gray-300 hover:text-amber-500 transition-colors duration-300"
                    href="#">
                    Kontak
                </a>
            </div>
            <div class="flex items-center space-x-4">
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
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-36 flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2">
            <h1 class="text-4xl font-bold text-amber-500">
                Beasiswow
            </h1>
            <p class="mt-4 text-gray-700 dark:text-gray-300">
                Program Beasiswow adalah inisiatif beasiswa yang bertujuan mendukung para siswa dan mahasiswa berbakat
                dari seluruh Indonesia untuk mencapai potensi penuh mereka dalam bidang pendidikan. Beasiswa ini
                dirancang untuk membantu meringankan beban biaya pendidikan bagi mereka yang memiliki prestasi akademik
                atau berkomitmen pada kegiatan sosial dan pengembangan diri, tetapi terkendala oleh keterbatasan
                finansial.
            </p>
        </div>
        <div class="md:w-1/2 mt-8 md:mt-0">
            <img alt="Graduation hats being thrown in the air"
                class="rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" height="300"
                src="https://storage.googleapis.com/a1aa/image/oxsrZUeYqi1yKKNfskO6wz3X0EHTAeT8VFpV4A5l9YA4vLAoA.jpg"
                width="500" />
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
    <section class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center text-amber-500">
            Testimoni Alumni
        </h2>
        <div class="relative mt-8">
            <div class="carousel-container">
                <div class="carousel gap-6">
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <p class="text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque posuere vivamus
                            egestas porttitor. Hendrerit vitae at nulla varius proin ipsum. Purus augue in morbi.
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Bela
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Amet phasellus interdum.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <p class="text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque posuere vivamus
                            egestas porttitor. Hendrerit vitae at nulla varius proin ipsum. Purus augue in morbi.
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Nizar
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Amet phasellus interdum.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <p class="text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque posuere vivamus
                            egestas porttitor. Hendrerit vitae at nulla varius proin ipsum. Purus augue in morbi.
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Rainova
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Amet phasellus interdum.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <p class="text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque posuere vivamus
                            egestas porttitor. Hendrerit vitae at nulla varius proin ipsum. Purus augue in morbi.
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Bela
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Amet phasellus interdum.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <p class="text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque posuere vivamus
                            egestas porttitor. Hendrerit vitae at nulla varius proin ipsum. Purus augue in morbi.
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Nizar
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Amet phasellus interdum.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item bg-white dark:bg-[#18181B] p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <p class="text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque posuere vivamus
                            egestas porttitor. Hendrerit vitae at nulla varius proin ipsum. Purus augue in morbi.
                        </p>
                        <div class="mt-4 flex items-center">
                            <i class="fas fa-user-circle text-amber-500 text-2xl">
                            </i>
                            <div class="ml-2">
                                <p class="font-bold dark:text-gray-300">
                                    Rainova
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">
                                    Amet phasellus interdum.
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
                                Lorem ipsum dolor sit amet?
                            </p>
                            <i class="fas fa-chevron-right text-gray-500 dark:text-gray-400">
                            </i>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-100 dark:bg-[#18181B] p-4 rounded-lg shadow-md mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300"
                        onclick="updateFAQ(1)">
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-300">
                                Bagaimana Syarat dan Ketentuan Pendaftaran Beasiswa ini?
                            </p>
                            <i class="fas fa-chevron-right text-gray-500 dark:text-gray-400">
                            </i>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-100 dark:bg-[#18181B] p-4 rounded-lg shadow-md mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300"
                        onclick="updateFAQ(2)">
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-300">
                                Bagaimana alur pendaftaran Beasiswa ini?
                            </p>
                            <i class="fas fa-chevron-right text-gray-500 dark:text-gray-400">
                            </i>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-100 dark:bg-[#18181B] p-4 rounded-lg shadow-md mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300"
                        onclick="updateFAQ(3)">
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-300">
                                Lorem ipsum dolor sit, amet consectetur adipiscing?
                            </p>
                            <i class="fas fa-chevron-right text-gray-500 dark:text-gray-400">
                            </i>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-100 dark:bg-[#18181B] p-4 rounded-lg shadow-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300"
                        onclick="updateFAQ(4)">
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-300">
                                Lorem ipsum dolor sit amet consectetur adipiscing elit. Corporis
                                ipsum in labore praesentium?
                            </p>
                            <i class="fas fa-chevron-right text-gray-500 dark:text-gray-400">
                            </i>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 mt-8 md:mt-0 md:ml-8">
                    <div class="bg-gray-100 dark:bg-[#18181B] p-6 rounded-lg shadow-md">
                        <h3 class="text-amber-500 font-bold" id="faq-title">
                            Bagaimana Syarat dan Ketentuan Pendaftaran
                            Beasiswa ini?
                        </h3>
                        <p class="mt-4 text-gray-700 dark:text-gray-300" id="faq-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod architecto numquam molestiae.
                            Voluptatem distinctio aliquid dolor quisquam suscipit, iusto hic! Alias esse nobis
                            blanditiis aliquam ipsa corrupti molestias harum natus!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to Action Section -->
    <section class="container mx-auto px-4 py-16 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2">
            <h2 class="text-3xl font-bold text-amber-500">
                Siap menjadi bagian dari kami?
            </h2>
            <p class="mt-4 text-gray-700 dark:text-gray-300">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus obcaecati officia reiciendis deserunt
                voluptate vero tempora sapiente perspiciatis illo alias.
            </p>
            <div class="mt-8 flex space-x-4">
                <a class="bg-amber-500 text-white px-4 py-2 rounded-full hover:bg-amber-600 transition-colors duration-300"
                    href="#">
                    Daftar
                </a>
                <a class="bg-white dark:bg-[#18181B] text-amber-500 border border-amber-500 px-4 py-2 rounded-full hover:bg-amber-100 dark:hover:bg-gray-700 transition-colors duration-300"
                    href="#">
                    Kontak
                </a>
            </div>
        </div>
        <div class="md:w-1/2 mt-8 md:mt-0">
            <img alt="Graduation cap on top of books and diploma"
                class="rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" height="300"
                src="https://storage.googleapis.com/a1aa/image/9B5iVFcO4PraBBOkfYTMJ94LyXRhFbEA8
