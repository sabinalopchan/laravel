
@extends('frontend.master.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="title-c"><p><a href="{{route('index')}}">Home /</a> Contact Us</p></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach($contactData as $contact)
                    <div class="col-md-4 right-c">
                        <h4 ><i class="fa fa-home">&ensp;{{$contact->name}}</i></h4>
                        <p><i class="fa fa-map-marker">&ensp;{{$contact->location}}</i></p>
                        <p><i class="fa fa-envelope">&ensp;{{$contact->email}}</i></p>
                        <p><i class="fa fa-phone">&ensp;{{$contact->telephone}}</i></p>
                       <p> <i class="fa fa-mobile-phone">&ensp;{{$contact->mobile}}</i>
                    </div>
                    @endforeach
                    <div class="col-md-8 contact-m">
                        <div class="row">
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                        </div>
                        </div>
                        <form action="contact_user" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 contact-u">
                                <input type="text" name="name" id="name" placeholder="Your Name" class="form-control">
                                </div>
                                <div class="col-md-6 contact-u">
                                <input type="text" name="company" id="company" placeholder="Company name" class="form-control">
                                </div>
                            </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 contact-u">
                                        <input type="email" name="email" id="email" placeholder="Your Email" class="form-control">
                                    </div>
                                    <div class="col-md-6 contact-u">
                                        <input type="phone" name="phone" id="phone" placeholder="Your Phone No." class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <textarea name="details" id="details" cols="90" rows="5" placeholder="Your Message" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Send</button>
                             </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
