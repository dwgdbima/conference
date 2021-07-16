<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\Participant;
use App\Models\Submission;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->addMenuData('Dashboard', route('admin.dashboard.index'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.admin.dashboard.index')->with([
            'user' => $this->_countUser(),
            'submission' => $this->_countSubmission(),
            'review' => $this->_countReview(),
            'final_paper' => $this->_countFinalPaper(),
            'chart' => $this->_chart(),
            'paper_review' => $this->_paperReview(),
            'new_users' => $this->_newUsers(),
            'added_papers' => $this->_addedPaper(),
        ]);
    }

    private function _countUser()
    {
        $active_user = Participant::whereHas('user', function ($user) {
            $user->where('active', 1);
        })->count();
        $total_user = Participant::all()->count();
        if ($total_user == 0) {
            $percentage = 0;
        } else {
            $percentage = ($active_user / $total_user) * 100;
        }

        $count_user = [
            'active' => $active_user,
            'total' => $total_user,
            'percentage' => $percentage,
        ];

        return $count_user;
    }

    private function _countSubmission()
    {
        $total_submission = Submission::all()->count();
        $paid_submission = Submission::where('payment', 1)->count();
        if ($paid_submission == 0) {
            $percentage = 0;
        } else {
            $percentage = ($paid_submission / $total_submission) * 100;
        }

        $count_submission = [
            'total' => $total_submission,
            'paid' => $paid_submission,
            'percentage' => $percentage,
        ];

        return $count_submission;
    }

    private function _countReview()
    {
        $total = Paper::all()->count();
        $review = Paper::where('first_decision', '>=', 1)->count();
        if ($review == 0) {
            $percentage = 0;
        } else {
            $percentage = ($review / $total) * 100;
        }

        $count_review = [
            'total' => $total,
            'review' => $review,
            'percentage' => $percentage,
        ];

        return $count_review;
    }

    private function _countFinalPaper()
    {
        $total = Paper::all()->count();
        $final_paper = Paper::whereNotNull('file_final')->count();
        if ($final_paper == 0) {
            $percentage = 0;
        } else {
            $percentage = ($final_paper / $total) * 100;
        }

        $count_final_paper = [
            'total' => $total,
            'final_paper' => $final_paper,
            'percentage' => $percentage,
        ];

        return $count_final_paper;
    }

    private function _chart()
    {
        $chart_range = Carbon::today()->toFormattedDateString() . ' - ' . Carbon::today()->subWeeks(4)->toFormattedDateString();
        $label = [
            Carbon::today()->format('d M'),
            Carbon::today()->subWeeks(1)->format('d M'),
            Carbon::today()->subWeeks(2)->format('d M'),
            Carbon::today()->subWeeks(3)->format('d M'),
            Carbon::today()->subWeeks(4)->format('d M'),
        ];

        $data = [
            'chart_range' => $chart_range,
            'label' => $label
        ];

        return $data;
    }

    private function _paperReview()
    {
        $undecide = Paper::where('first_decision', 0)->count();
        $accepted = Paper::where('first_decision', 1)->count();
        $revise = Paper::where('first_decision', 2)->count();
        $rejected = Paper::where('first_decision', 3)->count();

        $paper_review = [
            'undecide' => $undecide,
            'accepted' => $accepted,
            'revise' => $revise,
            'rejected' => $rejected,
        ];

        return $paper_review;
    }

    private function _newUsers()
    {
        $users = Participant::with('user')->orderBy('created_at', 'desc')->limit(7)->get();
        return $users;
    }

    private function _addedPaper()
    {
        $paper = Paper::with('submission.participant')->orderBy('created_at', 'desc')->limit(5)->get();
        return $paper;
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
        //
    }
}
