<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Prestasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
            <div x-data="{ open: true }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Detail Prestasi</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <div class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                                <p class="mt-1 p-2 block w-full rounded-md bg-gray-50 dark:bg-gray-700">
                                    {{ $achievement->name }}
                                </p>
                            </div>

                            <!-- Type -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis</label>
                                <p class="mt-1 p-2 block w-full rounded-md bg-gray-50 dark:bg-gray-700">
                                    {{ $achievement->type === 'individual' ? 'Individual' : 'Kelompok' }}
                                </p>
                            </div>

                            <!-- Level -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tingkat</label>
                                <p class="mt-1 p-2 block w-full rounded-md bg-gray-50 dark:bg-gray-700">
                                    @switch($achievement->level)
                                    @case('internasional')
                                    Internasional
                                    @break
                                    @case('nasional')
                                    Nasional
                                    @break
                                    @case('regional')
                                    Provinsi
                                    @break
                                    @case('local')
                                    Kab/kota
                                    @break
                                    @endswitch
                                </p>
                            </div>

                            <!-- Rank -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pencapaian</label>
                                <p class="mt-1 p-2 block w-full rounded-md bg-gray-50 dark:bg-gray-700">
                                    @if($achievement->rank === 'honorable-mention')
                                    Honorable Mention
                                    @else
                                    Juara {{ $achievement->rank }}
                                    @endif
                                </p>
                            </div>

                            <!-- Year -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tahun</label>
                                <p class="mt-1 p-2 block w-full rounded-md bg-gray-50 dark:bg-gray-700">
                                    {{ $achievement->year }}
                                </p>
                            </div>
                        </div>

                        <!-- Achievement File Preview -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">File Bukti
                                Prestasi</label>
                            @if($achievement->proof_file)
                            <div class="flex justify-between items-center mb-2">
                                <a href="{{ Storage::url($achievement->proof_file) }}" target="_blank"
                                    class="text-md text-blue-600 hover:underline">
                                    Lihat File Tersimpan
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('achievements.index') }}"
                                class="px-4 py-2 bg-amber-500 text-white transition-colors rounded-md shadow-sm hover:bg-amber-600">
                                Kembali
                            </a>
                        </div>
                    </div>
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