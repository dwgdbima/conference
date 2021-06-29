<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\Review_paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Reviewer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review_papers = Review_paper::where('reviewer_id', Auth()->user()->reviewer->id)->get();
        return view('web.reviewer.dashboard.index')->with(['review_papers' => $review_papers]);
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
        $paper = Paper::find($request->id);

        if ($request->hasFile('file_reviewer')) {
            $path = $request->file('file_reviewer')->store(
                'user/' . $paper->submission->participant_id . '/submission-' . $paper->submission->id . '/paper/review'
            );

            $paper->file_reviewer = $path;
        }

        $paper->recomendation = $request->recomendation;
        $paper->note_reviewer = $request->note_reviewer;
        $paper->file_second_revise_status = 0;
        $paper->save();

        return redirect()->back()->with('toast_success', 'Review paper FP-' . $request->id . ' successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paper = Paper::find($id);
        return response()->json(['paper' => $paper]);
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
        $paper = Paper::find($id);

        if ($request->hasFile('file_reviewer')) {
            $path = $request->file('file_reviewer')->store(
                'user/' . $paper->submission->participant_id . '/submission-' . $paper->submission->id . '/paper/review'
            );

            $paper->file_reviewer = $path;
        }

        $paper->recomendation = $request->recomendation;
        $paper->note_reviewer = $request->note_reviewer;
        $paper->save();

        return redirect()->back()->with('toast_success', 'Edit review paper FP-' . $id . ' successful!');
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
