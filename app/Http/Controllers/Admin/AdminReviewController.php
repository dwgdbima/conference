<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Paper;
use App\Models\User;
use App\Notifications\ReviewPaper;
use App\View\Components\Decision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class AdminReviewController extends BaseController
{
    public function __construct()
    {
        $this->addMenuData('Admin Review', '#');
    }

    public function indexUnreview(Request $request)
    {
        $this->addMenuData('Unreview Papers', route('admin.admin-review.unreviews.index'));
        if ($request->ajax()) {
            $papers = Paper::with('submission.topic', 'submission.participant')->where('first_decision', 0);

            return DataTables::eloquent($papers)
                ->editColumn('id', 'FP-{{$id}}')
                ->editColumn('submission_id', function ($paper) {
                    return '<a href="' . route('admin.submissions.show', $paper->submission_id) . '">SUBM-' . $paper->submission_id . '</a>';
                })
                ->editColumn('file', function ($paper) {
                    return '<a href="' . route('download', $paper->file) . '"><span class="badge badge-primary">download</span></a>';
                })
                ->addColumn('action', function ($paper) {
                    return '
                    <a href="' . route('admin.admin-review.unreviews.review', $paper->id) . '" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Review</a>
                    ';
                })
                ->rawColumns(['submission_id', 'file', 'action'])
                ->make(true);
        }
        return view('web.admin.admin-review.unreviews.index');
    }

    public function reviewUnreview($id)
    {
        $this->addMenuData('Unreview Papers', route('admin.admin-review.unreviews.index'));
        $this->addMenuData('Review FP-' . $id, route('admin.admin-review.unreviews.review', $id));

        $paper = Paper::with(['submission.participant', 'submission.topic'])->find($id);

        if ($paper->first_decision >= 1) {
            return redirect()->route('admin.admin-review.unreviews.index')->with('toast_info', 'Paper FP-' . $paper->id . ' has been reviewed');
        }

        return view('web.admin.admin-review.unreviews.review')->with(['paper' => $paper]);
    }

    public function submitUnreview(Request $request, $id)
    {
        $paper = Paper::with(['submission.participant', 'submission.topic'])->find($id);
        $paper->first_decision = $request->first_decision;
        $paper->note_admin = $request->note_admin;
        $paper->file_first_revise_status = 0;

        if ($request->hasFile('file_admin')) {
            $path = $request->file('file_admin')->store(
                'user/' . $paper->submission->participant_id . '/submission-' . $paper->submission->id . '/paper/review'
            );

            $paper->file_admin = $path;
        }

        $paper->save();

        $user = User::find($paper->submission->participant->user_id);

        $notificationData = [
            'name' => $paper->submission->participant->salutation . ' ' . Str::title($paper->submission->participant->first_name) . ' ' . Str::title($paper->submission->participant->last_name),
            'subm_id' => $paper->submission_id,
        ];

        $user->notify(new ReviewPaper($notificationData));
        return redirect()->route('admin.admin-review.unreviews.index')->with('toast_success', 'Review paper successful!');
    }

    public function indexReviewResult(Request $request)
    {
        $this->addMenuData('Review Result', route('admin.admin-review.review-results.index'));

        if ($request->ajax()) {
            $papers = Paper::with('submission.topic', 'submission.participant')->where('first_decision', '>=', 1);

            return DataTables::eloquent($papers)
                ->editColumn('id', 'FP-{{$id}}')
                ->editColumn('submission_id', function ($paper) {
                    return '<a href="' . route('admin.submissions.show', $paper->submission_id) . '">SUBM-' . $paper->submission_id . '</a>';
                })
                ->editColumn('file', function ($paper) {
                    return '<a href="' . route('download', $paper->file) . '"><span class="badge badge-primary">download</span></a>';
                })
                ->editColumn('first_decision', function ($paper) {
                    $decision = new Decision($paper->first_decision);
                    return $decision->render();
                })
                ->editColumn('file_first_revise', function ($paper) {
                    if (is_null($paper->file_first_revise)) {
                        $html = '<span class="text-secondary font-italic">No File</span>';
                    } else {
                        $html = '<a href="' . route('download', $paper->file_first_revise) . '"><span class="badge badge-primary">download</span></a>';
                    }

                    return $html;
                })
                ->editColumn('file_first_revise_status', function ($paper) {
                    if ($paper->file_first_revise_status == 1) {
                        $review = '<a href="' . route('admin.admin-review.review-results.review', $paper->id) . '" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Review</a>';
                    } else {
                        $review = '<a href="#" class="btn btn-xs btn-secondary disabled" role="button" aria-disabled="true">Unrevised</a>';
                    }
                    $show = '<a href="' . route('admin.admin-review.review-results.show', $paper->id) . '" class="btn btn-xs btn-info"><i class="fas fa-search"></i> Detail</a>';
                    $edit = '<a href="' . route('admin.admin-review.review-results.edit', $paper->id) . '" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>';
                    return $review . ' ' . $show . ' ' . $edit;
                })
                ->rawColumns(['submission_id', 'file', 'first_decision', 'file_first_revise', 'file_first_revise_status'])
                ->make(true);
        }
        return view('web.admin.admin-review.review-results.index');
    }

    public function showReviewResult($id)
    {
        $this->addMenuData('Review Result', route('admin.admin-review.review-results.index'));
        $this->addMenuData('Detail FP-' . $id, route('admin.admin-review.review-results.show', $id));

        $paper = Paper::with(['submission.participant', 'submission.topic'])->find($id);

        return view('web.admin.admin-review.review-results.show')->with(['paper' => $paper]);
    }

    public function reviewReviewResult($id)
    {
        $this->addMenuData('Review Result', route('admin.admin-review.review-results.index'));
        $this->addMenuData('Review FP-' . $id, route('admin.admin-review.review-results.index'));

        $paper = Paper::with(['submission.participant', 'submission.topic'])->find($id);

        if ($paper->first_decision == 0) {
            return redirect()->route('admin.admin-review.review-results.index')->with('toast_info', 'Paper FP-' . $paper->id . ' has not been reviewed');
        }

        return view('web.admin.admin-review.review-results.review')->with(['paper' => $paper]);
    }

    public function submitReviewResult(Request $request, $id)
    {
        $paper = Paper::with(['submission.participant', 'submission.topic'])->find($id);
        $paper->first_decision = $request->first_decision;
        if (!is_null($request->note_admin)) {
            $paper->note_admin = $request->note_admin;
        }

        if ($request->hasFile('file_admin')) {
            $path = $request->file('file_admin')->store(
                'user/' . $paper->submission->participant_id . '/submission-' . $paper->submission->id . '/paper/review'
            );

            if (!is_null($paper->file_admin)) {
                if (Storage::exists($paper->file_admin)) {
                    Storage::delete($paper->file_admin);
                }
            }

            $paper->file_admin = $path;
        }

        $paper->file_first_revise_status = 0;
        $paper->save();

        $user = User::find($paper->submission->participant->user_id);

        $notificationData = [
            'name' => $paper->submission->participant->salutation . ' ' . Str::title($paper->submission->participant->first_name) . ' ' . Str::title($paper->submission->participant->last_name),
            'subm_id' => $paper->submission_id,
        ];

        $user->notify(new ReviewPaper($notificationData));

        return redirect()->route('admin.admin-review.review-results.index')->with('toast_success', 'Review paper successful!');
    }

    public function editReviewResult($id)
    {
        $this->addMenuData('Review Result', route('admin.admin-review.review-results.index'));
        $this->addMenuData('Edit FP-' . $id, route('admin.admin-review.review-results.index'));

        $paper = Paper::with(['submission.participant', 'submission.topic'])->find($id);

        if ($paper->first_decision == 0) {
            return redirect()->route('admin.admin-review.review-results.index')->with('toast_info', 'Paper FP-' . $paper->id . ' has not been reviewed');
        }

        return view('web.admin.admin-review.review-results.edit')->with(['paper' => $paper]);
    }

    public function updateReviewResult(Request $request, $id)
    {
        $paper = Paper::with(['submission.participant', 'submission.topic'])->find($id);

        $paper->first_decision = $request->first_decision;
        $paper->note_admin = $request->note_admin;

        if ($request->hasFile('file_admin')) {
            $path = $request->file('file_admin')->store(
                'user/' . $paper->submission->participant_id . '/submission-' . $paper->submission->id . '/paper/review'
            );

            if (!is_null($paper->file_admin)) {
                if (Storage::exists($paper->file_admin)) {
                    Storage::delete($paper->file_admin);
                }
            }
            $paper->file_admin = $path;
        } else {
            if (!is_null($paper->file_admin)) {
                if (Storage::exists($paper->file_admin)) {
                    Storage::delete($paper->file_admin);
                }
            }
            $paper->file_admin = null;
        }

        $paper->save();

        return redirect()->route('admin.admin-review.review-results.index')->with('toast_success', 'Edit review paper successful!');
    }
}
