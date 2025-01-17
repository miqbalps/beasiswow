<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pendidikan Terakhir') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
            {{-- last edu --}}
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
                    <form method="POST" action="{{ route('lastedu.update') }}" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik" value="{{ old('nik', $lastedu->nik ?? '') }}"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Semester -->
                            <div>
                                <label for="semester"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Semester</label>
                                <input type="number" name="semester" id="semester"
                                    value="{{ old('semester', $lastedu->semester ?? '') }}"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('semester') border-red-500 @enderror"
                                    required>
                                @error('semester')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- GPA -->
                            <div>
                                <label for="gpa"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">GPA</label>
                                <input type="number" name="gpa" id="gpa" step="0.01" min="0" max="4.00"
                                    value="{{ old('gpa', $lastedu->gpa ?? '') }}"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('gpa') border-red-500 @enderror"
                                    required>
                                @error('gpa')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
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

            {{-- transcript file section --}}
            <div x-data="{ open: true }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Upload Transkrip Nilai</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <form method="POST" action="{{ route('lastedu.updateTranscript') }}" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="nik" value="{{ old('nik', $lastedu->nik ?? '') }}">

                        <div class="mb-4">
                            @if($lastedu->transcript_file)
                            <div class="flex justify-between items-center mb-2">
                                <a href="{{ Storage::url($lastedu->transcript_file) }}" target="_blank"
                                    class="text-sm text-blue-600 hover:underline">
                                    Lihat File Tersimpan
                                </a>
                            </div>
                            @endif

                            <p class="text-xs text-gray-500 mb-2">File PDF, Maks 2MB</p>

                            <div
                                class="relative border-2 border-dashed rounded-lg @error('transcript_file') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 p-4 text-center">
                                <input type="file" name="transcript_file" id="transcript_file" accept=".pdf"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" {{
                                    $lastedu->transcript_file ? '' : 'required' }}>

                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p id="transcript_file_name" class="text-sm text-gray-600">
                                        {{ old('transcript_file_name') ?? 'Pilih File PDF' }}
                                    </p>
                                </div>
                            </div>

                            @error('transcript_file')
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
        document.getElementById("transcript_file").addEventListener("change", function () {
            const fileName = this.files[0]?.name || "Tidak ada file yang dipilih";
            document.getElementById("transcript_file_name").textContent = fileName;
        });
    </script>
</x-app-layout>