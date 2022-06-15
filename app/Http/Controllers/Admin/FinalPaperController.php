<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Notifications\SendLoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpWord\TemplateProcessor;
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
                    $detail = '<a href="' . route('admin.papers.show', $paper->id) . '" class="btn btn-xs btn-info"><i class="fas fa-search"></i> Detail</a>';
                    $loa = '<a href="#" onclick="sendLoa(event, ' . $paper->id . ')" class="btn btn-xs btn-primary"><i class="fas fa-paper-plane"></i> Send LoA</a>';
                    return $detail . ' ' . $loa;
                })
                ->rawColumns(['submission_id', 'submission.participant_id', 'file_final', 'action'])
                ->make(true);
        }
        return view('web.admin.final-papers.index');
    }

    public function sendLoa(Request $request)
    {
        $papers = Paper::find($request->id);
        $title = $papers->submission->title;
        $institution = $papers->submission->participant->institution;
        $name = $papers->submission->participant->full_name;

        $templateProcessor = new TemplateProcessor('LoA.docx');
        $templateProcessor->setValue('name', $name);
        $templateProcessor->setValue('title', $title);
        $templateProcessor->setValue('institution', $institution);
        $path = public_path('Letter_of_acceptance.docx');
        if (File::exists($path)) {
            File::delete($path);
        }
        $templateProcessor->saveAs('Letter_of_acceptance.docx');

        $notificationData = [
            'name' => $name,
            'path' => $path,
        ];

        $user = $papers->submission->participant->user;
        $user->notify(new SendLoa($notificationData));

        return response()->json(['subm_title' => $title, 'name' => $name]);
    }
}
