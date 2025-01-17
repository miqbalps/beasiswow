<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pendidikan Terakhir') }}
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
                            <!-- Semester -->
                            <div>
                                <label for="semester"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Semester</label>
                                <input type="number" name="semester" id="semester"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- GPA -->
                            <div>
                                <label for="gpa" class="block text-sm font-medium text-gray-700 dark:text-gray-300">IPK
                                    Terakhir</label>
                                <input type="number" name="gpa" id="gpa"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Transcript File -->
                            <div>
                                <label for="transcript_file"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Transkrip
                                    Nilai</label>
                                <p class="text-sm">File dengan format .PDF. Maksimal 2MB</p>
                                <div class="flex gap-3 mt-1 w-full border border-gray-300 rounded-md">
                                    <label
                                        class="flex items-center justify-between px-3 py-2 text-sm text-gray-700 bg-gray-100 dark:bg-gray-800 dark:text-gray-300 border-e border-gray-300 dark:border-gray-700 rounded-s-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 w-2/6">
                                        <span>Pilih File</span>
                                        <input type="file" name="transcript_file" id="transcript_file" class="hidden"
                                            required>
                                    </label>
                                    <p id="transcript_file_name" class="mt-2 text-sm text-gray-600 dark:text-gray-400">
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
        document.getElementById("transcript_file").addEventListener("change", function () {
            const fileName = this.files[0]?.name || "Tidak ada file yang dipilih";
            document.getElementById("transcript_file_name").textContent = fileName;
        });
    </script>
</x-app-layout>