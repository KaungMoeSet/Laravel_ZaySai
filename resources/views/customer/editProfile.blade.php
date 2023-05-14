@extends('customer.layout.profile')

@section('content1')
    <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__title">
                    <h4>My Profile</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-title row mt-3 mx-2 mb-0">
                            <h5 class="col-10">
                                Edit Profile
                            </h5>
                        </div>
                        <div class="card-body mx-2 mb-0 ">
                            <div class="my-2 row">
                                <div class="col-6">
                                    <small>Full name</small> <br>
                                    <input type="text" name="userName" style="color: #212121"
                                        value="{{ $user->name }}">
                                </div>
                                <div class="col-6">
                                    <small>Email Address</small> <br>
                                    <b style="color: #212121"> {{ $user->email }} </b>
                                </div>
                            </div>

                            <div class="my-2 row">
                                <div class="col-6">
                                    <small>Birthday</small> <br>
                                    <input type="date" name="birthday" id="bd" class="col-7">
                                </div>
                                <div class="col-6 form-group">
                                    <small>Gender</small> <br>
                                    <select name="gender" id="my-select" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Male">Female</option>
                                        <option value="Male">Others</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 m-2" style="text-align: end">
                            <a href="{{ route('profile.profileData') }}" class="btn btn-secondary mx-2">Cancel</a>
                            <input type="submit" class="btn btn-warning" value="Update">
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </form>
@endsection
