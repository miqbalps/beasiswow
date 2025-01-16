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
                    <form method="POST" action="" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-2 gap-4">
                            <!-- NIK -->
                            <div>
                                <label for="nik"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Induk
                                    Kependudukan</label>
                                <input type="text" name="nik" id="nik"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Name -->
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Lengkap</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- NKK -->
                            <div>
                                <label for="nkk"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Kartu
                                    Keluarga</label>
                                <input type="text" name="nkk" id="nkk"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Birth Place -->
                            <div>
                                <label for="birth_place"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tempat
                                    Lahir</label>
                                <input type="text" name="birth_place" id="birth_place"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Birth Date -->
                            <div>
                                <label for="birth_date"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                    Lahir</label>
                                <input type="date" name="birth_date" id="birth_date"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="gender"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis
                                    Kelamin</label>
                                <select name="gender" id="gender"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600">
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>

                            <!-- Married -->
                            <div>
                                <label for="married"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status
                                    Menikah</label>
                                <select name="married" id="married"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600">
                                    <option value="yes">Menikah</option>
                                    <option value="no">Belum Menikah</option>
                                </select>
                            </div>

                            <!-- Religion -->
                            <div>
                                <label for="religion"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Agama</label>
                                <input type="text" name="religion" id="religion"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                                    Handphone</label>
                                <input type="text" name="phone" id="phone"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Child Number -->
                            <div>
                                <label for="child_number"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Anak Ke</label>
                                <input type="number" name="child_number" id="child_number"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Origin -->
                            <div>
                                <label for="origin"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dari</label>
                                <input type="text" name="origin" id="origin"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Income -->
                            <div>
                                <label for="income"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penghasilan</label>
                                <input type="number" name="income" id="income"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>
                        </div>

                        <div class="col-span-2 flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-500 text-white rounded-md shadow-sm hover:bg-amber-600 focus:ring-2 focus:ring-amber-500 focus:outline-none">
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
                    <form method="POST" action="" class="space-y-6">
                        @csrf

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <!-- Type -->
                        <div>
                            <input type="hidden" name="type" id="type" value="ktp_domicile"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Street -->
                            <div>
                                <label for="street_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Street</label>
                                <input type="text" name="street" id="street_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- RT -->
                            <div>
                                <label for="rt_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">RT</label>
                                <input type="number" min="1" name="rt" id="rt_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- RW -->
                            <div>
                                <label for="rw_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">RW</label>
                                <input type="number" min="1" name="rw" id="rw_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Postal Code -->
                            <div>
                                <label for="postal_code_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode Pos</label>
                                <input type="text" name="postal_code" id="postal_code_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Village -->
                            <div>
                                <label for="village_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Desa/Kelurahan</label>
                                <select name="village" id="village_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="">Pilih Desa/Kelurahan</option>
                                </select>
                            </div>

                            <!-- District -->
                            <div>
                                <label for="district_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kecamatan</label>
                                <select name="district" id="district_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>

                            <!-- Regency -->
                            <div>
                                <label for="regency_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kabupaten/Kota</label>
                                <select name="regency" id="regency_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="">Pilih Kab/Kota</option>
                                </select>
                            </div>

                            <!-- Province -->
                            <div>
                                <label for="province_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Provinsi</label>
                                <select name="province" id="province_ktp"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>

                            <div class="col-span-2 flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-amber-500 text-white rounded-md shadow-sm hover:bg-amber-600 focus:ring-2 focus:ring-amber-500 focus:outline-none">
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
                    <form method="POST" action="" class="space-y-6">
                        @csrf

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <!-- Type -->
                        <div>
                            <input type="hidden" name="type" id="type" value="current_domicile"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Street -->
                            <div>
                                <label for="street_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Street</label>
                                <input type="text" name="street" id="street_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- RT -->
                            <div>
                                <label for="rt_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">RT</label>
                                <input type="number" min="1" name="rt" id="rt_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- RW -->
                            <div>
                                <label for="rw_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">RW</label>
                                <input type="number" min="1" name="rw" id="rw_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Postal Code -->
                            <div>
                                <label for="postal_code_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode Pos</label>
                                <input type="text" name="postal_code" id="postal_code_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Village -->
                            <div>
                                <label for="village_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Desa/Kelurahan</label>
                                <select name="village" id="village_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="">Pilih Desa/Kelurahan</option>
                                </select>
                            </div>

                            <!-- District -->
                            <div>
                                <label for="district_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kecamatan</label>
                                <select name="district" id="district_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>

                            <!-- Regency -->
                            <div>
                                <label for="regency_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kabupaten/Kota</label>
                                <select name="regency" id="regency_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="">Pilih Kab/Kota</option>
                                </select>
                            </div>

                            <!-- Province -->
                            <div>
                                <label for="province_current"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Provinsi</label>
                                <select name="province" id="province_current"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>

                            <div class="col-span-2 flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-amber-500 text-white rounded-md shadow-sm hover:bg-amber-600 focus:ring-2 focus:ring-amber-500 focus:outline-none">
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
                    <form method="POST" action="" class="space-y-6">
                        @csrf

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <!-- Type -->
                        <div>
                            <input type="hidden" name="type" id="type" value="father"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Status -->
                            <div>
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <input type="text" name="status" id="status"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="full_name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Lengkap</label>
                                <input type="text" name="full_name" id="full_name"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Last Education -->
                            <div>
                                <label for="last_education"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pendidikan
                                    Terakhir</label>
                                <input type="text" name="last_education" id="last_education"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Job -->
                            <div>
                                <label for="job"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pekerjaan</label>
                                <input type="text" name="job" id="job"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Position -->
                            <div>
                                <label for="position"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Posisi</label>
                                <input type="text" name="position" id="position"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Income -->
                            <div>
                                <label for="income"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penghasilan</label>
                                <input type="number" name="income" id="income"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                                    Handphone</label>
                                <input type="tel" name="phone" id="phone"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                                <textarea name="address" id="address"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-500 text-white rounded-md shadow-sm hover:bg-amber-600 focus:ring-2 focus:ring-amber-500 focus:outline-none">
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
                    <form method="POST" action="" class="space-y-6">
                        @csrf

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <!-- Type -->
                        <div>
                            <input type="hidden" name="type" id="type" value="mother"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Status -->
                            <div>
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <input type="text" name="status" id="status"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="full_name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Lengkap</label>
                                <input type="text" name="full_name" id="full_name"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Last Education -->
                            <div>
                                <label for="last_education"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pendidikan
                                    Terakhir</label>
                                <input type="text" name="last_education" id="last_education"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Job -->
                            <div>
                                <label for="job"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pekerjaan</label>
                                <input type="text" name="job" id="job"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Position -->
                            <div>
                                <label for="position"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Posisi</label>
                                <input type="text" name="position" id="position"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Income -->
                            <div>
                                <label for="income"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penghasilan</label>
                                <input type="number" name="income" id="income"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                                    Handphone</label>
                                <input type="tel" name="phone" id="phone"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                                <textarea name="address" id="address"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-500 text-white rounded-md shadow-sm hover:bg-amber-600 focus:ring-2 focus:ring-amber-500 focus:outline-none">
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
                    <form method="POST" action="" class="space-y-6">
                        @csrf

                        <!-- NIK -->
                        <div>
                            <input type="hidden" name="nik" id="nik"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <!-- Type -->
                        <div>
                            <input type="hidden" name="type" id="type" value="guardian"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Status -->
                            <div>
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <input type="text" name="status" id="status"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="full_name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Lengkap</label>
                                <input type="text" name="full_name" id="full_name"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Last Education -->
                            <div>
                                <label for="last_education"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pendidikan
                                    Terakhir</label>
                                <input type="text" name="last_education" id="last_education"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Job -->
                            <div>
                                <label for="job"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pekerjaan</label>
                                <input type="text" name="job" id="job"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Position -->
                            <div>
                                <label for="position"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Posisi</label>
                                <input type="text" name="position" id="position"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Income -->
                            <div>
                                <label for="income"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penghasilan</label>
                                <input type="number" name="income" id="income"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                                    Handphone</label>
                                <input type="tel" name="phone" id="phone"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required>
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                                <textarea name="address" id="address"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-500 text-white rounded-md shadow-sm hover:bg-amber-600 focus:ring-2 focus:ring-amber-500 focus:outline-none">
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
                    <form method="POST" action="" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="file_kk"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kartu
                                    Keluarga</label>
                                <p class="text-sm">File dengan format .PDF. Maksimal 2MB</p>
                                <div class="flex gap-3 mt-1 w-full border border-gray-300 rounded-md">
                                    <label
                                        class="flex items-center justify-between px-3 py-2 text-sm text-gray-700 bg-gray-100 dark:bg-gray-800 dark:text-gray-300 border-e border-gray-300 dark:border-gray-700 rounded-s-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 w-2/6">
                                        <span>Pilih File</span>
                                        <input type="file" name="file_kk" id="file_kk" class="hidden" required>
                                    </label>
                                    <p id="file_kk_name" class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                        Tidak ada file yang dipilih
                                    </p>
                                </div>
                            </div>

                            <!-- Foto KTP -->
                            <div>
                                <label for="file_ktp"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">KTP</label>
                                <p class="text-sm">Ambil/Unggah Foto KTP format .PNG, .JPG, .WEBP. Maksimal 2MB</p>
                                <div class="flex gap-3 mt-1 w-full border border-gray-300 rounded-md">
                                    <label
                                        class="flex items-center justify-between px-3 py-2 text-sm text-gray-700 bg-gray-100 dark:bg-gray-800 dark:text-gray-300 border-e border-gray-300 dark:border-gray-700 rounded-s-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 w-2/6">
                                        <span>Pilih File</span>
                                        <input type="file" accept="image" name="file_ktp" id="file_ktp" class="hidden"
                                            required>
                                    </label>
                                    <p id="file_ktp_name" class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                        Tidak ada file yang dipilih
                                    </p>
                                </div>
                            </div>

                            <!-- Pas Foto -->
                            <div>
                                <label for="file_pas_foto"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pas Foto</label>
                                <p class="text-sm"><em>Close-Up</em> dengan <em>Background</em> Merah/Biru</p>
                                <p class="text-sm">File dengan format .PDF. Maksimal 2MB</p>
                                <div class="flex gap-3 mt-1 w-full border border-gray-300 rounded-md">
                                    <label
                                        class="flex items-center justify-between px-3 py-2 text-sm text-gray-700 bg-gray-100 dark:bg-gray-800 dark:text-gray-300 border-e border-gray-300 dark:border-gray-700 rounded-s-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 w-2/6">
                                        <span>Pilih File</span>
                                        <input type="file" name="file_pas_foto" id="file_pas_foto" class="hidden"
                                            required>
                                    </label>
                                    <p id="file_pas_foto_name" class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                        Tidak ada file yang dipilih
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-amber-500 text-white rounded-md shadow-sm hover:bg-amber-600 focus:ring-2 focus:ring-amber-500 focus:outline-none">
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