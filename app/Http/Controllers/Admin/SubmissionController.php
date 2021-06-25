<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubmissionController extends BaseController
{
    public function __construct()
    {
        $this->addMenuData('Submissions', route('admin.submissions.index'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $submissions = Submission::with(['topic', 'abstract', 'paper']);

            return DataTables::eloquent($submissions)
                ->editColumn('participant_id', function ($submission) {
                    return '<a href="' . route('admin.active-users.show', $submission->participant_id) . '">USER-' . $submission->participant_id . '</a>';
                })
                ->editColumn('payment', function ($submission) {
                    if ($submission->payment == 0) {
                        $result = '<a href="#" class="badge badge-warning" data-role="payment" data-id="' . $submission->id . '">Pending</a>';
                    } elseif ($submission->payment == 1) {
                        $result = '<a href="#" class="badge badge-info" data-role="payment" data-id="' . $submission->id . '">Paid</a>';
                    } elseif ($submission->payment == 2) {
                        $result = '<a href="#" class="badge badge-success" data-role="payment" data-id="' . $submission->id . '">Accepted</a>';
                    } else {
                        $result = '<a href="#" class="badge badge-danger" data-role="payment" data-id="' . $submission->id . '">Decline</a>';
                    }
                    return $result;
                })
                ->editColumn('abstract.file', function ($submission) {
                    if (is_null($submission->abstract)) {
                        $result = '<span class="text-secondary font-italic">NO DATA</span>';
                    } else {
                        $result = '<a href="' . route('download', $submission->abstract->file) . '" class="badge badge-primary">download</a>';
                    }
                    return $result;
                })
                ->editColumn('paper.file', function ($submission) {
                    if (is_null($submission->paper)) {
                        $result = '<span class="text-secondary font-italic">NO DATA</span>';
                    } else {
                        $result = '<a href="' . route('download', $submission->paper->file) . '" class="badge badge-primary">download</a>';
                    }
                    return $result;
                })
                ->addColumn('action', function ($participant) {
                    $result = '<a href="#" data-id="' . $participant->id . '" data-role="detail-submission" class="btn btn-xs btn-info"><i class="fas fa-search"></i></a>
                    <a href="#" data-id="' . $participant->id . '" data-role="delete-submission" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>';
                    return $result;
                })
                ->rawColumns(['participant_id', 'payment', 'abstract.file', 'paper.file', 'action'])
                ->make(true);
        }
        return view('web.admin.submissions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $submission = Submission::with(['topic', 'abstract', 'paper'])->find($id);

        if (request()->ajax()) {
            return response()->json(['submission' => $submission]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $submission = Submission::find($id);
        if ($request->type == 'accept') {
            $message = 'Accept Payment Successul!';
            $submission->payment = 2;
        } else {
            $message = 'Decline Payment Successul!';
            $submission->payment = 3;
        }
        $submission->save();

        return response()->json(['success' => true, 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Submission::destroy($id);

        return response()->json(['success' => true]);
    }
}
