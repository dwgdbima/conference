<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\View\Components\Decision;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaperController extends BaseController
{
    public function __construct()
    {
        $this->addMenuData('Papers', route('admin.papers.index'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $papers = Paper::with('submission.topic', 'submission.participant');

            return DataTables::eloquent($papers)
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
                ->editColumn('file_final', function ($paper) {
                    if (is_null($paper->file_final)) {
                        $html = '<span class="text-secondary font-italic">No File</span>';
                    } else {
                        $html = '<a href="' . route('download', $paper->file_final) . '"><span class="badge badge-primary">download</span></a>';
                    }
                    return $html;
                })
                ->addColumn('action', function ($paper) {
                    return '<a href="' . route('admin.papers.show', $paper->id) . '" class="btn btn-xs btn-info"><i class="fas fa-search"></i></a>
                <a href="#" data-role="delete-paper" data-id="' . $paper->id . '" data-url="#"  class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>';
                })
                ->rawColumns(['submission_id', 'file', 'first_decision', 'file_first_revise', 'recomendation', 'file_second_revise', 'final_decision', 'file_final', 'action'])
                ->make(true);
        }
        return view('web.admin.papers.index');
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
        $this->addMenuData('Detail FP-' . $id, route('admin.papers.show', $id));

        $paper = Paper::with(['submission.participant', 'submission.topic', 'reviewPaper.reviewer'])->find($id);
        return view('web.admin.papers.show')->with(['paper' => $paper]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paper::destroy($id);

        return response()->json(['success' => true]);
    }
}
