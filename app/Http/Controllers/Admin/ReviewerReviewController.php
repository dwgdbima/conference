<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\Review_paper;
use App\Models\Reviewer;
use App\Models\User;
use App\Notifications\FinalDecision;
use App\Notifications\SendPaperToReviewer;
use App\View\Components\Decision;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ReviewerReviewController extends BaseController
{
    public function __construct()
    {
        $this->addMenuData('Admin Review', '#');
    }

    public function indexManageReview(Request $request)
    {
        $this->addMenuData('Unreview Papers', route('admin.admin-review.unreviews.index'));

        $reviewers = Reviewer::all();
        if ($request->ajax()) {
            $papers = Paper::with(['submission.topic', 'submission.participant'])->where('first_decision', 1)->whereDoesntHave('reviewPaper');
            return DataTables::eloquent($papers)
                ->editColumn('id', 'FP-{{$id}}')
                ->editColumn('submission_id', function ($paper) {
                    return '<a href="' . route('admin.submissions.show', $paper->submission_id) . '">SUBM-' . $paper->submission_id . '</a>';
                })
                ->addColumn('file', function ($paper) {
                    if (is_null($paper->file_first_revise)) {
                        $html = '<a href="' . route('download', $paper->file) . '"><span class="badge badge-primary">download</span></a>';
                    } else {
                        $html = '<a href="' . route('download', $paper->file_first_revise) . '"><span class="badge badge-primary">download</span></a>';
                    }

                    return $html;
                })
                ->addColumn('action', function ($paper) {
                    return '<a href="#" class="btn btn-xs btn-primary" data-role="manage-review" data-id="' . $paper->id . '"><i class="fas fa-edit"></i> Manage</a>';
                })
                ->rawColumns(['submission_id', 'file', 'action'])
                ->make(true);
        }
        return view('web.admin.reviewer-reviews.manage-reviews.index')->with(['reviewers' => $reviewers]);
    }

    public function storeManageReview(Request $request)
    {
        $review_paper = new Review_paper;
        $review_paper->paper_id = $request->paper_id;
        $review_paper->reviewer_id = $request->reviewer_id;
        $review_paper->save();

        $reviewer = Reviewer::find($request->reviewer_id);
        $paper = Paper::find($request->paper_id);

        $file = !is_null($paper->file_first_revise) ? $paper->file_first_revise : $paper->file;

        $notificationData = [
            'name' => $reviewer->name,
            'presenter' => $paper->submission->presenter,
            'title' =>  $paper->submission->title,
            'topic' => $paper->submission->topic->name,
            'subm_id' => $paper->submission_id,
            'file' => '<a href="' . route('download', $file) . '">download</a>'
        ];

        $reviewer->user->notify(new SendPaperToReviewer($notificationData));

        return redirect()->back()->with('toast_success', 'Paper has been sent to reviewer!');
    }

    public function indexReviewResult(Request $request)
    {
        $this->addMenuData('Review Result', route('admin.admin-review.review-results.index'));

        $reviewers = Reviewer::all();
        if ($request->ajax()) {
            $papers = Paper::with('submission.topic', 'submission.participant', 'reviewPaper.reviewer')->whereHas('reviewPaper');

            return DataTables::eloquent($papers)
                ->editColumn('id', 'FP-{{$id}}')
                ->editColumn('submission_id', function ($paper) {
                    return '<a href="' . route('admin.submissions.show', $paper->submission_id) . '">SUBM-' . $paper->submission_id . '</a>';
                })
                ->editColumn('recomendation', function ($paper) {
                    $decision = new Decision($paper->recomendation);
                    return $decision->render();
                })
                ->editColumn('file_second_revise', function ($paper) {
                    if (is_null($paper->file_second_revise)) {
                        $html = '<span class="text-secondary font-italic">No File</span>';
                    } else {
                        $html = '<a href="' . route('download', $paper->file_second_revise) . '"><span class="badge badge-primary">download</span></a>';
                    }

                    return $html;
                })
                ->editColumn('final_decision', function ($paper) {
                    $decision = new Decision($paper->final_decision);
                    return $decision->render();
                })
                ->addColumn('file', function ($paper) {
                    if (is_null($paper->file_first_revise)) {
                        $html = '<a href="' . route('download', $paper->file) . '"><span class="badge badge-primary">download</span></a>';
                    } else {
                        $html = '<a href="' . route('download', $paper->file_first_revise) . '"><span class="badge badge-primary">download</span></a>';
                    }

                    return $html;
                })
                ->addColumn('action', function ($paper) {
                    return '
                    <a href="' . route('admin.reviewer-reviews.review-results.show', $paper->id) . '" class="btn btn-xs btn-info"><i class="fas fa-search"></i> Show</a>
                    <a href="#" class="btn btn-xs btn-info" data-role="edit" data-id="' . $paper->id . '" data-reviewer-id="' . $paper->reviewPaper->reviewer->id . '" data-reviewer-name="' . $paper->reviewPaper->reviewer->name . '"><i class="fas fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-xs btn-primary" data-role="decision" data-id="' . $paper->id . '"><i class="fas fa-paper-plane"></i> Decision</a>
                    ';
                })
                ->rawColumns(['submission_id', 'file', 'recomendation', 'file_second_revise', 'final_decision', 'action'])
                ->make(true);
        }
        return view('web.admin.reviewer-reviews.review-results.index')->with(['reviewers' => $reviewers]);
    }

    public function showReviewResult($id)
    {
        $this->addMenuData('Review Result', route('admin.admin-review.review-results.index'));
        $this->addMenuData('Detail FP-' . $id, route('admin.reviewer-reviews.review-results.show', $id));
        $paper = Paper::with('submission.topic', 'submission.participant', 'reviewPaper.reviewer')->find($id);
        return view('web.admin.reviewer-reviews.review-results.show')->with(['paper' => $paper]);
    }

    public function storeReviewResult(Request $request)
    {
        $paper = Paper::find($request->id);
        $paper->final_decision = $request->final_decision;
        $paper->save();

        $user = User::find($paper->submission->participant->user_id);

        $notificationData = [
            'name' => $paper->submission->participant->salutation . ' ' . Str::title($paper->submission->participant->first_name) . ' ' . Str::title($paper->submission->participant->last_name),
            'subm_id' => $paper->submission_id,
            'decision' => $request->final_decision
        ];

        $user->notify(new FinalDecision($notificationData));
        return response()->json(['success' => true]);
    }

    public function updateReviewResult(Request $request, $id)
    {
        $review_paper = Review_paper::find($id);

        $review_paper->reviewer_id = $request->reviewer_id;
        $review_paper->save();

        return redirect()->back()->with('toast_success', 'Edit reviewer review paper successful!');
    }
}
