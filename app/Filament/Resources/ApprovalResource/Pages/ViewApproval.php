<?php

namespace App\Filament\Resources\ApprovalResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Support\Str;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\ApprovalResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Notifications\Notification;

class ViewApproval extends ViewRecord
{
    protected static ?string $title = 'Detail Pengajuan';

    protected static string $resource = ApprovalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('approve')
                ->label('Setuju')
                ->color('success')
                ->icon('heroicon-o-check')
                ->action(function () {
                    $record = $this->getRecord();
                    $record->update(['status' => 'accepted']);

                    Notification::make()
                        ->title('Application Approved')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->modalHeading('Approve Application')
                ->modalDescription('Are you sure you want to approve this application?')
                ->modalSubmitActionLabel('Yes, approve')
                ->visible(fn () => $this->getRecord()->status !== 'accepted'),

            Action::make('reject')
                ->label('Tolak')
                ->color('danger')
                ->icon('heroicon-o-x-mark')
                ->action(function () {
                    $record = $this->getRecord();
                    $record->update(['status' => 'rejected']);

                    Notification::make()
                        ->title('Application Rejected')
                        ->danger()
                        ->send();
                })
                ->requiresConfirmation()
                ->modalHeading('Reject Application')
                ->modalDescription('Are you sure you want to reject this application?')
                ->modalSubmitActionLabel('Yes, reject')
                ->visible(fn () => $this->getRecord()->status !== 'rejected'),

            Actions\EditAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Beasiswa Dipilih')
                ->collapsible()
                ->schema([
                    Select::make('scholarship_id')
                        ->label('Beasiswa')
                        ->options(
                            Scholarship::where('status', 'active')
                                ->where('end_date', '>=', now())
                                ->pluck('name', 'id')
                        )
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function (callable $set) {
                            $set('dynamic_requirements', null);
                        }),

                    DatePicker::make('submission_date')
                        ->label('Tanggal Pengajuan')
                        ->native(false)
                        ->displayFormat('d F Y')
                        ->locale('id')
                        ->disabled()
                ])
                ->columns(2),

            Section::make('Detail Pengajuan')
                ->collapsible()
                ->schema(function (callable $get) {
                    $scholarshipId = $get('scholarship_id');

                    if (!$scholarshipId) {
                        return [
                            TextInput::make('select_scholarship_first')
                                ->label('Please select a scholarship first')
                                ->disabled()
                        ];
                    }

                    $scholarship = Scholarship::find($scholarshipId);
                    $application = Application::find($get('id'));

                    if (!$scholarship) {
                        return [];
                    }

                    $dynamicFields = collect($scholarship->requirements ?? [])->map(function ($requirement) {
                        $fieldName = 'requirement_' . Str::slug($requirement['label']);
                        $field = $requirement['label'];

                        $baseField = match($requirement['input_type']) {
                            'text' => TextInput::make('submission_data.'.$field)
                                ->label($requirement['label'])
                                ->required(),

                            'number' => TextInput::make('submission_data.'.$field)
                                ->label($requirement['label'])
                                ->numeric()
                                ->required(),

                            'file' => FileUpload::make('submission_data.'.$field)
                                ->label($requirement['label'])
                                ->required()
                                ->preserveFilenames()
                                ->directory('scholarship_applications'),

                            'image' => FileUpload::make('submission_data.'.$field)
                                ->label($requirement['label'])
                                ->image()
                                ->required()
                                ->preserveFilenames()
                                ->directory('/'),

                            'select' => Select::make('submission_data.'.$field)
                                ->label($requirement['label'])
                                ->options(
                                    collect($requirement['options'] ?? [])
                                        ->pluck('value', 'value')
                                )
                                ->required(),

                            default => TextInput::make('submission_data.'.$field)
                                ->label($requirement['label'])
                        };

                        if (!empty($requirement['description'])) {
                            $baseField->helperText($requirement['description']);
                        }

                        return $baseField;
                    })->toArray();

                    return array_merge(
                        $dynamicFields,
                    );
                })
                ->columns(2),
        ]);
    }
}
