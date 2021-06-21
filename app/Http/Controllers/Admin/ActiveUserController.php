<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Notifications\GenerateNewPassword;
use App\Http\Requests\UpdateParticipantRequest;
use App\Http\Requests\GenerateNewPasswordRequest;
use App\Notifications\DeleteUser;

class ActiveUserController extends Controller
{

    public function __construct()
    {
        $this->addMenuData('Active Users', route('admin.active-users.index'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $participants = Participant::with('user')->whereHas('user', function ($query) {
                $query->where('active', 1);
            });

            return DataTables::eloquent($participants)
                ->addColumn('name', function ($participant) {
                    return $participant->salutation . ' ' . $participant->first_name . ' ' . $participant->last_name;
                })
                ->addColumn('action', function ($participant) {
                    return '<a href="' . route('admin.active-users.show', $participant->id) . '" data-role="detail-user" class="btn btn-xs btn-info"><i class="fas fa-search"></i></a>
                <a href=" ' . route('admin.active-users.edit', $participant->id) . '" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                <a href="#" data-role="delete-user" data-id="' . $participant->id . '" data-url="#"  class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>';
                })
                ->editColumn('id', 'USER-{{$id}}')
                ->editColumn('user.email', function ($participant) {
                    $hasVerified = $participant->user->hasVerifiedEmail();
                    return '<a href="#">' . $participant->user->email . '</a> ' . ($hasVerified == 1 ? '<i class="fas fa-check text-success" data-toggle="tooltip" data-placement="top" title="Email has verified"></i>' : '<i class="fas fa-question-circle text-warning" data-toggle="tooltip" data-placement="top" title="email not verified"></i>');
                })
                ->editColumn('participation', '<span class="badge {{$participation == "presenter" ? "bg-success" : "bg-primary"}}">{{$participation}}</span>')
                ->editColumn('phone', '<a href="#">{{$phone}}</a>')
                ->rawColumns(['name', 'action', 'id', 'user.email', 'phone', 'participation'])
                ->make(true);
        }
        return view('web.admin.users.active_users.index')->with(['menuData' => $this->menuData]);
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
        $this->addMenuData('USER-' . $id, route('admin.active-users.show', $id));
        $participant = Participant::find($id);
        return view('web.admin.users.active_users.show')->with([
            'menuData' => $this->menuData,
            'participant' => $participant,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->addMenuData('USER-' . $id, route('admin.active-users.show', $id));
        $this->addMenuData('Edit', route('admin.active-users.edit', $id));

        $participant = Participant::find($id);

        return view('web.admin.users.active_users.edit')->with([
            'menuData' => $this->menuData,
            'participant' => $participant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParticipantRequest $request, $id)
    {
        $request->validated();

        $participant = Participant::find($id);
        $participant->update($request->all());

        return redirect()->back()->with('toast_success', 'Update Successful!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::find($id);
        $user = User::find($participant->user_id);

        $notificationData = [
            'name' => $participant->salutation . ' ' . Str::title($participant->first_name) . ' ' . Str::title($participant->last_name),
        ];

        $user->notify(new DeleteUser($notificationData));

        User::destroy($participant->user_id);
    }

    public function generateNewPassword(GenerateNewPasswordRequest $request, $id)
    {
        $request->validated();

        $participant = Participant::find($id);
        $user = User::find($participant->user_id);
        $user->password = Hash::make($request->password);
        $user->save();

        $notificationData = [
            'name' => $participant->salutation . ' ' . Str::title($participant->first_name) . ' ' . Str::title($participant->last_name),
            'password' => $request->password,
        ];

        $user->notify(new GenerateNewPassword($notificationData));

        return redirect()->back()->with('toast_success', 'Generate New Password Successful!');
    }
}
