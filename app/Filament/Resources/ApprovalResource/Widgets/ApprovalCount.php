<?php

namespace App\Filament\Resources\ApprovalResource\Widgets;

use App\Models\Application;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ApprovalCount extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPending = Application::where('status', 'pending')->count();
        $totalAccepted = Application::where('status', 'accepted')->count();
        $totalRejected = Application::where('status', 'rejected')->count();

        return [
            Stat::make('Pendaftaran Pending', $totalPending)
            ->description('Total pendaftaran yang belum diproses')
            ->descriptionIcon('heroicon-o-clock')
            ->color('warning')
            ->chart([3, 2, 4, 3, 5, $totalPending]),

            Stat::make('Pendaftaran diterima', $totalAccepted)
            ->description('Total pendaftaran yang disetujui')
            ->descriptionIcon('heroicon-o-check-circle')
            ->color('success')
            ->chart([2, 3, 4, 5, 4, $totalAccepted]),

            Stat::make('Pendaftaran ditolak', $totalRejected)
            ->description('Total pendaftaran yang tidak disetujui')
            ->descriptionIcon('heroicon-o-x-circle')
            ->color('danger')
            ->chart([1, 2, 1, 3, 2, $totalRejected]),
        ];
    }
}
