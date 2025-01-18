<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Identitas Diri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
            {{-- data diri --}}
            <div x-data="{ open: false }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Data Diri</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <form method="POST" action="{{ route('identity.update') }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-2 gap-4">
                            <!-- NIK -->
                            <div>
                                <label for="nik"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Induk
                                    Kependudukan</label>
                                <input type="text" name="nik" id="nik"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    value="{{ old('nik', $identity->nik) }}" required>
                                @error('nik')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Name -->
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Lengkap</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    value="{{ old('name', $identity->user->name) }}" required>
                                @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- NKK -->
                            <div>
                                <label for="nkk"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Kartu
                                    Keluarga</label>
                                <input type="text" name="nkk" id="nkk"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    value="{{ old('nkk', $identity->nkk) }}" required>
                                @error('nkk')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Birth Place -->
                            <div>
                                <label for="birth_place"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tempat
                                    Lahir</label>
                                <input type="text" name="birth_place" id="birth_place"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    value="{{ old('birth_place', $identity->birth_place) }}" required>
                                @error('birth_place')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Birth Date -->
                            <div>
                                <label for="birth_date"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                    Lahir</label>
                                <input type="date" name="birth_date" id="birth_date"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    value="{{ old('birth_date', $identity->birth_date) }}" required>
                                @error('birth_date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="gender"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis
                                    Kelamin</label>
                                <select name="gender" id="gender"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600">
                                    <option value="male" {{ old('gender', $identity->gender) == 'male' ? 'selected' : ''
                                        }}>Laki-laki</option>
                                    <option value="female" {{ old('gender', $identity->gender) == 'female' ? 'selected'
                                        : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Married -->
                            <div>
                                <label for="married"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status
                                    Menikah</label>
                                <select name="married" id="married"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600">
                                    <option value="yes" {{ old('married', $identity->married) == 'yes' ? 'selected' : ''
                                        }}>Menikah</option>
                                    <option value="no" {{ old('married', $identity->married) == 'no' ? 'selected' : ''
                                        }}>Belum Menikah</option>
                                </select>
                                @error('married')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Religion -->
                            <div>
                                <label for="religion"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Agama</label>
                                <input type="text" name="religion" id="religion"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    value="{{ old('religion', $identity->religion) }}" required>
                                @error('religion')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                                    Handphone</label>
                                <input type="text" name="phone" id="phone"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    value="{{ old('phone', $identity->phone) }}" required>
                                @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Child Number -->
                            <div>
                                <label for="child_number"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Anak Ke</label>
                                <input type="number" name="child_number" id="child_number"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    value="{{ old('child_number', $identity->child_number) }}" required>
                                @error('child_number')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Origin -->
                            <div>
                                <label for="origin"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dari</label>
                                <input type="text" name="origin" id="origin"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    value="{{ old('origin', $identity->origin) }}" required>
                                @error('origin')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Income -->
                            <div>
                                <label for="income"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penghasilan</label>
                                <input type="number" name="income" id="income"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    value="{{ old('income', $identity->income) }}" required>
                                @error('income')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-2 flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-600 text-white rounded-md shadow-sm hover:bg-amber-500 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- domisili ktp --}}
            <div x-data="{ open: false }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Domisili Berdasarkan KTP</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <form method="POST" action="{{ route('identity.updateKtpDomicile') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required value="{{ $ktp_domicile->nik }}">
                        </div>

                        <!-- Type -->
                        <div>
                            <input type="hidden" name="type" id="type" value="{{ $ktp_domicile->type }}"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Street -->
                            <div>
                                <label for="street_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Street</label>
                                <input type="text" name="street" id="street_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('street') border-red-500 @enderror"
                                    value="{{ old('street', $ktp_domicile->street) }}" required>
                                @error('street')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- RT -->
                            <div>
                                <label for="rt_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">RT</label>
                                <input type="number" min="1" name="rt" id="rt_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('rt') border-red-500 @enderror"
                                    value="{{ old('rt', $ktp_domicile->rt) }}" required>
                                @error('rt')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- RW -->
                            <div>
                                <label for="rw_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">RW</label>
                                <input type="number" min="1" name="rw" id="rw_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('rw') border-red-500 @enderror"
                                    value="{{ old('rw', $ktp_domicile->rw) }}" required>
                                @error('rw')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Postal Code -->
                            <div>
                                <label for="postal_code_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode Pos</label>
                                <input type="text" name="postal_code" id="postal_code_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('postal_code') border-red-500 @enderror"
                                    value="{{ old('postal_code', $ktp_domicile->postal_code) }}" required>
                                @error('postal_code')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Village -->
                            <div>
                                <label for="village_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Desa/Kelurahan</label>
                                <select name="village" id="village_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('village') border-red-500 @enderror"
                                    required>
                                    @php
                                    $selectedVillage = old('village', $ktp_domicile->village);
                                    @endphp
                                    <option value="">Pilih Desa/Kelurahan</option>
                                    @if($selectedVillage)
                                    @php
                                    $response =
                                    Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/village/{$selectedVillage}.json");
                                    $village = $response->json();
                                    @endphp
                                    <option value="{{ $selectedVillage }}" selected>{{ $village['name'] }}</option>
                                    @endif
                                </select>
                                @error('village')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- District -->
                            <div>
                                <label for="district_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kecamatan</label>
                                <select name="district" id="district_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('district') border-red-500 @enderror"
                                    required>
                                    @php
                                    $selectedDistrict = old('district', $ktp_domicile->district);
                                    @endphp
                                    <option value="">Pilih Kecamatan</option>
                                    @if($selectedDistrict)
                                    @php
                                    $response =
                                    Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/district/{$selectedDistrict}.json");
                                    $district = $response->json();
                                    @endphp
                                    <option value="{{ $selectedDistrict }}" selected>{{ $district['name'] }}</option>
                                    @endif
                                </select>
                                @error('district')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Regency -->
                            <div>
                                <label for="regency_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kabupaten/Kota</label>
                                <select name="regency" id="regency_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('regency') border-red-500 @enderror"
                                    required>
                                    @php
                                    $selectedRegency = old('regency', $ktp_domicile->regency);
                                    @endphp
                                    <option value="">Pilih Kab/Kota</option>
                                    @if($selectedRegency)
                                    @php
                                    $response =
                                    Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regency/{$selectedRegency}.json");
                                    $regency = $response->json();
                                    @endphp
                                    <option value="{{ $selectedRegency }}" selected>{{ $regency['name'] }}</option>
                                    @endif
                                </select>
                                @error('regency')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Province -->
                            <div>
                                <label for="province_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Provinsi</label>
                                <select name="province" id="province_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('province') border-red-500 @enderror"
                                    required>
                                    @php
                                    $selectedProvince = old('province', $ktp_domicile->province);
                                    @endphp
                                    <option value="">Pilih Provinsi</option>
                                    @if($selectedProvince)
                                    @php
                                    $response =
                                    Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/province/{$selectedProvince}.json");
                                    $province = $response->json();
                                    @endphp
                                    <option value="{{ $selectedProvince }}" selected>{{ $province['name'] }}</option>
                                    @endif
                                </select>
                                @error('province')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-span-2 flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-amber-600 text-white rounded-md shadow-sm hover:bg-amber-500 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            {{-- domisili saat ini --}}
            <div x-data="{ open: false }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Tempat Tinggal Saat Ini</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <form method="POST" action="{{ route('identity.updateCurrentDomicile') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required value="{{ $current_domicile->nik }}">
                        </div>

                        <!-- Type -->
                        <div>
                            <input type="hidden" name="type" id="type" value="{{ $current_domicile->type }}"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Street -->
                            <div>
                                <label for="street_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Street</label>
                                <input type="text" name="street" id="street_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('street') border-red-500 @enderror"
                                    value="{{ old('street', $current_domicile->street) }}" required>
                                @error('street')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- RT -->
                            <div>
                                <label for="rt_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">RT</label>
                                <input type="number" min="1" name="rt" id="rt_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('rt') border-red-500 @enderror"
                                    value="{{ old('rt', $current_domicile->rt) }}" required>
                                @error('rt')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- RW -->
                            <div>
                                <label for="rw_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">RW</label>
                                <input type="number" min="1" name="rw" id="rw_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('rw') border-red-500 @enderror"
                                    value="{{ old('rw', $current_domicile->rw) }}" required>
                                @error('rw')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Postal Code -->
                            <div>
                                <label for="postal_code_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode Pos</label>
                                <input type="text" name="postal_code" id="postal_code_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('postal_code') border-red-500 @enderror"
                                    value="{{ old('postal_code', $current_domicile->postal_code) }}" required>
                                @error('postal_code')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Village -->
                            <div>
                                <label for="village_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Desa/Kelurahan</label>
                                <select name="village" id="village_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('village') border-red-500 @enderror"
                                    required>
                                    @php
                                    $selectedVillage = old('village', $current_domicile->village);
                                    @endphp
                                    <option value="">Pilih Desa/Kelurahan</option>
                                    @if($selectedVillage)
                                    @php
                                    $response =
                                    Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/village/{$selectedVillage}.json");
                                    $village = $response->json();
                                    @endphp
                                    <option value="{{ $selectedVillage }}" selected>{{ $village['name'] }}</option>
                                    @endif
                                </select>
                                @error('village')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- District -->
                            <div>
                                <label for="district_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kecamatan</label>
                                <select name="district" id="district_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('district') border-red-500 @enderror"
                                    required>
                                    @php
                                    $selectedDistrict = old('district', $current_domicile->district);
                                    @endphp
                                    <option value="">Pilih Kecamatan</option>
                                    @if($selectedDistrict)
                                    @php
                                    $response =
                                    Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/district/{$selectedDistrict}.json");
                                    $district = $response->json();
                                    @endphp
                                    <option value="{{ $selectedDistrict }}" selected>{{ $district['name'] }}</option>
                                    @endif
                                </select>
                                @error('district')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Regency -->
                            <div>
                                <label for="regency_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kabupaten/Kota</label>
                                <select name="regency" id="regency_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('regency') border-red-500 @enderror"
                                    required>
                                    @php
                                    $selectedRegency = old('regency', $current_domicile->regency);
                                    @endphp
                                    <option value="">Pilih Kab/Kota</option>
                                    @if($selectedRegency)
                                    @php
                                    $response =
                                    Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regency/{$selectedRegency}.json");
                                    $regency = $response->json();
                                    @endphp
                                    <option value="{{ $selectedRegency }}" selected>{{ $regency['name'] }}</option>
                                    @endif
                                </select>
                                @error('regency')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Province -->
                            <div>
                                <label for="province_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Provinsi</label>
                                <select name="province" id="province_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('province') border-red-500 @enderror"
                                    required>
                                    @php
                                    $selectedProvince = old('province', $current_domicile->province);
                                    @endphp
                                    <option value="">Pilih Provinsi</option>
                                    @if($selectedProvince)
                                    @php
                                    $response =
                                    Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/province/{$selectedProvince}.json");
                                    $province = $response->json();
                                    @endphp
                                    <option value="{{ $selectedProvince }}" selected>{{ $province['name'] }}</option>
                                    @endif
                                </select>
                                @error('province')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-span-2 flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-amber-600 text-white rounded-md shadow-sm hover:bg-amber-500 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            {{-- data ayah --}}
            <div x-data="{ open: false }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Data Ayah</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <form method="POST" action="{{ route('identity.updateFather') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik_father"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                value="{{ $father->nik }}" required>
                        </div>

                        <!-- Type -->
                        <div>
                            <input type="hidden" name="type" id="type_father"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                value="{{ $father->type }}" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Status -->
                            <div>
                                <label for="status_father"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <input type="text" name="status" id="status_father"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('status') border-red-500 @enderror"
                                    value="{{ old('status', $father->status) }}" required>
                                @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="full_name_father"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Lengkap</label>
                                <input type="text" name="full_name" id="full_name_father"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('full_name') border-red-500 @enderror"
                                    value="{{ old('full_name', $father->full_name) }}" required>
                                @error('full_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Last Education -->
                            <div>
                                <label for="last_education_father"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pendidikan
                                    Terakhir</label>
                                <input type="text" name="last_education" id="last_education_father"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('last_education') border-red-500 @enderror"
                                    value="{{ old('last_education', $father->last_education) }}" required>
                                @error('last_education')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Job -->
                            <div>
                                <label for="job_father"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pekerjaan</label>
                                <input type="text" name="job" id="job_father"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('job') border-red-500 @enderror"
                                    value="{{ old('job', $father->job) }}" required>
                                @error('job')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Position -->
                            <div>
                                <label for="position_father"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Posisi</label>
                                <input type="text" name="position" id="position_father"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('position') border-red-500 @enderror"
                                    value="{{ old('position', $father->position) }}" required>
                                @error('position')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Income -->
                            <div>
                                <label for="income_father"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penghasilan</label>
                                <input type="number" name="income" id="income_father"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('income') border-red-500 @enderror"
                                    value="{{ old('income', $father->income) }}" required>
                                @error('income')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone_father"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                                    Handphone</label>
                                <input type="tel" name="phone" id="phone_father"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('phone') border-red-500 @enderror"
                                    value="{{ old('phone', $father->phone) }}" required>
                                @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address_father"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                                <textarea name="address" id="address_father"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('address') border-red-500 @enderror"
                                    required>{{ old('address', $father->address) }}</textarea>
                                @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-600 text-white rounded-md shadow-sm hover:bg-amber-500 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- data ibu --}}
            <div x-data="{ open: false }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Data Ibu</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <form method="POST" action="{{ route('identity.updateMother') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik_mother"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                value="{{ $mother->nik }}" required>
                        </div>

                        <!-- Type -->
                        <div>
                            <input type="hidden" name="type" id="type_mother" value="{{ $mother->type }}"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Status -->
                            <div>
                                <label for="status_mother"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <input type="text" name="status" id="status_mother"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('status') border-red-500 @enderror"
                                    value="{{ old('status', $mother->status) }}" required>
                                @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="full_name_mother"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Lengkap</label>
                                <input type="text" name="full_name" id="full_name_mother"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('full_name') border-red-500 @enderror"
                                    value="{{ old('full_name', $mother->full_name) }}" required>
                                @error('full_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Last Education -->
                            <div>
                                <label for="last_education_mother"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pendidikan
                                    Terakhir</label>
                                <input type="text" name="last_education" id="last_education_mother"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('last_education') border-red-500 @enderror"
                                    value="{{ old('last_education', $mother->last_education) }}" required>
                                @error('last_education')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Job -->
                            <div>
                                <label for="job_mother"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pekerjaan</label>
                                <input type="text" name="job" id="job_mother"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('job') border-red-500 @enderror"
                                    value="{{ old('job', $mother->job) }}" required>
                                @error('job')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Position -->
                            <div>
                                <label for="position_mother"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Posisi</label>
                                <input type="text" name="position" id="position_mother"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('position') border-red-500 @enderror"
                                    value="{{ old('position', $mother->position) }}" required>
                                @error('position')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Income -->
                            <div>
                                <label for="income_mother"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penghasilan</label>
                                <input type="number" name="income" id="income_mother"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('income') border-red-500 @enderror"
                                    value="{{ old('income', $mother->income) }}" required>
                                @error('income')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone_mother"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                                    Handphone</label>
                                <input type="tel" name="phone" id="phone_mother"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('phone') border-red-500 @enderror"
                                    value="{{ old('phone', $mother->phone) }}" required>
                                @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address_mother"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                                <textarea name="address" id="address_mother"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('address') border-red-500 @enderror"
                                    required>{{ old('address', $mother->address) }}</textarea>
                                @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-600 text-white rounded-md shadow-sm hover:bg-amber-500 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- data wali --}}
            <div x-data="{ open: false }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Data Wali</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <form method="POST" action="{{ route('identity.updateGuardian') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik_guardian"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                value="{{ $guardian->nik }}" required>
                        </div>

                        <!-- Type -->
                        <div>
                            <input type="hidden" name="type" id="type_guardian" value="{{ $guardian->type }}"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Status -->
                            <div>
                                <label for="status_guardian"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <input type="text" name="status" id="status_guardian"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('status') border-red-500 @enderror"
                                    value="{{ old('status', $guardian->status) }}" required>
                                @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="full_name_guardian"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Lengkap</label>
                                <input type="text" name="full_name" id="full_name_guardian"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('full_name') border-red-500 @enderror"
                                    value="{{ old('full_name', $guardian->full_name) }}" required>
                                @error('full_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Last Education -->
                            <div>
                                <label for="last_education_guardian"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pendidikan
                                    Terakhir</label>
                                <input type="text" name="last_education" id="last_education_guardian"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('last_education') border-red-500 @enderror"
                                    value="{{ old('last_education', $guardian->last_education) }}" required>
                                @error('last_education')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Job -->
                            <div>
                                <label for="job_guardian"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pekerjaan</label>
                                <input type="text" name="job" id="job_guardian"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('job') border-red-500 @enderror"
                                    value="{{ old('job', $guardian->job) }}" required>
                                @error('job')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Position -->
                            <div>
                                <label for="position_guardian"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Posisi</label>
                                <input type="text" name="position" id="position_guardian"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('position') border-red-500 @enderror"
                                    value="{{ old('position', $guardian->position) }}" required>
                                @error('position')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Income -->
                            <div>
                                <label for="income_guardian"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penghasilan</label>
                                <input type="number" name="income" id="income_guardian"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('income') border-red-500 @enderror"
                                    value="{{ old('income', $guardian->income) }}" required>
                                @error('income')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone_guardian"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                                    Handphone</label>
                                <input type="tel" name="phone" id="phone_guardian"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('phone') border-red-500 @enderror"
                                    value="{{ old('phone', $guardian->phone) }}" required>
                                @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address_guardian"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                                <textarea name="address" id="address_guardian"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 @error('address') border-red-500 @enderror"
                                    required>{{ old('address', $guardian->address) }}</textarea>
                                @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-600 text-white rounded-md shadow-sm hover:bg-amber-500 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- berkas identitas diri--}}
            <div x-data="{ open: false }" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center py-2 px-4 text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-md focus:outline-none">
                    <span class="font-semibold">Berkas Identitas Diri</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-4">
                    <form method="POST" action="{{ route('identity.updatedoc') }}" class="space-y-6"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="nik" value="{{ $identity->nik }}">

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="flex justify-between items-center">
                                    <label for="file_kk"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Kartu Keluarga
                                    </label>
                                    @if($identity->kk_file)
                                    <a href="{{ Storage::url($identity->kk_file) }}" target="_blank"
                                        class="text-sm text-blue-600 hover:underline">
                                        Lihat File Tersimpan
                                    </a>
                                    @endif
                                </div>

                                <p class="text-xs text-gray-500 mb-2">File PDF, Maks 2MB</p>

                                <div class="relative border-2 border-dashed rounded-lg
                                            @error('kk_file') border-red-500 @else border-gray-300 @enderror
                                            dark:border-gray-600 p-4 text-center">
                                    <input type="file" name="kk_file" id="file_kk" accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" {{
                                        $identity->kk_file ? '' : 'required' }}
                                    onchange="updateFileName(this, 'file_kk_name')">

                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p id="file_kk_name" class="text-sm text-gray-600">
                                            {{ old('kk_file_name') ?? 'Pilih File PDF' }}
                                        </p>
                                    </div>
                                </div>

                                @error('kk_file')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- KTP -->
                            <div>
                                <div class="flex justify-between items-center">
                                    <label for="file_ktp"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Foto KTP
                                    </label>
                                    @if($identity->ktp_photo)
                                    <a href="{{ Storage::url($identity->ktp_photo) }}" target="_blank"
                                        class="text-sm text-blue-600 hover:underline">
                                        Lihat Foto Tersimpan
                                    </a>
                                    @endif
                                </div>

                                <p class="text-xs text-gray-500 mb-2">Foto PNG/JPG/WEBP, Maks 2MB</p>

                                <div class="relative border-2 border-dashed rounded-lg
                                            @error('ktp_photo') border-red-500 @else border-gray-300 @enderror
                                            dark:border-gray-600 p-4 text-center">
                                    <input type="file" name="ktp_photo" id="file_ktp"
                                        accept="image/png,image/jpeg,image/webp"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" {{
                                        $identity->ktp_photo ? '' : 'required' }}
                                    onchange="updateFileName(this, 'file_ktp_name')">

                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <p id="file_ktp_name" class="text-sm text-gray-600">
                                            {{ old('ktp_photo_name') ?? 'Pilih Foto KTP' }}
                                        </p>
                                    </div>
                                </div>

                                @error('ktp_photo')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Pas Foto -->
                            <div>
                                <div class="flex justify-between items-center">
                                    <label for="file_pas_foto"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Pas Foto
                                    </label>
                                    @if($identity->pass_photo)
                                    <a href="{{ Storage::url($identity->pass_photo) }}" target="_blank"
                                        class="text-sm text-blue-600 hover:underline">
                                        Lihat File Tersimpan
                                    </a>
                                    @endif
                                </div>

                                <p class="text-xs text-gray-500 mb-2">
                                    <em>Close-Up</em> dengan <em>Background</em> Merah/Biru, Maks 2MB
                                </p>

                                <div class="relative border-2 border-dashed rounded-lg
                                            @error('pass_photo') border-red-500 @else border-gray-300 @enderror
                                            dark:border-gray-600 p-4 text-center">
                                    <input type="file" name="pass_photo" id="file_pas_foto" accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" {{
                                        $identity->pass_photo ? '' : 'required' }}
                                    onchange="updateFileName(this, 'file_pas_foto_name')">

                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-10 h -10 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p id="file_pas_foto_name" class="text-sm text-gray-600">
                                            {{ old('pass_photo_name') ?? 'Pilih File PDF' }}
                                        </p>
                                    </div>
                                </div>

                                @error('pass_photo')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-600 text-white rounded-md shadow-sm hover:bg-amber-500 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                                Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <script>
        //----ALAMAT DOMISILI KTP----
        // Fetch Provinces on page load
        document.addEventListener('DOMContentLoaded', function () {
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const provinceSelect = document.getElementById('province_ktp');
                    console.log(provinceSelect);
                    data.forEach(province => {
                        let option = document.createElement('option');
                        option.value = province.id;
                        option.text = province.name;
                        provinceSelect.appendChild(option);
                    });
                });
        });

        // Fetch Cities based on selected Province
        document.getElementById('province_ktp').addEventListener('change', function () {
            const provinceId = this.value;
            if (provinceId) {
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                    .then(response => response.json())
                    .then(data => {
                        const citySelect = document.getElementById('regency_ktp');
                        citySelect.innerHTML = '<option value="">Pilih Kab/Kota</option>'; // Clear existing options
                        data.forEach(city => {
                            let option = document.createElement('option');
                            option.value = city.id;
                            option.text = city.name;
                            citySelect.appendChild(option);
                        });
                    });
            }
        });

        // Fetch Districts based on selected Regency
        document.getElementById('regency_ktp').addEventListener('change', function () {
            const regencyID = this.value;
            if (regencyID) {
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyID}.json`)
                    .then(response => response.json())
                    .then(data => {
                        const districtSelect = document.getElementById('district_ktp');
                        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>'; // Clear existing options
                        data.forEach(district => {
                            let option = document.createElement('option');
                            option.value = district.id;
                            option.text = district.name;
                            districtSelect.appendChild(option);
                        });
                    });
            }
        });

        document.getElementById('district_ktp').addEventListener('change', function () {
            const districtID = this.value;
            if (districtID) {
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtID}.json`)
                    .then(response => response.json())
                    .then(data => {
                        const villageSelect = document.getElementById('village_ktp');
                        villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>'; // Clear existing options
                        data.forEach(village => {
                            let option = document.createElement('option');
                            option.value = village.id;
                            option.text = village.name;
                            villageSelect.appendChild(option);
                        });
                    });
            }
        });
        //----ALAMAT DOMISILI KTP----

        //----ALAMAT DOMISILI SAAT INI----
        // Fetch Provinces on page load
        document.addEventListener('DOMContentLoaded', function () {
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const provinceSelect = document.getElementById('province_current');
                    console.log(provinceSelect);
                    data.forEach(province => {
                        let option = document.createElement('option');
                        option.value = province.id;
                        option.text = province.name;
                        provinceSelect.appendChild(option);
                    });
                });
        });

        // Fetch Cities based on selected Province
        document.getElementById('province_current').addEventListener('change', function () {
            const provinceId = this.value;
            if (provinceId) {
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                    .then(response => response.json())
                    .then(data => {
                        const citySelect = document.getElementById('regency_current');
                        citySelect.innerHTML = '<option value="">Pilih Kab/Kota</option>'; // Clear existing options
                        data.forEach(city => {
                            let option = document.createElement('option');
                            option.value = city.id;
                            option.text = city.name;
                            citySelect.appendChild(option);
                        });
                    });
            }
        });

        // Fetch Districts based on selected Regency
        document.getElementById('regency_current').addEventListener('change', function () {
            const regencyID = this.value;
            if (regencyID) {
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyID}.json`)
                    .then(response => response.json())
                    .then(data => {
                        const districtSelect = document.getElementById('district_current');
                        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>'; // Clear existing options
                        data.forEach(district => {
                            let option = document.createElement('option');
                            option.value = district.id;
                            option.text = district.name;
                            districtSelect.appendChild(option);
                        });
                    });
            }
        });

        document.getElementById('district_current').addEventListener('change', function () {
            const districtID = this.value;
            if (districtID) {
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtID}.json`)
                    .then(response => response.json())
                    .then(data => {
                        const villageSelect = document.getElementById('village_current');
                        villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>'; // Clear existing options
                        data.forEach(village => {
                            let option = document.createElement('option');
                            option.value = village.id;
                            option.text = village.name;
                            villageSelect.appendChild(option);
                        });
                    });
            }
        });
        //----ALAMAT DOMISILI SAAT INI----

        document.getElementById("file_kk").addEventListener("change", function () {
            const fileName = this.files[0]?.name || "Tidak ada file yang dipilih";
            document.getElementById("file_kk_name").textContent = fileName;
        });

        document.getElementById("file_ktp").addEventListener("change", function () {
            const fileName = this.files[0]?.name || "Tidak ada file yang dipilih";
            document.getElementById("file_ktp_name").textContent = fileName;
        });

        document.getElementById("file_pas_foto").addEventListener("change", function () {
            const fileName = this.files[0]?.name || "Tidak ada file yang dipilih";
            document.getElementById("file_pas_foto_name").textContent = fileName;
        });
    </script>
</x-app-layout>