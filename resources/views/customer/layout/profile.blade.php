@extends('layouts.home')

@section('content')
    <div class="container ">

        <div class="row">
            <div class="block col-4">
                <div class="page-header">
                    <div class="page-header__container container">
                        <div class="page-header__title col-12">
                            <h4>Hello, Kaung Moe Set</h4>
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
                                        <a href="#" class="ttr-material-button">
                                            <span class="ttr-label">Manage My Account</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="mailbox.html" class="ttr-material-button">
                                                    <span class="ttr-label">
                                                        My Profile
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="mailbox-compose.html" class="ttr-material-button">
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
                                        <ul>
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
                                        </ul>
                                    </li>
                                </ul>
                                <!-- sidebar menu end -->
                            </nav>
                            <!-- sidebar menu end -->
                        </div>
                    </div>


                </div>

            </div>
            <div class="block col-7">
                @yield('content1')
            </div>
        </div>

    </div>
@endsection
