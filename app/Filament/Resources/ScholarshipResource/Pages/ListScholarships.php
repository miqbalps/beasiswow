<?php

namespace App\Filament\Resources\ScholarshipResource\Pages;

use Filament\Tables;
use Filament\Actions;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ScholarshipResource;

class ListScholarships extends ListRecords
{
    protected static ?string $title = 'Beasiswa';

    protected static string $resource = ScholarshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Beasiswa'),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('start_date')
                    ->label('Mulai Pendaftaran')
                    ->date(),
                TextColumn::make('end_date')
                    ->label('Tenggat Pendaftaran')
                    ->date(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => $state === 'active' ? 'success' : 'danger')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
