<?php

namespace App\Filament\Resources\ScholarshipResource\Widgets;

use App\Models\Scholarship;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ScholarshipCount extends BaseWidget
{
    protected function getStats(): array
    {
        $totalActive = Scholarship::where('status', 'active')->count();
        $totalInactive = Scholarship::where('status', 'inactive')->count();

        return [
            Stat::make('Beasiswa Aktif', $totalActive)
            ->description('Total beasiswa yang sedang dibuka')
            ->descriptionIcon('heroicon-o-check-circle')
            ->color('success')
            ->chart([7, 3, 4, 5, 6, $totalActive]),

            Stat::make('Beasiswa Non-Aktif', $totalInactive)
            ->description('Total beasiswa yang sudah ditutup')
            ->descriptionIcon('heroicon-o-x-circle')
            ->color('danger')
            ->chart([2, 4, 3, 5, 4, $totalInactive]),
        ];
    }
}
