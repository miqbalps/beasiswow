<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajukan Beasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
            <div x-data="{
                open: false,
                selectedScholarship: null,
                scholarshipData: null,
                async selectScholarship(id) {
                    this.selectedScholarship = id;
                    try {
                        const response = await fetch(`/scholarships/${id}`);
                        this.scholarshipData = await response.json();
                        this.open = true;
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat memuat data beasiswa');
                    }
                }
            }" class="space-y-4">
                <!-- Scholarship Selection -->
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Pilih Beasiswa</h3>
                    <div class="grid grid-cols-4 gap-4">
                        @foreach($scholarships as $scholarship)
                        <div class="border rounded-lg p-4 transition-colors duration-200" :class="{
                                    'hover:bg-amber-50 dark:hover:bg-amber-900/10': selectedScholarship !== {{ $scholarship->id }},
                                    'bg-amber-100 dark:bg-amber-900/20 border-amber-300 dark:border-amber-700': selectedScholarship === {{ $scholarship->id }}
                                }" @click="selectScholarship({{ $scholarship->id }})">
                            <div class="flex justify-between items-center">
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">{{ $scholarship->name }}
                                    </h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $scholarship->description }}
                                    </p>
                                    <div class="mt-2 text-xs text-gray-500">
                                        <span class="mr-4">Mulai: {{ $scholarship->start_date }}</span>
                                        <span>Berakhir: {{ $scholarship->end_date }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span
                                        class="px-2 py-1 text-xs rounded-full
                                            {{ $scholarship->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $scholarship->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                    <!-- Selected indicator -->
                                    <div x-show="selectedScholarship === {{ $scholarship->id }}"
                                        class="flex-shrink-0 text-amber-600 dark:text-amber-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Requirements Form -->
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100" x-text="scholarshipData?.name">
                        </h3>
                        <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Rest of the form remains the same -->
                    <form method="POST" action="{{ route('applications.store') }}" class="space-y-6"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <input type="hidden" name="scholarship_id" x-model="selectedScholarship">

                        <div class="grid grid-cols-1 gap-6">
                            <template x-for="(field, index) in scholarshipData?.requirements" :key="index">
                                <div>
                                    <label :for="field.label"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                        x-text="field.label">
                                    </label>

                                    <template x-if="field.description">
                                        <p class="mt-1 text-xs text-gray-500" x-text="field.description"></p>
                                    </template>

                                    <template x-if="field.input_type === 'file' || field.input_type === 'image'">
                                        <div
                                            class="mt-1 relative border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 p-4 text-center">
                                            <input :type="'file'" :name="field.label" :id="field.label"
                                                :accept="field.input_type === 'image' ? 'image/*' : undefined"
                                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">

                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="w-10 h-10 text-gray-400 mb-2" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <p :id="field.label + '_name'" class="text-sm text-gray-600"
                                                    x-text="`Pilih ${field.input_type === 'image' ? 'Gambar' : 'File'}`">
                                                </p>
                                            </div>
                                        </div>
                                    </template>

                                    <template x-if="field.input_type !== 'file' && field.input_type !== 'image'">
                                        <input :type="field.input_type" :name="field.label" :id="field.label"
                                            class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600">
                                    </template>
                                </div>
                            </template>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-500 text-white rounded-md shadow-sm hover:bg-amber-600 focus:ring-2 focus:ring-amber-500 focus:outline-none transition-colors">
                                Kirim Pengajuan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener("change", function() {
                const fileName = this.files[0]?.name || "Tidak ada file yang dipilih";
                document.getElementById(this.id + "_name").textContent = fileName;
            });
        });
    </script>
</x-app-layout>