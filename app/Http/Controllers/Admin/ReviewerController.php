<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ReviewerRequest;
use App\Models\Reviewer;
use App\Models\Role;
use App\Models\User;
use App\Notifications\NewReviewer;
use App\Notifications\PasswordReviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ReviewerController extends BaseController
{
    public function __construct()
    {
        $this->addMenuData('Reviewers', '#');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $reviewers = Reviewer::with('user');

            return DataTables::eloquent($reviewers)
                ->addColumn('action', function ($reviewer) {
                    return '
                    <a href="#" class="btn btn-xs btn-primary" data-role="edit-reviewer" data-id="' . $reviewer->id . '"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-xs btn-danger" data-role="delete-reviewer" data-id="' . $reviewer->id . '"><i class="fas fa-trash"></i></a>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('web.admin.reviewers.index');
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
    public function store(ReviewerRequest $request)
    {
        $request->validated();

        $password = Str::random(8);
        $role = Role::where('name', 'reviewer')->first();
        $user = $role->users()->create([
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        $reviewer = $user->reviewer()->create([
            'name' => $request->name,
            'password' => $password,
        ]);

        $notificationData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ];

        $user->notify(new NewReviewer($notificationData));

        return redirect()->back()->with('toast_success', 'Add new reviewer successful!');
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
        $reviewer = Reviewer::with('user')->find($id);

        return response()->json(['reviewer' => $reviewer]);
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
        $reviewer = Reviewer::find($id);
        $newPassword = false;
        if ($reviewer->password !== $request->password) {
            $newPassword = true;
        }
        $reviewer->update($request->all());
        $user = User::find($reviewer->user_id);
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $notificationData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        $newPassword == true ? $user->notify(new PasswordReviewer($notificationData)) : '';

        return redirect()->back()->with('toast_success', 'Update reviewer successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy(Reviewer::find($id)->user_id);

        return response()->json(['success' => true]);
    }
}
