<?php

namespace App\Filament\Resources\ScholarshipResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ScholarshipResource;

class CreateScholarship extends CreateRecord
{
    protected static ?string $title = 'Tambah Beasiswa';

    protected static string $resource = ScholarshipResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Beasiswa')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->columnSpanFull()
                            ->rows(4),

                        DatePicker::make('start_date')
                            ->label('Mulai Pendaftaran')
                            ->required(),
                        DatePicker::make('end_date')
                            ->label('Tenggat Pendaftaran')
                            ->required(),

                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive'
                            ])
                            ->default('active'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Persyaratan Pendaftaran')
                    ->schema([
                        Repeater::make('requirements')
                            ->label('Inputan Persyaratan')
                            ->schema([
                                Select::make('input_type')
                                    ->options([
                                        'text' => 'Text Input',
                                        'number' => 'Number',
                                        'file' => 'File Upload',
                                        'image' => 'Image Upload',
                                        'select' => 'Dropdown'
                                    ])
                                    ->label('Tipe inputan')
                                    ->required(),

                                TextInput::make('label')
                                    ->required(),

                                TextInput::make('description')
                                    ->label('Deskripsi')
                                    ->nullable(),

                                TextInput::make('validation_rules')
                                    ->label('Validasi Rule')
                                    ->nullable()
                                    ->helperText('Contoh: max:2048|mimes:jpg,png')
                        ])
                        ->columns(2)
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }
}
