<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
// Participant
use App\Http\Controllers\Participant\DashboardController as ParticipantDashboard;
use App\Http\Controllers\Participant\ProfileController as ParticipantProfile;
use App\Http\Controllers\Participant\SubmissionSummaryController as ParticipantSubmissionSummary;
// Reviewer
use App\Http\Controllers\Reviewer\DashboardController as ReviewerDashboard;
use Illuminate\Support\Facades\Storage;

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

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin/')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('dashboard', [AdminDashboard::class, 'index'])->name('dashboard.index');
});

Route::prefix('participant/')->name('participant.')->middleware(['participant', 'verified'])->group(function () {
    Route::get('dashboard', [ParticipantDashboard::class, 'index'])->name('dashboard.index');
    Route::get('profile', [ParticipantProfile::class, 'index'])->name('profile.index');
    Route::get('submission-summary', [ParticipantSubmissionSummary::class, 'index'])->name('submission-summary.index');
});

Route::prefix('reviewer/')->name('reviewer.')->middleware(['reviewer'])->group(function () {
    Route::get('dashboard', [ReviewerDashboard::class, 'index'])->name('index');
});
