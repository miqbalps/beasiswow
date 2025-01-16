<?php

namespace App\Filament\Resources\ApprovalResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ApprovalResource;

class ListApprovals extends ListRecords
{
    protected static ?string $title = 'Persetujuan';

    protected static string $resource = ApprovalResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('scholarship.name')
                    ->label('Beasiswa')
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('Pendaftar')
                    ->searchable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'pending' => 'warning',
                        'review' => 'info',
                        'accepted' => 'success',
                        'rejected' => 'danger',
                    }),

                TextColumn::make('submission_date')
                    ->label('Tanggal pengajuan')
                    ->date()
                    ->sortable()
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'review' => 'Under Review',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected'
                    ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
