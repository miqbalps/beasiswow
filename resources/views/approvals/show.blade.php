<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Detail Pengajuan Beasiswa
            </h2>

            <!-- Add this after the first grid container div that shows the status cards -->
            <div class="flex justify-end space-x-4">
                @if(strtolower($approval->status) === 'pending')
                <form method="POST" action="{{ route('approvals.update', $approval) }}" class="inline">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="accepted">
                    <x-primary-button type="submit" class="bg-green-600 hover:bg-green-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Setujui
                    </x-primary-button>
                </form>

                <form method="POST" action="{{ route('approvals.update', $approval) }}" class="inline">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="rejected">
                    <x-danger-button type="submit">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Tolak
                    </x-danger-button>
                </form>
                @endif
            </div>

            <a href="{{ route('filament.admin.resources.approvals.index') }}"
                class="inline-flex items-center px-4 py-2 bg-amber-500 dark:bg-amber-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-amber-800 uppercase tracking-widest hover:bg-amber-600 dark:hover:bg-amber-300 focus:bg-amber-600 dark:focus:bg-amber-400 active:bg-amber-600 dark:active:bg-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-amber-800 transition ease-in-out duration-150">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
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
                            <div class="
                            {{ match($approval->status) {
                                'accepted' => 'bg-green-100 text-green-600',
                                'rejected' => 'bg-red-100 text-red-600',
                                default => 'bg-yellow-100 text-yellow-600'
                            } }}
                            p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @switch(strtolower($approval->status))
                                    @case('accepted')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" /> {{-- Checkmark icon --}}
                                    @break
                                    @case('rejected')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" /> {{-- X icon --}}
                                    @break
                                    @default
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /> {{-- Clock/pending icon --}}
                                    @endswitch
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                                <p class="font-medium text-gray-900 dark:text-gray-100">
                                    @if($approval->status === 'accepted')
                                    Disetujui
                                    @elseif($approval->status === 'rejected')
                                    Ditolak
                                    @else
                                    Menunggu
                                    @endif
                                </p>
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
                                    {{ \Carbon\Carbon::parse($approval->created_at)->locale('id')->isoFormat('D MMMM Y')
                                    }}
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
                                    {{ \Carbon\Carbon::parse($approval->updated_at)->locale('id')->isoFormat('D MMMM Y
                                    HH:mm') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Scholarship Type -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-amber-100 text-amber-600 p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Jenis Beasiswa</p>
                                <p class="font-medium text-gray-900 dark:text-gray-100">
                                    {{ $approval->scholarship->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Beasiswa -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Informasi Beasiswa</h3>
                <div class="space-y-4">
                    @php
                    $submissionData = is_string($approval->submission_data)
                    ? json_decode($approval->submission_data, true)
                    : $approval->submission_data;

                    // Hapus _method
                    unset($submissionData['_method']);

                    // Terjemahkan label ke Bahasa Indonesia
                    $translations = [
                    'family_card' => 'Kartu Keluarga',
                    'id_card' => 'KTP',
                    'photo' => 'Pas Foto',
                    'transcript' => 'Transkrip Nilai',
                    'certificate' => 'Sertifikat',
                    'income_statement' => 'Surat Keterangan Penghasilan',
                    'bank_statement' => 'Rekening Bank',
                    'other_documents' => 'Dokumen Lainnya'
                    ];
                    @endphp

                    @foreach($submissionData as $label => $file)
                    @if(is_array($file) && isset($file['path']))
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            {{-- Ikon Berdasarkan Tipe Berkas --}}
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
                                <h4 class="font-medium text-gray-700 dark:text-gray-300">
                                    {{ $translations[$label] ?? ucwords(str_replace('_', ' ', $label)) }}
                                </h4>
                                <p class="text-sm text-gray-500">{{ $file['original_name'] }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            @if(str_contains($file['mime_type'], 'image'))
                            <button x-data @click="$dispatch('open-modal', {
                                                src: '{{ Storage::url($file['path']) }}',
                                                name: '{{ $translations[$label] ?? ucwords(str_replace('_', ' ', $label)) }}'
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

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Data Diri</h3>
                <!-- Personal Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- NIK -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 transition duration-300 hover:shadow-md">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">NIK</p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                    $approval->user->identity->nik }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Nama -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 transition duration-300 hover:shadow-md">
                        <div class="flex items-center space-x-3">
                            <div class="bg-purple-100 text-purple-600 p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama</p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                    $approval->user->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- NKK -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 transition duration-300 hover:shadow-md">
                        <div class="flex items-center space-x-3">
                            <div class="bg-green-100 text-green-600 p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">NKK</p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                    $approval->user->identity->nkk }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tempat Lahir -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 transition duration-300 hover:shadow-md">
                        <div class="flex items-center space-x-3">
                            <div class="bg-red-100 text-red-600 p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tempat Lahir</p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                    $approval->user->identity->birth_place }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 transition duration-300 hover:shadow-md">
                        <div class="flex items-center space-x-3">
                            <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Lahir</p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{
                                    $approval->user->identity->birth_date }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Other fields follow the same pattern... -->
                    <!-- Add appropriate icons and colors for each remaining field -->

                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 transition duration-300 hover:shadow-md">
                        <div class="flex items-center space-x-3">
                            <div class="bg-amber-100 text-amber-600 p-3 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jenis Kelamin</p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $approval->user->identity->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Add remaining fields with similar styling -->
                    <!-- Each field should have a unique icon and color combination -->

                </div>

                <!-- Identity Documents -->
                <div class="mt-8">
                    <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-4">Berkas Identitas</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- KK File -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Kartu Keluarga</p>
                                        <p class="text-xs text-gray-400">{{ basename($approval->user->identity->kk_file)
                                            }}</p>
                                    </div>
                                </div>
                                <a href="{{ Storage::url($approval->user->identity->kk_file) }}" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    Lihat
                                </a>
                            </div>
                        </div>

                        <!-- KTP Photo -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Foto KTP</p>
                                        <p class="text-xs text-gray-400">{{
                                            basename($approval->user->identity->ktp_photo) }}</p>
                                    </div>
                                </div>
                                <button x-data @click="$dispatch('open-modal', {
                                    src: '{{ Storage::url($approval->user->identity->ktp_photo) }}',
                                    name: 'Foto KTP'
                                })" class="text-blue-600 hover:underline">
                                    Lihat
                                </button>
                            </div>
                        </div>

                        <!-- Pass Photo -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0013.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Pas Foto</p>
                                        <p class="text-xs text-gray-400">{{
                                            basename($approval->user->identity->pass_photo) }}</p>
                                    </div>
                                </div>
                                <a href="{{ Storage::url($approval->user->identity->pass_photo) }}" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="mt-8">
                    <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-6 flex items-center space-x-2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Alamat KTP</span>
                    </h4>

                    @foreach($approval->user->identity->addresses as $address)
                    @if($address->type === 'ktp_domicile')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Street -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jalan</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $address->street }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- RT/RW -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-green-100 text-green-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">RT/RW</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $address->rt }}/{{
                                        $address->rw }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Village -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-purple-100 text-purple-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Desa/Kelurahan</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">
                                        @php
                                        $villageData =
                                        Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/village/'.$address->village.'.json');
                                        echo $villageData->successful() ? $villageData['name'] : $address->village;
                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- District -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kecamatan</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">
                                        @php
                                        $districtData =
                                        Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/district/'.$address->district.'.json');
                                        echo $districtData->successful() ? $districtData['name'] : $address->district;
                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Regency -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-red-100 text-red-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kabupaten/Kota</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">
                                        @php
                                        $regencyData =
                                        Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/regency/'.$address->regency.'.json');
                                        echo $regencyData->successful() ? $regencyData['name'] : $address->regency;
                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Province -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-amber-100 text-amber-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Provinsi</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">
                                        @php
                                        $provinceData =
                                        Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/province/'.$address->province.'.json');
                                        echo $provinceData->successful() ? $provinceData['name'] : $address->province;
                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Postal Code -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-pink-100 text-pink-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kode Pos</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $address->postal_code
                                        }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

                <!-- Address Information -->
                <div class="mt-8">
                    <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-6 flex items-center space-x-2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Alamat Domisili</span>
                    </h4>

                    @foreach($approval->user->identity->addresses as $address)
                    @if($address->type === 'current_domicile')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Street -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jalan</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $address->street }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- RT/RW -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-green-100 text-green-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">RT/RW</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $address->rt }}/{{
                                        $address->rw }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Administrative Areas -->
                        @php
                        $areas = [
                        'village' => ['label' => 'Desa/Kelurahan', 'color' => 'purple', 'url' => 'village'],
                        'district' => ['label' => 'Kecamatan', 'color' => 'yellow', 'url' => 'district'],
                        'regency' => ['label' => 'Kabupaten/Kota', 'color' => 'red', 'url' => 'regency'],
                        'province' => ['label' => 'Provinsi', 'color' => 'amber', 'url' => 'province']
                        ];
                        @endphp

                        @foreach($areas as $key => $area)
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-{{ $area['color'] }}-100 text-{{ $area['color'] }}-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $area['label'] }}
                                    </p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">
                                        @php
                                        $response =
                                        Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/{$area['url']}/{$address->$key}.json");
                                        echo $response->successful() ? $response['name'] : $address->$key;
                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- Postal Code -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <div class="bg-pink-100 text-pink-600 p-3 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kode Pos</p>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $address->postal_code
                                        }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

                <!-- Family Information -->
                <div class="mt-8">
                    <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-6 flex items-center space-x-2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span>Data Keluarga</span>
                    </h4>

                    @if($approval->user->identity->families->count() > 0)
                    @foreach($approval->user->identity->families as $family)
                    <div
                        class="mb-6 bg-gray-50 dark:bg-gray-700 rounded-lg p-6 transition duration-300 hover:shadow-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-6">
                                <!-- Personal Info Section -->
                                <div>
                                    <h5
                                        class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>Informasi Pribadi</span>
                                    </h5>

                                    <div class="space-y-4">
                                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Lengkap
                                            </p>
                                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{
                                                $family->full_name ?? '-' }}</p>
                                        </div>

                                        <div class="flex space-x-4">
                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">
                                                    Status Keluarga</p>
                                                @php
                                                $familyType = [
                                                'father' => 'Ayah',
                                                'mother' => 'Ibu',
                                                'sister' => 'Saudara Perempuan',
                                                'brother' => 'Saudara Laki-laki',
                                                'guardian' => 'Wali'
                                                ][$family->type] ?? $family->type;
                                                @endphp
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                    {{ $familyType }}
                                                </span>
                                            </div>

                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">
                                                    Status</p>
                                                @php
                                                $lifeStatus = [
                                                'alive' => ['text' => 'Hidup', 'color' => 'green'],
                                                'deceased' => ['text' => 'Meninggal', 'color' => 'gray']
                                                ][$family->status] ?? ['text' => $family->status, 'color' => 'blue'];
                                                @endphp
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full bg-{{ $lifeStatus['color'] }}-100 text-{{ $lifeStatus['color'] }}-800 dark:bg-{{ $lifeStatus['color'] }}-900 dark:text-{{ $lifeStatus['color'] }}-300">
                                                    {{ $lifeStatus['text'] }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pendidikan
                                                Terakhir</p>
                                            @php
                                            $education = [
                                            'elementary' => 'SD',
                                            'junior_high' => 'SMP',
                                            'high_school' => 'SMA/SMK',
                                            'diploma' => 'Diploma',
                                            'bachelor' => 'S1',
                                            'master' => 'S2',
                                            'doctorate' => 'S3'
                                            ][$family->last_education] ?? $family->last_education;
                                            @endphp
                                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $education }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <!-- Professional Info Section -->
                                <div>
                                    <h5
                                        class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <span>Informasi Profesional</span>
                                    </h5>

                                    <div class="space-y-4">
                                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pekerjaan
                                            </p>
                                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $family->job ??
                                                '-' }}</p>
                                        </div>

                                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jabatan</p>
                                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{
                                                $family->position ?? '-' }}</p>
                                        </div>

                                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Penghasilan
                                                per Bulan</p>
                                            <p class="font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $family->income ? 'Rp ' . number_format($family->income, 0, ',', '.')
                                                : '-' }}
                                            </p>
                                        </div>

                                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor
                                                Telepon</p>
                                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $family->phone
                                                ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="flex items-center justify-center py-8 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <p class="mt-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                Belum ada data keluarga yang ditambahkan
                            </p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Educational Information -->
                <div class="mt-8">
                    <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-4">Data Pendidikan Terakhir</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Semester</p>
                            <p class="font-medium text-gray-900 dark:text-gray-100">{{
                                $approval->user->identity->last_edu->semester ?? '-' }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">IPK</p>
                            <p class="font-medium text-gray-900 dark:text-gray-100">{{
                                $approval->user->identity->last_edu->gpa ?? '-' }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 md:col-span-2">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Transkrip Nilai</p>
                                        <p class="text-xs text-gray-400">{{
                                            basename($approval->user->identity->last_edu->transcript_file ?? '-') }}</p>
                                    </div>
                                </div>
                                @if($approval->user->identity->last_edu?->transcript_file)
                                <a href="{{ Storage::url($approval->user->identity->last_edu->transcript_file) }}"
                                    target="_blank" class="text-blue-600 hover:underline">
                                    Lihat
                                </a>
                                @else
                                <span class="text-gray-400">Tidak ada file</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Achievement Information -->
                <div class="mt-8">
                    <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-4">Data Prestasi</h4>
                    @if($approval->user->identity->achievements->count() > 0)
                    @foreach($approval->user->identity->achievements as $achievement)
                    <div class="mb-6 bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Nama Prestasi</p>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">{{ $achievement->name }}</p>
                                </div>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Jenis</p>
                                    <p class="font-medium text-gray-900 dark:text-gray-100 capitalize">
                                        @php
                                        $type = [
                                        'academic' => 'Akademik',
                                        'non_academic' => 'Non Akademik'
                                        ][$achievement->type] ?? $achievement->type;
                                        @endphp
                                        {{ $type }}
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tingkat</p>
                                    <p class="font-medium text-gray-900 dark:text-gray-100 capitalize">
                                        @php
                                        $level = [
                                        'international' => 'Internasional',
                                        'national' => 'Nasional',
                                        'province' => 'Provinsi',
                                        'district' => 'Kabupaten/Kota',
                                        'subdistrict' => 'Kecamatan'
                                        ][$achievement->level] ?? $achievement->level;
                                        @endphp
                                        {{ $level }}
                                    </p>
                                </div>
                            </div>

                            <div>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Peringkat</p>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">{{ $achievement->rank }}</p>
                                </div>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tahun</p>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">{{ $achievement->year }}</p>
                                </div>
                                <div class="mb-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">Bukti Prestasi</p>
                                                <p class="text-xs text-gray-400">{{ basename($achievement->proof_file)
                                                    }}</p>
                                            </div>
                                        </div>
                                        <a href="{{ Storage::url($achievement->proof_file) }}" target="_blank"
                                            class="text-blue-600 hover:underline">
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="text-center py-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <p class="text-gray-500 dark:text-gray-400">Belum ada data prestasi yang ditambahkan</p>
                    </div>
                    @endif
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