@extends('web.admin.main')
@push('styles')
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <div class="w-75 m-auto">
            <form action="{{route('admin.active-users.update', $participant->id)}}" method="post" id="registration">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <x-forms.input id="first_name" name="first_name" placeholder="First Name"
                            value="{{$participant->first_name}}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input id="last_name" name="last_name" placeholder="Last Name"
                            value="{{$participant->last_name}}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mr-3">
                                Gender
                            </label>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="gender-male" name="gender" value="male"
                                    {{$participant->gender == 'male' ? 'checked' : ''}}>
                                <label for="gender-male">
                                    Male
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="gender-female" name="gender" value="female"
                                    {{$participant->gender == 'female' ? 'checked' : ''}}>
                                <label for="gender-female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <x-forms.input-date id="birth_of_date" name="birth_of_date"
                            value="{{$participant->birth_of_date}}" placeholder="Birth Of Date" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-forms.select2 id="salutation" name="salutation">
                            <option value=""></option>
                            <x-forms.option old="{{ $participant->salutation }}" value="Prof. Dr.">Prof. Dr.
                            </x-forms.option>
                            <x-forms.option old="{{ $participant->salutation }}" value="Prof. Dr. dr.">Prof. Dr. dr.
                            </x-forms.option>
                            <x-forms.option old="{{ $participant->salutation }}" value="Prof. Dr. drg.">Prof. Dr. drg.
                            </x-forms.option>
                            <x-forms.option old="{{ $participant->salutation }}" value="Prof.">Prof.
                            </x-forms.option>
                            <x-forms.option old="{{ $participant->salutation }}" value="Dr. dr.">Dr. dr.
                            </x-forms.option>
                            <x-forms.option old="{{ $participant->salutation }}" value="Dr.">Dr.</x-forms.option>
                            <x-forms.option old="{{ $participant->salutation }}" value="dr.">dr.</x-forms.option>
                            <x-forms.option old="{{ $participant->salutation }}" value="Mr.">Mr.</x-forms.option>
                            <x-forms.option old="{{ $participant->salutation }}" value="Ms.">Ms.</x-forms.option>
                        </x-forms.select2>
                    </div>
                    <div class="col-md-6">
                        <x-forms.input id="institution" name="institution" value="{{$participant->institution}}"
                            placeholder="Institution" inputgroup="append" inputgroupicon="fas fa-university" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="mr-3">
                                Participation
                            </label>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="presenter" name="participation" value="presenter"
                                    {{$participant->participation == 'presenter' ? 'checked' : ''}}>
                                <label for="presenter">
                                    Presenter
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="non-presenter" name="participation" value="non-presenter"
                                    {{$participant->participation == 'non-presenter' ? 'checked' : ''}}>
                                <label for="non-presenter">
                                    Non-presenter
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <x-forms.input id="research" name="research" placeholder="Your research area or expertise"
                            value="{{$participant->research}}" inputgroup=append inputgroupicon="fas fa-search" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-forms.input id="phone" name="phone" placeholder="Phone Number" inputgroup="append"
                            inputgroupicon="fas fa-phone" value="{{$participant->phone}}" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input id="fax" name="fax" placeholder="Fax" inputgroup="append"
                            inputgroupicon="fas fa-fax" value="{{$participant->fax}}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"><label for="">Postal Address</label></div>
                    <div class="col-md-9">
                        <x-forms.input id="street" name="street" value="{{$participant->street}}" placeholder="Street"
                            inputgroup="append" inputgroupicon="fas fa-road" />

                        <x-forms.input id="city" name="city" value="{{$participant->city}}" placeholder="City"
                            inputgroup="append" inputgroupicon="fas fa-city" />

                        <x-forms.input id="zip_code" name="zip_code" value="{{$participant->zip_code}}"
                            placeholder="Zip Code" inputgroup="append" inputgroupicon="fas fa-barcode" />

                        <x-forms.select-country old="{{ $participant->country }}" id="country" name="country" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"><label for="">Postal Address</label></div>
                    <div class="col-md-9">
                        <x-forms.textarea id="info" name="info" placeholder="Some information ..." rows="5">
                            {{$participant->info}}
                        </x-forms.textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush