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
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\ApprovalResource;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Group;

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
            // Existing Beasiswa section remains the same
            Group::make([
                TextInput::make('name')
                ->label('Nama Pendaftar')
                ->disabled(),
            ])
            ->relationship('user'),

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
                                    'text' => TextInput::make('submission_data.' . $field)
                                        ->label($requirement['label'])
                                        ->disabled(),

                                    'number' => TextInput::make('submission_data.' . $field)
                                        ->label($requirement['label'])
                                        ->numeric()
                                        ->disabled(),

                                    'file' => FileUpload::make('submission_data.' . $field . '.path')
                                        ->label($requirement['label'])
                                        ->disabled()
                                        ->preserveFilenames(),

                                    'image' => FileUpload::make('submission_data.' . $field . '.path')
                                        ->label($requirement['label'])
                                        ->image()
                                        ->disabled()
                                        ->preserveFilenames(),

                                    'select' => Select::make('submission_data.' . $field)
                                        ->label($requirement['label'])
                                        ->options(
                                            collect($requirement['options'] ?? [])
                                                ->pluck('value', 'value')
                                        )
                                        ->disabled(),

                                    default => TextInput::make('submission_data.' . $field)
                                        ->label($requirement['label'])
                                        ->disabled()
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



            // Add Identity Section
            Section::make('Data Pribadi')
                ->collapsible()
                ->collapsed('false')
                ->schema([
                    TextInput::make('identity.nik')->label('NIK')->disabled(),
                    TextInput::make('identity.nkk')->label('No. KK')->disabled(),
                    TextInput::make('identity.birth_place')->label('Tempat Lahir')->disabled(),
                    DatePicker::make('identity.birth_date')->label('Tanggal Lahir')->disabled(),
                    Select::make('identity.gender')
                        ->label('Jenis Kelamin')
                        ->options([
                            'male' => 'Laki-laki',
                            'female' => 'Perempuan',
                        ])->disabled(),
                    Select::make('identity.married')
                        ->label('Status Pernikahan')
                        ->options([
                            'single' => 'Belum Menikah',
                            'married' => 'Menikah',
                        ])->disabled(),
                    TextInput::make('identity.religion')->label('Agama')->disabled(),
                    TextInput::make('identity.phone')->label('No. Telepon')->disabled(),
                    TextInput::make('identity.child_number')->label('Anak ke')->disabled(),
                    TextInput::make('identity.income')->label('Penghasilan')->disabled(),
                    FileUpload::make('identity.kk_file')->label('File KK')->disabled(),
                    FileUpload::make('identity.ktp_photo')->label('Foto KTP')->disabled(),
                    FileUpload::make('identity.pass_photo')->label('Pas Foto')->disabled(),
                ])->columns(2),

            // Add Address Sections
            Section::make('Alamat KTP')
                ->collapsible()
                ->collapsed('false')
                ->schema($this->addressFields('ktp_domicile')),

            Section::make('Alamat Tinggal')
                ->collapsible()
                ->collapsed('false')
                ->schema($this->addressFields('current_domicile')),

            // Add Family Sections
            Section::make('Data Ayah')
                ->collapsible()
                ->collapsed('false')
                ->schema($this->familyFields('father')),

            Section::make('Data Ibu')
                ->collapsible()
                ->collapsed('false')
                ->schema($this->familyFields('mother')),

            Section::make('Data Wali')
                ->collapsible()
                ->collapsed('false')
                ->schema($this->familyFields('guardian')),

            // Add Education Section
            Section::make('Pendidikan Terakhir')
                ->collapsible()
                ->collapsed('false')
                ->schema([
                    TextInput::make('last_education.semester')->label('Semester')->disabled(),
                    TextInput::make('last_education.gpa')->label('IPK')->disabled(),
                    FileUpload::make('last_education.transcript_file')->label('File Transkrip')->disabled(),
                ])->columns(2),

            // Add Achievements Section
            Section::make('Prestasi')
                ->collapsible()
                ->collapsed('false')
                ->schema([
                    TextInput::make('achievement.name')->label('Nama Prestasi')->disabled(),
                    Select::make('achievement.type')
                        ->label('Jenis')
                        ->options([
                            'academic' => 'Akademik',
                            'non_academic' => 'Non-Akademik',
                        ])->disabled(),
                    Select::make('achievement.level')
                        ->label('Tingkat')
                        ->options([
                            'international' => 'Internasional',
                            'national' => 'Nasional',
                            'provincial' => 'Provinsi',
                            'regional' => 'Daerah',
                        ])->disabled(),
                    TextInput::make('achievement.rank')->label('Peringkat')->disabled(),
                    TextInput::make('achievement.year')->label('Tahun')->disabled(),
                    FileUpload::make('achievement.proof_file')->label('Bukti')->disabled(),
                ])->columns(2),
        ]);
    }

    // Helper method for address fields
    private function addressFields(string $type): array
    {
        return [
            TextInput::make("address.{$type}.street")->label('Jalan')->disabled(),
            TextInput::make("address.{$type}.rt")->label('RT')->disabled(),
            TextInput::make("address.{$type}.rw")->label('RW')->disabled(),
            TextInput::make("address.{$type}.postal_code")->label('Kode Pos')->disabled(),
            TextInput::make("address.{$type}.village")->label('Desa/Kelurahan')->disabled(),
            TextInput::make("address.{$type}.district")->label('Kecamatan')->disabled(),
            TextInput::make("address.{$type}.regency")->label('Kabupaten/Kota')->disabled(),
            TextInput::make("address.{$type}.province")->label('Provinsi')->disabled(),
        ];
    }

    // Helper method for family fields
    private function familyFields(string $type): array
    {
        return [
            TextInput::make("family.{$type}.full_name")->label('Nama Lengkap')->disabled(),
            TextInput::make("family.{$type}.last_education")->label('Pendidikan Terakhir')->disabled(),
            TextInput::make("family.{$type}.job")->label('Pekerjaan')->disabled(),
            TextInput::make("family.{$type}.position")->label('Jabatan')->disabled(),
            TextInput::make("family.{$type}.income")->label('Penghasilan')->disabled(),
            TextInput::make("family.{$type}.phone")->label('No. Telepon')->disabled(),
            TextInput::make("family.{$type}.address")->label('Alamat')->disabled(),
        ];
    }
}
