<?php

use App\Models\Address;
use App\Models\LastEdu;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\LastEduController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ListScholarshipController;

Route::get('/', function () {
    return view('guest');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/scholarships/{scholarship}', function (Scholarship $scholarship) {
    return response()->json($scholarship);
});

Route::resource('list-scholarships', ListScholarshipController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['user'])->group(function () {
        Route::resource('identity', IdentityController::class)->only(['index']);
        Route::patch('/identity', [IdentityController::class, 'update'])->name('identity.update');
        Route::patch('/identitydoc', [IdentityController::class, 'updateIdentityDoc'])->name('identity.updatedoc');
        Route::patch('/ktpdomicile', [AddressController::class, 'updateKtpDomicile'])->name('identity.updateKtpDomicile');
        Route::patch('/currentdomicile', [AddressController::class, 'updateCurrentDomicile'])->name('identity.updateCurrentDomicile');
        Route::patch('/father', [FamilyController::class, 'updateFather'])->name('identity.updateFather');
        Route::patch('/mother', [FamilyController::class, 'updateMother'])->name('identity.updateMother');
        Route::patch('/guardian', [FamilyController::class, 'updateGuardian'])->name('identity.updateGuardian');

        Route::resource('lastedu', LastEduController::class)->only(['index']);
        Route::patch('/lastedu', [LastEduController::class, 'update'])->name('lastedu.update');
        Route::patch('/transcriptfile', [LastEduController::class, 'updateTranscript'])->name('lastedu.updateTranscript');

        Route::resource('achievements', AchievementController::class)->except(['edit', 'update']);
        Route::resource('applications', ApplicationController::class)->only(['index', 'create', 'store', 'show']);
    });

    Route::middleware(['admin'])->group(function () {
        Route::resource('approvals', ApprovalController::class)->only(['index', 'show', 'update']);
    });
});

require __DIR__.'/auth.php';
