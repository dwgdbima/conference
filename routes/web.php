<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\ActivatedController;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ActiveUserController;
use App\Http\Controllers\Admin\NewUserController;
// Participant
use App\Http\Controllers\Participant\DashboardController as ParticipantDashboard;
use App\Http\Controllers\Participant\ProfileController as ParticipantProfile;
use App\Http\Controllers\Participant\SubmissionSummaryController as ParticipantSubmissionSummary;

// Reviewer
use App\Http\Controllers\Reviewer\DashboardController as ReviewerDashboard;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('web.participant.layout.main');
});

Route::get('home', function (Request $request) {
    return 'home';
});

Auth::routes(['verify' => true]);

// ADMIN
Route::prefix('admin/')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('dashboard', [AdminDashboard::class, 'index'])->name('dashboard.index');
    Route::resource('active-users', ActiveUserController::class)->except([
        'create', 'store'
    ]);
    Route::put('active-users/generate-password/{id}', [ActiveUserController::class, 'generateNewPassword'])->name('active-users.generate-new-password');
    Route::resource('new-users', NewUserController::class)->except([
        'create', 'store', 'show', 'edit'
    ]);

    // ADMIN TESTING
    Route::get('test', function () {
    });
});

// Participant
Route::prefix('participant/')->name('participant.')->middleware(['participant', 'verified', 'activated'])->group(function () {
    Route::get('activated', [ActivatedController::class, 'index'])->name('activated');
    Route::get('dashboard', [ParticipantDashboard::class, 'index'])->name('dashboard.index');
    Route::get('profile', [ParticipantProfile::class, 'index'])->name('profile.index');
    Route::get('submission-summary', [ParticipantSubmissionSummary::class, 'index'])->name('submission-summary.index');

    // PARTICIPANT TESTING
    Route::get('test', function () {
        // 
    });
});

// Reviewer
Route::prefix('reviewer/')->name('reviewer.')->middleware(['reviewer'])->group(function () {
    Route::get('dashboard', [ReviewerDashboard::class, 'index'])->name('index');
});

Route::get('test', function () {
    $user = User::find(26);
    return $user->hasVerifiedEmail() ? 'true' : 'false';
});
