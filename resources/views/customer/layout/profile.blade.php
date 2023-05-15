@extends('layouts.home')

@section('content')
    <div class="container ">

        <div class="row mt-4">
            <div class="block col-3">
                <div class="page-header">
                    <div class="">
                        <div class="page-header__title col-12">
                            <h4>Hello, <br>
                                {{ Auth::user()->name }}</h4>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="ttr-sidebar">
                        <div class="ttr-sidebar-wrapper content-scroll">

                            <!-- sidebar menu start -->
                            <nav class="ttr-sidebar-navi">
                                <ul class="profile-list">
                                    <li>
                                        <a href="/profile"
                                            class="ttr-material-button {{ request()->is('profile') ? 'text-primary' : '' }}">
                                            <span class="ttr-label">Manage My Account</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="{{ route('profile.profileData') }}"
                                                    class="ttr-material-button {{ request()->is('profileData') ? 'text-primary' : '' }}">
                                                    <span class="ttr-label">
                                                        My Profile
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('profile.addressBook') }}"
                                                    class="ttr-material-button {{ request()->is('addressBook') ? 'text-primary' : '' }}">
                                                    <span class="ttr-label">
                                                        Address Book
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="ttr-material-button">
                                            <span class="ttr-label">My Orders</span>
                                        </a>
                                        {{-- <ul>
                                            <li>
                                                <a href="basic-calendar.html" class="ttr-material-button">
                                                    <span class="ttr-label">
                                                        My Returns
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="list-view-calendar.html" class="ttr-material-button">
                                                    <span class="ttr-label">
                                                        My Cancellations
                                                    </span>
                                                </a>
                                            </li>
                                        </ul> --}}
                                    </li>
                                </ul>
                                <!-- sidebar menu end -->
                            </nav>
                            <!-- sidebar menu end -->
                        </div>
                    </div>


                </div>

            </div>
            <div class="block col-9">
                @yield('content1')
            </div>
        </div>

    </div>
@endsection
