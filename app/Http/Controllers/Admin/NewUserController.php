<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\ActionNewUser;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class NewUserController extends Controller
{
    public function __construct()
    {
        $this->addMenuData('New Users', route('admin.new-users.index'));
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
                $query->where('active', 0);
            });

            return DataTables::eloquent($participants)
                ->addColumn('name', function ($participant) {
                    return $participant->salutation . ' ' . $participant->first_name . ' ' . $participant->last_name;
                })
                ->addColumn('action', function ($participant) {
                    return '<a href="#" data-id="' . $participant->id . '" data-role="action-user" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>';
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
        return view('web.admin.users.new_users.index')->with(['menuData' => $this->menuData]);
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
        $participant = Participant::find($id);
        $user = User::find($participant->user_id);
        $user->active = 1;
        $user->save();

        $notificationData = [
            'name' => $participant->salutation . ' ' . Str::title($participant->first_name) . ' ' . Str::title($participant->last_name),
            'action' => 1,
        ];

        $user->notify(new ActionNewUser($notificationData));
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
            'action' => 1,
        ];

        $user->notify(new ActionNewUser($notificationData));

        User::destroy($participant->user_id);
    }
}
