<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Http\Requests\AbstractRequest;
use App\Http\Requests\PaperRequest;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\SubmissionRequest;
use App\Models\Abstractt;
use App\Models\Paper;
use App\Models\Submission;
use App\Models\User;
use App\Notifications\SubmitPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isNull;

class SubmissionController extends Controller
{
    public function __construct()
    {
        // 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submissions = Submission::where('participant_id', Auth()->user()->participant->id)->get();
        return view('web.participant.submission.index')->with([
            'submissions' => $submissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.participant.submission.create')->with([]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubmissionRequest $request)
    {
        $request->validated();

        Auth()->user()->participant->submissions()->create($request->all());

        return redirect()->route('participant.submissions.index')->with('toast_success', 'Add New Submission Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submission = Submission::find($id);
        return view('web.participant.submission.edit')->with([
            'submission' => $submission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubmissionRequest $request, $id)
    {
        $request->validated();

        $submission = Submission::find($id);
        $submission->update($request->all());

        return redirect()->route('participant.submissions.index')->with('toast_success', 'Update Submission Successful!');
    }

    public function storePayment(PaymentRequest $request, $id)
    {
        $request->validated();

        $path = $request->file('payment_file')->store(
            'user/' . Auth()->user()->participant->id . '/submission-' . $id . '/payment'
        );

        $submission = Submission::find($id);
        if (!is_null($submission->payment_file)) {
            Storage::delete($submission->payment_file);
        }

        $submission->payment_file = $path;
        $submission->payment = 1;
        $submission->save();

        return redirect()->route('participant.submissions.index')->with('toast_success', 'Add Payment Successful!');
    }

    public function storeAbstract(AbstractRequest $request, $id)
    {
        $request->validated();

        $path = $request->file('abstract_file')->store(
            'user/' . Auth()->user()->participant->id . '/submission-' . $id . '/abstract'
        );

        $submission = Submission::find($id);

        if (is_null($submission->abstract)) {
            $submission->abstract()->create(['file' => $path]);
        } else {
            if (Storage::exists($submission->abstract->file)) {
                Storage::delete($submission->abstract->file);
            }
            $submission->abstract()->update(['file' => $path]);
        }

        return redirect()->route('participant.submissions.index')->with('toast_success', 'Add Abstract Successful!');
    }

    public function storePaper(PaperRequest $request, $id)
    {
        $request->validated();

        $path = $request->file('paper_file')->store(
            'user/' . Auth()->user()->participant->id . '/submission-' . $id . '/paper'
        );

        $submission = Submission::find($id);

        if (is_null($submission->paper)) {
            $submission->paper()->create([
                'file' => $path,
                'file_first_revise_status' => 1
            ]);
        } else {
            if (Storage::exists($submission->paper->file)) {
                Storage::delete($submission->paper->file);
            }
            $submission->paper()->update([
                'file' => $path,
            ]);
        }

        $user = User::find(Auth::user()->id);

        $notificationData = [
            'name' => $user->participant->salutation . ' ' . Str::title($user->participant->first_name) . ' ' . Str::title($user->participant->last_name),
            'action' => 1,
        ];

        $user->notify(new SubmitPaper($notificationData));

        return redirect()->route('participant.submissions.index')->with('toast_success', 'Add Paper Successful!');
    }

    public function storeFirstRevisePaper(PaperRequest $request, $id)
    {
        $request->validated();

        $path = $request->file('paper_file')->store(
            'user/' . Auth()->user()->participant->id . '/submission-' . $id . '/paper'
        );

        $submission = Submission::find($id);

        if (Storage::exists($submission->paper->file_first_revise)) {
            Storage::delete($submission->paper->file_first_revise);
        }
        $submission->paper()->update([
            'file_first_revise' => $path,
            'file_first_revise_status' => 1
        ]);

        $user = User::find(Auth::user()->id);

        $notificationData = [
            'name' => $user->participant->salutation . ' ' . Str::title($user->participant->first_name) . ' ' . Str::title($user->participant->last_name),
            'action' => 1,
        ];

        $user->notify(new SubmitPaper($notificationData));

        return redirect()->route('participant.submissions.index')->with('toast_success', 'Add Revised Paper Successful!');
    }

    public function storeSecondRevisePaper(PaperRequest $request, $id)
    {
        $request->validated();

        $path = $request->file('paper_file')->store(
            'user/' . Auth()->user()->participant->id . '/submission-' . $id . '/paper'
        );

        $submission = Submission::find($id);

        if (Storage::exists($submission->paper->file_second_revise)) {
            Storage::delete($submission->paper->file_second_revise);
        }
        $submission->paper()->update([
            'file_second_revise' => $path,
            'file_second_revise_status' => 1
        ]);

        $user = User::find(Auth::user()->id);

        $notificationData = [
            'name' => $user->participant->salutation . ' ' . Str::title($user->participant->first_name) . ' ' . Str::title($user->participant->last_name),
            'action' => 1,
        ];

        $user->notify(new SubmitPaper($notificationData));

        return redirect()->route('participant.submissions.index')->with('toast_success', 'Add Revised Paper Successful!');
    }

    public function storeFinalPaper(PaperRequest $request, $id)
    {
        $request->validated();

        $path = $request->file('paper_file')->store(
            'user/' . Auth()->user()->participant->id . '/submission-' . $id . '/paper'
        );

        $submission = Submission::find($id);

        if (Storage::exists($submission->paper->file_final)) {
            Storage::delete($submission->paper->file_final);
        }
        $submission->paper()->update([
            'file_final' => $path
        ]);

        $user = User::find(Auth::user()->id);

        $notificationData = [
            'name' => $user->participant->salutation . ' ' . Str::title($user->participant->first_name) . ' ' . Str::title($user->participant->last_name),
            'action' => 1,
        ];

        $user->notify(new SubmitPaper($notificationData));

        return redirect()->route('participant.submissions.index')->with('toast_success', 'Add Final Paper Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
