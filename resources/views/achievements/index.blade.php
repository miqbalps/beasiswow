<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Prestasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
            {{-- data ayah --}}
            <div x-data="{ open: true }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Data Nilai Terakhir</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <form method="POST" action="" class="space-y-6">
                        @csrf

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Name -->
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Type -->
                            <div>
                                <label for="type"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis</label>
                                <select name="type" id="type"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="" selected>Pilih Jenis Prestasi</option>
                                    <option value="individual">Individual</option>
                                    <option value="group">Kelompok</option>
                                </select>
                            </div>

                            <!-- Level -->
                            <div>
                                <label for="level"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tingkat</label>
                                <select name="level" id="level"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="" selected>Pilih Tingkatan</option>
                                    <option value="internasional">Internasional</option>
                                    <option value="nasional">Nasional</option>
                                    <option value="regional">Provinsi</option>
                                    <option value="local">Kab/kota</option>
                                </select>
                            </div>

                            <!-- Rank -->
                            <div>
                                <label for="rank"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pencapaian</label>
                                <select name="rank" id="rank"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="" selected>Pilih Pencapaian</option>
                                    <option value="1">Juara 1</option>
                                    <option value="2">Juara 2</option>
                                    <option value="3">Juara 3</option>
                                    <option value="honorable-mention">Honorable Mention</option>
                                </select>
                            </div>

                            <!-- Year -->
                            <div>
                                <label for="year"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tahun</label>
                                <input type="number" name="year" id="year" placeholder="YYYY" min="1900" max="2100"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Transcript File -->
                            <div>
                                <label for="proof_file"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bukti
                                    Pencapaian</label>
                                <p class="text-sm">Berupa sertifikat atau bukti lainnya</p>
                                <p class="text-sm">File dengan format .PDF. Maksimal 2MB</p>
                                <div class="flex gap-3 mt-1 w-full border border-gray-300 rounded-md">
                                    <label
                                        class="flex items-center justify-between px-3 py-2 text-sm text-gray-700 bg-gray-100 dark:bg-gray-800 dark:text-gray-300 border-e border-gray-300 dark:border-gray-700 rounded-s-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 w-2/6">
                                        <span>Pilih File</span>
                                        <input type="file" name="proof_file" id="proof_file" class="hidden" required>
                                    </label>
                                    <p id="proof_file_name" class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                        Tidak ada file yang dipilih
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-500 text-white rounded-md shadow-sm hover:bg-amber-600 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                                Simpan
                            </button>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById("proof_file").addEventListener("change", function () {
            const fileName = this.files[0]?.name || "Tidak ada file yang dipilih";
            document.getElementById("proof_file_name").textContent = fileName;
        });
    </script>
</x-app-layout>