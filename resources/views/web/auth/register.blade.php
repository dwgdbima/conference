@extends('web.auth.main')

@section('box-msg', 'Register a new membership')

@section('styles')
<!-- icheck -->
<link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<style>
    .login-page {
        height: unset;
    }

    .login-box {
        width: 680px;
        margin: 20px 0px;
    }

    @media (max-width: 576px) {
        .login-box {
            margin-top: .5rem;
            width: 90%;
        }

        .bs-stepper-content {
            padding: 0 20px 20px;
        }
    }
</style>

@endsection

@section('content')
<form action="{{route('register')}}" method="post" id="registration">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <x-forms.input id="first_name" name="first_name" placeholder="First Name" :value="old('first_name')" />
        </div>
        <div class="col-md-6">
            <x-forms.input id="last_name" name="last_name" placeholder="Last Name" :value="old('last_name')" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="mr-3">
                    Gender
                </label>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="gender-male" name="gender" value="male" checked="">
                    <label for="gender-male">
                        Male
                    </label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="gender-female" name="gender" value="female"
                        {{old('gender') == 'female' ? 'checked' : ''}}>
                    <label for="gender-female">
                        Female
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <x-forms.input-date id="birth_of_date" name="birth_of_date" :value="old('birth_of_date')"
                placeholder="Birth Of Date" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-forms.select2 id="salutation" name="salutation">
                <option value=""></option>
                <x-forms.option :old="old('salutation')" value="Prof. Dr.">Prof. Dr. </x-forms.option>
                <x-forms.option :old="old('salutation')" value="Prof. Dr. dr.">Prof. Dr. dr.
                </x-forms.option>
                <x-forms.option :old="old('salutation')" value="Prof. Dr. drg.">Prof. Dr. drg.
                </x-forms.option>
                <x-forms.option :old="old('salutation')" value="Prof.">Prof.
                </x-forms.option>
                <x-forms.option :old="old('salutation')" value="Dr. dr.">Dr. dr.</x-forms.option>
                <x-forms.option :old="old('salutation')" value="Dr.">Dr.</x-forms.option>
                <x-forms.option :old="old('salutation')" value="dr.">dr.</x-forms.option>
                <x-forms.option :old="old('salutation')" value="Mr.">Mr.</x-forms.option>
                <x-forms.option :old="old('salutation')" value="Ms.">Ms.</x-forms.option>
            </x-forms.select2>
        </div>
        <div class="col-md-6">
            <x-forms.input id="institution" name="institution" :value="old('institution')" placeholder="Institution"
                inputgroup="append" inputgroupicon="fas fa-university" :value="old('last_name')" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="mr-3">
                    Participation
                </label>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="presenter" name="participation" value="presenter" checked="">
                    <label for="presenter">
                        Presenter
                    </label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="non-presenter" name="participation" value="non-presenter"
                        {{old('participation') == 'non-presenter' ? 'checked' : ''}}>
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
                :value="old('research')" inputgroup=append inputgroupicon="fas fa-search" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-forms.input id="email" type="email" name="email" placeholder="Email" inputgroup="append"
                inputgroupicon="fas fa-envelope" :value="old('email')" />
        </div>
        <div class="col-md-6">
            <x-forms.input id="email-confirmation" name="email_confirmation" placeholder="Retype Email"
                inputgroup="append" inputgroupicon="fas fa-envelope" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-forms.input id="password" type="password" name="password" placeholder="Password" inputgroup="append"
                inputgroupicon="fas fa-lock" :value="old('password')" />
        </div>
        <div class="col-md-6">
            <x-forms.input id="password-confirmation" type="password" name="password_confirmation"
                placeholder="Retype Password" inputgroup="append" inputgroupicon="fas fa-lock" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-forms.input id="phone" name="phone" placeholder="Phone Number" inputgroup="append"
                inputgroupicon="fas fa-phone" :value="old('phone')" />
        </div>
        <div class="col-md-6">
            <x-forms.input id="fax" name="fax" placeholder="Fax" inputgroup="append" inputgroupicon="fas fa-fax"
                :value="old('fax')" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><label for="">Postal Address</label></div>
        <div class="col-md-9">
            <x-forms.input id="street" name="street" :value="old('street')" placeholder="Street" inputgroup="append"
                inputgroupicon="fas fa-road" />

            <x-forms.input id="city" name="city" :value="old('city')" placeholder="City" inputgroup="append"
                inputgroupicon="fas fa-city" />

            <x-forms.input id="zip_code" name="zip_code" :value="old('zip_code')" placeholder="Zip Code"
                inputgroup="append" inputgroupicon="fas fa-barcode" />

            <x-forms.select-country :old="old('country')" id="country" name="country" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><label for="">Postal Address</label></div>
        <div class="col-md-9">
            <x-forms.textarea id="info" name="info" placeholder="Some information ..." rows="5">
            </x-forms.textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="{{asset('vendor/moment/moment.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- /.Select 2 -->
<script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
@endsection