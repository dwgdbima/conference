<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Abstractt;
use App\View\Components\Decision;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AbstractController extends BaseController
{
    public function __construct()
    {
        $this->addMenuData('Abstract', route('admin.abstracts.index'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $abstracts = Abstractt::with('submission.topic', 'submission.participant');

            return DataTables::eloquent($abstracts)
                ->editColumn('submission_id', function ($abstract) {
                    return '<a href="' . route('admin.submissions.show', $abstract->submission_id) . '">SUBM-' . $abstract->submission_id . '</a>';
                })
                ->editColumn('file', function ($abstract) {
                    return '<a href="' . route('download', $abstract->file) . '"><span class="badge badge-primary">download</span></a>';
                })
                ->editColumn('decision', function ($abstract) {
                    $decision = new Decision($abstract->decision);
                    return $decision->render();
                })
                ->addColumn('action', function ($abstract) {
                    return '<a href="' . route('admin.abstracts.show', $abstract->id) . '" class="btn btn-xs btn-info"><i class="fas fa-search"></i></a>
                <a href=" ' . route('admin.abstracts.edit', $abstract->id) . '" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                <a href="#" data-role="delete-abstract" data-id="' . $abstract->id . '" data-url="#"  class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>';
                })
                ->rawColumns(['submission_id', 'file', 'decision', 'note', 'action'])
                ->make(true);
        }
        return view('web.admin.abstracts.index');
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
        $this->addMenuData('Detail ABS-' . $id, route('admin.abstracts.show', $id));

        $abstract = Abstractt::with(['submission.participant', 'submission.topic'])->find($id);
        return view('web.admin.abstracts.show')->with(['abstract' => $abstract]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->addMenuData('Review ABS-' . $id, route('admin.abstracts.edit', $id));

        $abstract = Abstractt::with(['submission.participant', 'submission.topic'])->find($id);
        return view('web.admin.abstracts.edit')->with(['abstract' => $abstract]);
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
        $abstract = Abstractt::find($id);
        $abstract->decision = $request->decision;
        $abstract->note = $request->note;
        $abstract->save();

        return redirect()->route('admin.abstracts.index')->with('toast_success', 'Review abstract successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Abstractt::destroy($id);

        return response()->json(['success' => true]);
    }
}
