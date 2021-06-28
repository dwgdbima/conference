<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Paper;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FinalPaperController extends BaseController
{
    public function __construct()
    {
        $this->addMenuData('Final Paper', '#');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $papers = Paper::with(['submission.topic', 'submission.participant'])->where('final_decision', 1);
            return DataTables::eloquent($papers)
                ->editColumn('id', 'FP-{{$id}}')
                ->editColumn('submission_id', function ($paper) {
                    return '<a href="' . route('admin.submissions.show', $paper->submission_id) . '">SUBM-' . $paper->submission_id . '</a>';
                })
                ->editColumn('submission.participant_id', function ($paper) {
                    return '<a href="' . route('admin.active-users.show', $paper->submission->participant_id) . '">USER-' . $paper->submission->participant_id . '</a>';
                })
                ->editColumn('file_final', function ($paper) {
                    if (is_null($paper->file_final)) {
                        $html = '<span class="text-secondary font-italic">No File</span>';
                    } else {
                        $html = '<a href="' . route('download', $paper->file_final) . '"><span class="badge badge-primary">download</span></a>';
                    }
                    return $html;
                })
                ->addColumn('action', function ($paper) {
                    return '<a href="' . route('admin.papers.show', $paper->id) . '" class="btn btn-xs btn-info"><i class="fas fa-search"></i> Detail</a>';
                })
                ->rawColumns(['submission_id', 'submission.participant_id', 'file_final', 'action'])
                ->make(true);
        }
        return view('web.admin.final-papers.index');
    }
}
