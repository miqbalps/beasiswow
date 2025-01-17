<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Pengajuan Beasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Application Details -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-6">Detail Status Pengajuan</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Status Card -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="@if($application->status === 'approved') bg-green-100 text-green-600
                     @elseif($application->status === 'rejected') bg-red-100 text-red-600
                     @else bg-yellow-100 text-yellow-600 @endif
                     p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @if($application->status === 'approved')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                    @elseif($application->status === 'rejected')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                    @else
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    @endif
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                                <p class="font-medium text-gray-900 dark:text-gray-100 capitalize">{{
                                    $application->status }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Date Card -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Pengajuan</p>
                                <p class="font-medium text-gray-900 dark:text-gray-100">
                                    {{ $application->created_at->format('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Last Updated -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-purple-100 text-purple-600 p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Terakhir Diperbarui</p>
                                <p class="font-medium text-gray-900 dark:text-gray-100">
                                    {{ $application->updated_at->format('d F Y H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Scholarship Type -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Jenis Beasiswa</p>
                                <p class="font-medium text-gray-900 dark:text-gray-100">
                                    {{ $application->scholarship->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scholarship Information -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Informasi Beasiswa</h3>
                <div class="space-y-4">
                    @php
                    $submissionData = is_string($application->submission_data)
                    ? json_decode($application->submission_data, true)
                    : $application->submission_data;

                    // Hapus _method
                    unset($submissionData['_method']);
                    @endphp

                    @foreach($submissionData as $label => $file)
                    @if(is_array($file) && isset($file['path']))
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            {{-- Icon Berdasarkan Tipe File --}}
                            <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg">
                                @if(str_contains($file['mime_type'], 'image'))
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                @elseif(str_contains($file['mime_type'], 'pdf'))
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0013.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                @else
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                @endif
                            </div>

                            <div>
                                <h4 class="font-medium text-gray-700 dark:text-gray-300">{{ $label }}</h4>
                                <p class="text-sm text-gray-500">{{ $file['original_name'] }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            @if(str_contains($file['mime_type'], 'image'))
                            <button x-data @click="$dispatch('open-modal', {
                                                src: '{{ Storage::url($file['path']) }}',
                                                name: '{{ $file['original_name'] }}'
                                            })" class="text-blue-500 hover:text-blue-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14m-7 7h7m-7-14h7" />
                                </svg>
                            </button>
                            @else
                            <a href="{{ Storage::url($file['path']) }}" target="_blank"
                                class="text-blue-600 hover:underline">
                                Lihat Dokumen
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Gambar --}}
    <div x-data="{
        imageModal: false,
        imageSrc: '',
        imageName: '',
        isZoomed: false
    }" x-on:open-modal.window="
        imageModal = true;
        imageSrc = $event.detail.src;
        imageName = $event.detail.name;
    " x-on:keydown.escape.window="imageModal = false">
        <div x-show="imageModal" x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div @click.outside="imageModal = false"
                class="bg-white dark:bg-gray-800 rounded-lg w-11/12 sm:w-8/12 md:w-6/12 lg:w-4/12 max-h-[80vh] relative">
                {{-- Header --}}
                <div class="flex justify-between items-center p-3 border-b">
                    <h3 x-text="imageName" class="text-base font-semibold text-gray-900 dark:text-gray-100"></h3>
                    <button @click="imageModal = false"
                        class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Konten Gambar --}}
                <div class="p-3 flex justify-center items-center">
                    <img x-bind:src="imageSrc" x-bind:alt="imageName" class="object-cover rounded-lg" height="200"
                        width="200">
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @endpush
</x-app-layout>