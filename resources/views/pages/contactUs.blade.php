@extends('layouts.home')

@section('content')
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__title">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="card mb-0 contact-us">
                <div class="contact-us__map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.0245574801747!2d96.15882017034897!3d16.77545378483343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ec8878f9ecd5%3A0x2e58c3ed619da054!2sCentrino!5e0!3m2!1smy!2smm!4v1681479811240!5m2!1smy!2smm"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="card-body">
                    <div class="contact-us__container">
                        <div class="row">
                            <div class="col-12 col-lg-12 pb-4 pb-lg-0">
                                <h4 class="contact-us__header card-title">Our Address</h4>
                                <div class="contact-us__address">
                                    <p>39St. Kyauktada, No.189, Yangon, Myanmar<br>
                                        Email: <a href="mailto:kaungmoeset@gmail.com"
                                            style="color: inherit">kaungmoeset@gmail.com</a><br>
                                        Phone Number: <a href="tel:+95-9955667645" style="color: inherit">+95-9955667645</a>
                                    </p>
                                    <p>
                                        <strong>Opening Hours</strong><br>
                                        Mon-Sun 8:00am - 8:00pm<br>
                                    <p><strong>Comment</strong><br>
                                        You can buy India snacks and clothes.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
