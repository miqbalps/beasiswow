<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-4 md:grid-cols-4 gap-6">
                        <x-card title="Beasiswa Tersedia" description="Jumlah beasiswa yang tersedia."
                            link="{{ route('applications.index') }}" wave-color="#0ea5e9">
                            {{ $availableScholarships }}
                        </x-card>
                        <x-card title="Pengajuan Pending" description="Jumlah pengajuan yang pending."
                            link="{{ route('applications.index') }}" wave-color="#f59e0b">
                            {{ $pendingApplications }}
                        </x-card>
                        <x-card title="Pengajuan Diterima" description="Jumlah pengajuan yang diterima."
                            link="{{ route('applications.index') }}" wave-color="#22c55e">
                            {{ $acceptedApplications }}
                        </x-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>