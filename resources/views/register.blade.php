@extends('layouts.home')

@section('content')
<div class="block">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex my-3">
                <div class="card flex-grow-1 mb-0">
                    <div class="card-body">
                        <h3 class="card-title">Register</h3>
                        <form>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary my-2 px-5">Register</button>
                        </form>
                        <div>
                            <span>Already have an account? <a href="/login">Log in</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
