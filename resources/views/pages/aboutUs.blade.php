@extends('layouts.home')

@section('content')
    <div class="block about-us">
        <div class="about-us__image"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="about-us__body">
                        <h1 class="about-us__title">About Us</h1>
                        <div class="about-us__text typography">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacus metus,
                                convallis ut leo nec, tincidunt eleifend justo. Ut felis orci, hendrerit a
                                pulvinar et, gravida ac lorem. Sed vitae molestie sapien, at sollicitudin
                                tortor.</p>
                            <p>Duis id volutpat libero, id vestibulum purus.Donec euismod accumsan felis,egestas
                                lobortis velit tempor vitae. Integer eget velit fermentum, dignissim odio non,
                                bibendum velit.</p>
                        </div>
                        <div class="about-us__team">
                            <h2 class="about-us__team-title">Meat Our Team</h2>
                            <div class="about-us__team-subtitle text-muted">Want to work in our friendly
                                team?<br><a href="/contactUs">Contact us</a> and we will consider your
                                candidacy.</div>
                            <div class="about-us__teammates teammates">
                                <div class="owl-carousel">
                                    <div class="teammates__item teammate">
                                        <div class="teammate__name">Kaung Moe Set</div>
                                        <div class="teammate__position text-muted">Chief Executive Officer</div>
                                    </div>
                                    <div class="teammates__item teammate">
                                        <div class="teammate__name">Kaung Kaung</div>
                                        <div class="teammate__position text-muted">Marketing Officer</div>
                                    </div>
                                    <div class="teammates__item teammate">
                                        <div class="teammate__name">Moe Set</div>
                                        <div class="teammate__position text-muted">Finance Director</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
