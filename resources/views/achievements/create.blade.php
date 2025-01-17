<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Prestasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
            <div x-data="{ open: true }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Form Prestasi</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <form method="POST" action="{{ route('achievements.store') }}" class="space-y-6"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik"
                                value="{{ old('nik', auth()->user()->identity->nik ?? '') }}"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Name -->
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $achieve->name ?? '') }}"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('name') border-red-500 @enderror"
                                    required>
                                @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Type -->
                            <div>
                                <label for="type"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis</label>
                                <select name="type" id="type"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('type') border-red-500 @enderror"
                                    required>
                                    <option value="">Pilih Jenis Prestasi</option>
                                    <option value="individual" {{ old('type', $achieve->type ?? '') == 'individual' ?
                                        'selected' : '' }}>Individual</option>
                                    <option value="group" {{ old('type', $achieve->type ?? '') == 'group' ? 'selected' :
                                        '' }}>Kelompok</option>
                                </select>
                                @error('type')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Level -->
                            <div>
                                <label for="level"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tingkat</label>
                                <select name="level" id="level"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('level') border-red-500 @enderror"
                                    required>
                                    <option value="">Pilih Tingkatan</option>
                                    <option value="internasional" {{ old('level', $achieve->level ?? '') ==
                                        'internasional' ? 'selected' : '' }}>Internasional</option>
                                    <option value="nasional" {{ old('level', $achieve->level ?? '') == 'nasional' ?
                                        'selected' : '' }}>Nasional</option>
                                    <option value="regional" {{ old('level', $achieve->level ?? '') == 'regional' ?
                                        'selected' : '' }}>Provinsi</option>
                                    <option value="local" {{ old('level', $achieve->level ?? '') == 'local' ? 'selected'
                                        : '' }}>Kab/kota</option>
                                </select>
                                @error('level')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Rank -->
                            <div>
                                <label for="rank"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pencapaian</label>
                                <select name="rank" id="rank"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('rank') border-red-500 @enderror"
                                    required>
                                    <option value="">Pilih Pencapaian</option>
                                    <option value="1" {{ old('rank', $achieve->rank ?? '') == '1' ? 'selected' : ''
                                        }}>Juara 1</option>
                                    <option value="2" {{ old('rank', $achieve->rank ?? '') == '2' ? 'selected' : ''
                                        }}>Juara 2</option>
                                    <option value="3" {{ old('rank', $achieve->rank ?? '') == '3' ? 'selected' : ''
                                        }}>Juara 3</option>
                                    <option value="honorable-mention" {{ old('rank', $achieve->rank ?? '') ==
                                        'honorable-mention' ? 'selected' : '' }}>Honorable Mention</option>
                                </select>
                                @error('rank')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Year -->
                            <div>
                                <label for="year"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tahun</label>
                                <input type="number" name="year" id="year" placeholder="YYYY" min="1900" max="2100"
                                    value="{{ old('year', $achieve->year ?? '') }}"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('year') border-red-500 @enderror"
                                    required>
                                @error('year')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Proof File -->
                        <div class="mb-4">
                            @if($achieve->proof_file)
                            <div class="flex justify-between items-center mb-2">
                                <a href="{{ Storage::url($achieve->proof_file) }}" target="_blank"
                                    class="text-sm text-blue-600 hover:underline">
                                    Lihat File Tersimpan
                                </a>
                            </div>
                            @endif

                            <p class="text-xs text-gray-500 mb-2">File PDF, Maks 2MB</p>

                            <div
                                class="relative border-2 border-dashed rounded-lg @error('proof_file') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 p-4 text-center">
                                <input type="file" name="proof_file" id="proof_file" accept=".pdf"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" {{
                                    $achieve->proof_file ? '' : 'required' }}>

                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p id="proof_file_name" class="text-sm text-gray-600">
                                        {{ old('proof_file_name') ?? 'Pilih File PDF' }}
                                    </p>
                                </div>
                            </div>

                            @error('proof_file')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
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