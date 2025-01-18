<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Beasiswa') }}
            </h2>

            <a class="px-4 py-2 text-white bg-amber-500 rounded-md hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-400"
                href="{{ route('applications.create') }}">
                Daftar Beasiswa
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <!-- Search and Filter -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <form id="searchForm" method="GET" action="{{ route('applications.index') }}"
                    class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                            placeholder="Cari beasiswa...">
                    </div>
                    <select name="status" id="status" onchange="document.getElementById('searchForm').submit()"
                        class="w-full sm:w-48 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status')==='pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="accepted" {{ request('status')==='accepted' ? 'selected' : '' }}>Disetujui
                        </option>
                        <option value="rejected" {{ request('status')==='rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </form>
            </div>

            <!-- Table -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Beasiswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($applications as $index => $application)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 text-sm">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm">{{ $application->scholarship->name }}</td>
                            <td class="px-6 py-4 text-sm">
                                {{ \Carbon\Carbon::parse($application->submission_date)->locale('id')->format('d M Y')
                                }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <span class="px-2 py-1 text-xs rounded-full
                                    {{ $application->status === 'accepted' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $application->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}
                                    {{ $application->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('applications.show', $application->id) }}"
                                    class="text-amber-600 hover:text-amber-800">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data pengajuan beasiswa.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="px-6 py-4 border-t">
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Debounce function
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

        // Handle search input
        const searchInput = document.getElementById('search');
        const form = document.getElementById('searchForm');

        const submitForm = debounce(() => {
            form.submit();
        }, 500);

        searchInput.addEventListener('input', submitForm);
    </script>
    @endpush
</x-app-layout>