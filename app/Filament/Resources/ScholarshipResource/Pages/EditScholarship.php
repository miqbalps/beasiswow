<?php

namespace App\Filament\Resources\ScholarshipResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\ScholarshipResource;

class EditScholarship extends EditRecord
{
    protected static string $resource = ScholarshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
            Section::make('Scholarship Details')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->columnSpanFull(),

                    Textarea::make('description')
                        ->required()
                        ->columnSpanFull()
                        ->rows(4),

                    DatePicker::make('start_date')->required(),
                    DatePicker::make('end_date')->required(),

                    Select::make('status')
                        ->options([
                            'active' => 'Active',
                            'inactive' => 'Inactive'
                        ])
                        ->default('active'),

                    Repeater::make('requirements')
                        ->schema([
                            Select::make('input_type')
                                ->options([
                                    'text' => 'Text Input',
                                    'number' => 'Number',
                                    'file' => 'File Upload',
                                    'image' => 'Image Upload',
                                    'select' => 'Dropdown'
                                ])
                                ->required(),

                            TextInput::make('label')
                                ->required(),

                            TextInput::make('description')
                                ->nullable(),

                            TextInput::make('validation_rules')
                                ->nullable()
                                ->helperText('Contoh: max:2048|mimes:jpg,png')
                        ])
                        ->columnSpanFull()
                ])
            ]);
    }
}
