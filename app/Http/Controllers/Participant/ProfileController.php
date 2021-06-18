<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('web.participant.profile.index');
    }
}
