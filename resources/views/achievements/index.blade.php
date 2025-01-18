<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Prestasi') }}
            </h2>

            <a class="px-4 py-2 text-white bg-amber-500 rounded-md hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-400"
                href="{{ route('achievements.create') }}">
                Tambah Prestasi
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <!-- Search and Filter Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <form id="searchForm" method="GET" action="{{ route('achievements.index') }}"
                    class="flex flex-col md:flex-row gap-4">
                    <!-- Search Input -->
                    <div class="flex-1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                class="block w-full pl-10 pr-3 py-2.5 border-0 ring-1 ring-inset ring-gray-300 dark:ring-gray-700 rounded-lg leading-5 bg-white dark:bg-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-amber-500 sm:text-sm"
                                placeholder="Cari prestasi...">
                        </div>
                    </div>

                    <!-- Level Filter -->
                    <div class="w-full md:w-48">
                        <select name="level" id="level" onchange="document.getElementById('searchForm').submit()"
                            class="block w-full px-3 py-2.5 border-0 ring-1 ring-inset ring-gray-300 dark:ring-gray-700 rounded-lg bg-white dark:bg-gray-900 focus:ring-2 focus:ring-amber-500 sm:text-sm">
                            <option value="">Semua Tingkatan</option>
                            <option value="internasional" {{ request('level')==='internasional' ? 'selected' : '' }}>
                                Internasional</option>
                            <option value="nasional" {{ request('level')==='nasional' ? 'selected' : '' }}>Nasional
                            </option>
                            <option value="provinsi" {{ request('level')==='provinsi' ? 'selected' : '' }}>Provinsi
                            </option>
                            <option value="kota" {{ request('level')==='kota' ? 'selected' : '' }}>Kota</option>
                        </select>
                    </div>
                </form>
            </div>

            <!-- Table Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    No</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Nama</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Jenis</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Tingkat</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Peringkat</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Tahun</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($achievements as $index => $achievement)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{
                                    $achievements->firstItem() + $index }}</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $achievement->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{
                                    $achievement->type == 'individual' ? 'Perorangan' : 'Kelompok' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    @php
                                    $tingkatan = [
                                    'internasional' => 'Internasional',
                                    'nasional' => 'Nasional',
                                    'regional' => 'Provinsi',
                                    'local' => 'Kabupaten/Kota'
                                    ];
                                    @endphp
                                    {{ $tingkatan[$achievement->level] ?? ucfirst($achievement->level) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{
                                    $achievement->rank }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{
                                    $achievement->year }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex space-x-4">
                                        <a href="{{ route('achievements.show', $achievement->id) }}"
                                            class="text-amber-600 hover:text-amber-900 dark:hover:text-amber-400 font-medium">
                                            Lihat
                                        </a>
                                        <form action="{{ route('achievements.destroy', $achievement->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus prestasi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 dark:hover:text-red-400 font-medium">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                    Tidak ada data prestasi yang ditemukan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $achievements->links() }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        const searchInput = document.getElementById('search');
        const form = document.getElementById('searchForm');

        const submitForm = debounce(() => {
            form.submit();
        }, 500);

        searchInput.addEventListener('input', submitForm);
    </script>
    @endpush
</x-app-layout>