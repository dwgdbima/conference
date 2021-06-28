<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ActivatedController;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ActiveUserController;
use App\Http\Controllers\Admin\NewUserController;
use App\Http\Controllers\Admin\SubmissionController as AdminSubmission;
use App\Http\Controllers\Admin\AbstractController as AdminAbstract;
use App\Http\Controllers\Admin\PaperController as AdminPaper;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\ReviewerReviewController;
use App\Http\Controllers\Admin\FinalPaperController as AdminFinalPaper;
use App\Http\Controllers\Admin\ReviewerController;
// Participant
use App\Http\Controllers\Participant\DashboardController as ParticipantDashboard;
use App\Http\Controllers\Participant\ProfileController as ParticipantProfile;
use App\Http\Controllers\Participant\SubmissionController as ParticipantSubmission;

// Reviewer
use App\Http\Controllers\Reviewer\DashboardController as ReviewerDashboard;
use App\Models\Abstractt;
use App\Models\Paper;
use App\Models\Participant;
use App\Models\Submission;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



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
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

// ADMIN
Route::prefix('admin/')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('dashboard', [AdminDashboard::class, 'index'])->name('dashboard.index');

    // User
    Route::resource('active-users', ActiveUserController::class)->except([
        'create', 'store'
    ]);
    Route::put('active-users/generate-password/{id}', [ActiveUserController::class, 'generateNewPassword'])->name('active-users.generate-new-password');
    Route::resource('new-users', NewUserController::class)->except([
        'create', 'store', 'show', 'edit'
    ]);

    // Reviewer
    Route::resource('reviewers', ReviewerController::class)->except([
        'create', 'show'
    ]);

    // Submissions
    Route::resource('submissions', AdminSubmission::class)->except([
        'create', 'store', 'edit'
    ]);

    // Abstracts
    Route::resource('abstracts', AdminAbstract::class)->except([
        'create', 'store'
    ]);

    // Papers
    Route::resource('papers', AdminPaper::class)->except([
        'create', 'store', 'edit', 'update'
    ]);

    // Admin Review
    Route::prefix('admin-review')->name('admin-review.')->group(function () {
        // Unreview Papers
        Route::get('/unreviews', [AdminReviewController::class, 'indexUnreview'])->name('unreviews.index');
        Route::get('/unreviews/{paper}/review', [AdminReviewController::class, 'reviewUnreview'])->name('unreviews.review');
        Route::post('/unreviews/{paper}/review', [AdminReviewController::class, 'submitUnreview'])->name('unreviews.submit');
        // Review Result
        Route::get('/review-results', [AdminReviewController::class, 'indexReviewResult'])->name('review-results.index');
        Route::get('/review-results/{paper}', [AdminReviewController::class, 'showReviewResult'])->name('review-results.show');
        Route::get('/review-results/{paper}/review', [AdminReviewController::class, 'reviewReviewResult'])->name('review-results.review');
        Route::post('/review-results/{paper}/review', [AdminReviewController::class, 'submitReviewResult'])->name('review-results.submit');
        Route::get('/review-results/{paper}/edit', [AdminReviewController::class, 'editReviewResult'])->name('review-results.edit');
        Route::put('/review-results/{paper}', [AdminReviewController::class, 'updateReviewResult'])->name('review-results.update');
    });

    // Reviewer Review
    Route::prefix('reviewer-reviews')->name('reviewer-reviews.')->group(function () {
        // Manage Review
        Route::get('/manage-reviews', [ReviewerReviewController::class, 'indexManageReview'])->name('manage-reviews.index');
        Route::post('/manage-reviews', [ReviewerReviewController::class, 'storeManageReview'])->name('manage-reviews.store');
        // Review Result
        Route::get('/review-results', [ReviewerReviewController::class, 'indexReviewResult'])->name('review-results.index');
        Route::post('/review-results', [ReviewerReviewController::class, 'storeReviewResult'])->name('review-results.store');
        Route::put('/review-results/{id}', [ReviewerReviewController::class, 'updateReviewResult'])->name('review-results.update');
        Route::get('/review-results/{id}', [ReviewerReviewController::class, 'showReviewResult'])->name('review-results.show');
    });

    // Final Paper
    Route::get('/final-papers', [AdminFinalPaper::class, 'index'])->name('final-papers.index');

    // ADMIN TESTING
    Route::get('test', function () {
    });
});

// Participant
Route::prefix('participant/')->name('participant.')->middleware(['auth', 'participant', 'verified', 'activated'])->group(function () {
    Route::get('activated', [ActivatedController::class, 'index'])->name('activated');
    Route::get('dashboard', [ParticipantDashboard::class, 'index'])->name('dashboard.index');
    Route::resource('profile', ParticipantProfile::class)->except([
        'create', 'store', 'show', 'edit'
    ]);
    Route::resource('submissions', ParticipantSubmission::class);
    Route::post('submissions/{submission}/payment', [ParticipantSubmission::class, 'storePayment'])->name('submissions.payment');
    Route::post('submissions/{submission}/abstract', [ParticipantSubmission::class, 'storeAbstract'])->name('submissions.abstract');
    Route::post('submissions/{submission}/paper', [ParticipantSubmission::class, 'storePaper'])->name('submissions.paper');
    Route::post('submissions/{submission}/first-revise-paper', [ParticipantSubmission::class, 'storeFirstRevisePaper'])->name('submissions.first-revise-paper');
    Route::post('submissions/{submission}/second-revise-paper', [ParticipantSubmission::class, 'storeSecondRevisePaper'])->name('submissions.second-revise-paper');
    Route::post('submissions/{submission}/final-paper', [ParticipantSubmission::class, 'storeFinalPaper'])->name('submissions.final-paper');

    // PARTICIPANT TESTING
    Route::get('test', function () {
        // 
    });
});

// Reviewer
Route::prefix('reviewer/')->name('reviewer.')->middleware(['reviewer'])->group(function () {
    Route::get('dashboard', [ReviewerDashboard::class, 'index'])->name('index');
});

Route::get('force-logout', function () {
    Auth::logout();
    return redirect()->route('login');
});

Route::get('show/{path}', function ($path) {
    $file = Storage::get($path);
    $type = Str::afterLast($path, '.');

    $response = Response::make($file, 200);
    $response->header("Content-type", $type);

    return $response;
})->where('path', '.*')->name('show')->middleware('auth', 'verified', 'activated');

Route::get('download/{path}', function ($path) {
    $name = Str::replace('/', '-', $path);
    $new_name = 'user-' . $name;
    return Storage::download($path, $new_name);
})->where('path', '.*')->name('download')->middleware('auth', 'verified', 'activated');

Route::get('test', function () {
    $test = Participant::find(1);
});
