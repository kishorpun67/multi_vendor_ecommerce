
@extends('front.layout.layout')
@section('content')

<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Contact</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li class="is-marked">
                    <a href="{{route('contact')}}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Contact-Page -->
<div class="page-contact u-s-p-t-80">
    <div class="container">
        @if(Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <Strong>Error: {{Session::get('error_message')}}</Strong>
                <button type="button" class="close" data-dismiss='alert' aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <Strong>Success: {{Session::get('success_message')}}</Strong>
                <button type="button" class="close" data-dismiss='alert' aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="touch-wrapper">
                    <h1 class="contact-h1">Get In Touch With Us</h1>
                    <form method="post" action="{{route('contact')}}">
                        @csrf
                        <div class="group-inline u-s-m-b-30">
                            <div class="group-1 u-s-p-r-16">
                                <label for="contact_name">Your Name
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="contact_name" name="contact_name" class="text-field" placeholder="Name"
                                value="{{old('contact_name')}}">
                                @error('contact_name')
                                    <p  style="color: red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="group-2">
                                <label for="contac_email">Your Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="contact_email" name="contact_email" class="text-field" placeholder="Email"
                                value="{{old('contact_email')}}">
                                @error('contact_email')
                                    <p  style="color: red">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="contact_subject">Subject
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="contact_subject" name="contact_subject" class="text-field" placeholder="Subject"
                            value="{{old('contact_subject')}}">
                            @error('contact_subject')
                                <p  style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="contact_message">Message:</label>
                            <textarea class="text-area" id="contact_message" name="contact_message">{{old('contact_message')}}</textarea>
                            @error('contact_message')
                                <p  style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="u-s-m-b-30">
                            <button type="submit" class="button button-outline-secondary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="information-about-wrapper">
                    <h1 class="contact-h1">Information About Us</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, tempora, voluptate. Architecto aspernatur, culpa cupiditate deserunt dolore eos facere in, incidunt omnis quae quam quos, similique sunt tempore vel vero.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, tempora, voluptate. Architecto aspernatur, culpa cupiditate deserunt dolore eos facere in, incidunt omnis quae quam quos, similique sunt tempore vel vero.
                    </p>
                </div>
                <div class="contact-us-wrapper">
                    <h1 class="contact-h1">Contact Us</h1>
                    <div class="contact-material u-s-m-b-16">
                        <h6>Location</h6>
                        <span>4441 Jett Lane</span>
                        <span>Bellflower, CA 90706</span>
                    </div>
                    <div class="contact-material u-s-m-b-16">
                        <h6>Email</h6>
                        <span>info@sitemakers.in</span>
                    </div>
                    <div class="contact-material u-s-m-b-16">
                        <h6>Telephone</h6>
                        <span>+111-222-333</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="u-s-p-t-80">
        <div id="map"></div>
    </div>
</div>
@endsection