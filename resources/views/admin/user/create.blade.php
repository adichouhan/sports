@extends('admin.admin_template')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" autocomplete="off" action="/admin/user/store">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input required  type="email" name="email"   class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Local Name</label>
                                    <input required  type="text" name="local_name" value="" class="form-control" id="inputAddress" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">First Name</label>
                                    <input required  type="text" name="first_name" class="form-control" id="inputAddress" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Last Name</label>
                                    <input required  type="text" name="last_name" class="form-control" id="inputAddress2"
                                           placeholder="Last Name">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input required  type="text" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="conf_password">Confirm Password</label>
                                    <input required  type="text" name="confirm_Password" class="form-control" id="conf_password"
                                           placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputAddress">DOB</label>
                                    <input required  type="date" class="form-control" name="dob" id="inputAddress" placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Gender</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" required  type="radio" name="gender" id="inlineRadio1"
                                               value="male">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" required  type="radio" name="gender" id="inlineRadio2"
                                               value="female">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" required  type="radio" name="gender" id="inlineRadio3"
                                               value="other">
                                        <label class="form-check-label" for="inlineRadio3">other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Nationality</label>
                                    <select class="form-control custom-select" name="nationality">
                                        <option selected>Open this select menu</option>
                                        @foreach($arrCountries as $objCountries)
                                            <option value="{{$objCountries}}">{{$objCountries}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Local ID</label>
                                    <input required  type="text" class="form-control" name="local_id" id="inputAddress2"
                                           placeholder="Login ID" >
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Passport</label>
                                    <input required  type="text" class="form-control" name="passport_no" id="inputAddress2" placeholder="Passport ID">
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="inputAddress2">User Role</label>
                                <input required type="radio" name="user_role" class="" id="role_organiser" value="organiser"><label for="role_organiser">Organiser</label>
                               <input required type="radio" name="user_role" class="" id="role_user" value="user"> <label for="role_user">User</label>
                            </div>

                            <h3>Contact Information</h3>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea1">Address</label>
                                    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Mobile phone</label>
                                    <input required  type="tel"  name="mobile_no" class="form-control" id="inputAddress2" placeholder="with country code">
                                </div>
                            </div>
                            <button required  type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
