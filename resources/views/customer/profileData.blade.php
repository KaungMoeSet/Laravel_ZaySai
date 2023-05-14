@extends('customer.layout.profile')

@section('content1')
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
                            Personal Profile
                        </h5>
                        <a href="{{ route('profile.edit', $user->id) }}" class="btn text-primary edit-btn col-2">
                            Edit
                        </a>
                    </div>
                    <div class="card-body mx-2 mb-0 ">
                        <div class="my-2 row">
                            <div class="col-6">
                                <small>Full name</small> <br>
                                <b style="color: #212121"> {{ $user->name }} </b>
                            </div>
                            <div class="col-6">
                                <small>Email Address</small> <br>
                                <b style="color: #212121"> {{ $user->email }} </b>
                            </div>
                        </div>

                        <div class="my-2 row">
                            <div class="col-6">
                                <small>Birthday</small> <br>
                                <b style="color: #212121">
                                    {{ $user->birthday ?? 'Please add your birthday' }}
                                </b>
                            </div>
                            <div class="col-6">
                                <small>Gender</small> <br>
                                <b style="color: #212121">
                                    {{ $user->gender ?? 'Please add your gender' }}
                                </b>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
