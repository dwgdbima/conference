@extends('web.admin.main')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                    aria-orientation="vertical">
                    <div class="w-100" style="padding-left: 2rem;">
                        <img src="{{asset($participant->photo)}}" class="img-fluid img-circle mb-4 w-75" alt="">
                    </div>
                    <a class="nav-link text-center active" id="vert-tabs-profile-tab" data-toggle="pill"
                        href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile"
                        aria-selected="true">Profile</a>
                    <a class="nav-link text-center" id="vert-tabs-submission-tab" data-toggle="pill"
                        href="#vert-tabs-submission" role="tab" aria-controls="vert-tabs-submission"
                        aria-selected="false">Submission</a>
                    <a class="nav-link text-center" id="vert-tabs-generate-new-password-tab" data-toggle="pill"
                        href="#vert-tabs-generate-new-password" role="tab"
                        aria-controls="vert-tabs-generate-new-password" aria-selected="false">Generate Password</a>
                    <a class="nav-link text-center" href="{{route('admin.active-users.edit', $participant->id)}}">Edit
                        USER-{{$participant->id}}</a>
                </div>
            </div>
            <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                    <div class="tab-pane text-left fade active show" id="vert-tabs-profile" role="tabpanel"
                        aria-labelledby="vert-tabs-profile-tab">
                        <p class="text-muted"><b>Personal Information</b></p>
                        <dl class="row">
                            <dt class="col-sm-4">Full Name</dt>
                            <dd class="col-sm-8">{{$participant->salutation}} {{Str::title($participant->first_name)}}
                                {{Str::title($participant->last_name)}}</dd>
                            <dt class="col-sm-4">Birth of Date</dt>
                            <dd class="col-sm-8">
                                {{!is_null($participant->birth_of_date) ? $participant->birth_of_date : '-'}}</dd>
                            <dt class="col-sm-4">Gender</dt>
                            <dd class="col-sm-8">
                                {{!is_null($participant->gender) ? Str::upper($participant->gender) : '-'}}</dd>
                            <dt class="col-sm-4">Institution</dt>
                            <dd class="col-sm-8">
                                {{!is_null($participant->institution) ? $participant->institution : '-'}}</dd>
                            <dt class="col-sm-4">Expertise</dt>
                            <dd class="col-sm-8">
                                {{!is_null($participant->research) ? $participant->research : '-'}}</dd>
                            <dt class="col-sm-4">Address</dt>
                            <dd class="col-sm-8">
                                {{$participant->street . ', '}}{{$participant->city .', '}}{{$participant->country}}
                            </dd>
                        </dl>
                        <p class="text-muted"><b>Contact Information</b></p>
                        <dl class="row">
                            <dt class="col-sm-4">Email</dt>
                            <dd class="col-sm-8">
                                {{!is_null($participant->user->email) ? $participant->user->email : '-'}}</dd>
                            <dt class="col-sm-4">Phone</dt>
                            <dd class="col-sm-8">{{!is_null($participant->phone) ? $participant->phone : '-'}}</dd>
                            <dt class="col-sm-4">Fax</dt>
                            <dd class="col-sm-8">{{!is_null($participant->fax) ? $participant->fax : '-'}}</dd>
                        </dl>
                        <p class="text-muted"><b>More Information</b></p>
                        <dl class="row">
                            <dd class="col-sm-12">
                                {{!is_null($participant->info) ? $participant->info : '-'}}</dd>
                        </dl>
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-submission" role="tabpanel"
                        aria-labelledby="vert-tabs-submission-tab">
                        <p class="text-muted"><b>Submission</b></p>
                        <h5>Abstract</h5>
                        <h3 class="text-muted text-center">NO SUBMISSION YET</h3>
                        <hr>
                        <h5>Full Paper</h5>
                        <h3 class="text-muted text-center">NO SUBMISSION YET</h3>
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-generate-new-password" role="tabpanel"
                        aria-labelledby="vert-tabs-generate-new-password-tab">
                        <div style="margin: 2rem auto 0; width: 60%" class="text-center">
                            <h3 class="text-muted mb-3"><i class="fas fa-key"></i> Generate New Password</h3>
                            <form action="{{route('admin.active-users.generate-new-password', $participant->id)}}"
                                method="post">
                                @csrf
                                @method('PUT')
                                <x-forms.input id="password" type="password" name="password" placeholder="Password"
                                    inputgroup="append" inputgroupicon="fas fa-lock" required=true
                                    :value="old('password')" />
                                <x-forms.input id="password-confirmation" type="password" name="password_confirmation"
                                    placeholder="Retype Password" inputgroup="append" inputgroupicon="fas fa-lock" />
                                <button type="submit" class="btn btn-primary btn-block">Generate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection