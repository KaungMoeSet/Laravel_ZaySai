@extends('layouts.home')

@section('content')
<div class="block">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex my-3">
                <div class="card flex-grow-1 mb-md-0">
                    <div class="card-body">
                        <h3 class="card-title">Login</h3>
                        <form>
                            <div class="form-group"><label>Email address</label> <input type="email" class="form-control" placeholder="Enter email"></div>
                            <div class="form-group"><label>Password</label> <input type="password" class="form-control" placeholder="Password"> <small class="form-text text-muted"><a href="#">Forgotten Password</a></small>
                            </div>
                            <div class="form-group">
                                <div class="form-check"><span class="form-check-input input-check"><span class="input-check__body"><input class="input-check__input" type="checkbox" id="login-remember"> <span class="input-check__box"></span> <svg class="input-check__icon" width="9px" height="7px">
                                                <use xlink:href="images/sprite.svg#check-9x7"></use>
                                            </svg> </span></span><label class="form-check-label" for="login-remember">Remember Me</label></div>
                            </div><button type="submit" class="btn btn-primary my-2 px-5">Login</button>
                        </form>
                        <div>
                            <span>Don't have an account? <a href="/register">Sign Up</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
