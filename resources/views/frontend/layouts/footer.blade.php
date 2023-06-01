@section('footer')
    <!-- footer -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 footer-menu">
                            <ul>
                                <li>Contact us
                                    @foreach($contactData as $contact)
                                    <ul>
                                        <li><i class="fa fa-map-marker"></i>{{$contact->location}}</li>
                                        <li><i class="fa fa-envelope"></i>{{$contact->email}}</li>
                                        <li><i class="fa fa-phone">&ensp;{{$contact->telephone}}&ensp;/&ensp;{{$contact->mobile}}</i></li>
                                    </ul>
                                    @endforeach
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-4 footer-menu">
                            <ul>
                                <li>Links
                                    <ul>
                                        <li><a href="{{route('about')}}">about</a></li>
                                        <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                                        <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                                        <li>
                                            <a href="https://www.facebook.com/search/top?q=unique%20creations%20nepal%20exports"><i class="fa fa-facebook-f"></i>&ensp;&ensp;</a>
                                            <a href="https://www.facebook.com/Unique-creations-nepal-exports-2099771103464814/"><i class="fa fa-instagram"></i>&ensp;&ensp;</a>
                                            <a href="https://www.twitter.com/"><i class="fa fa-twitter"></i>&ensp;&ensp;</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 footer-menu">
                            <ul>
                                @foreach($contactData as $contact)
                                <li>{{$contact->name}}
                                    <ul>
                                        @foreach($aboutData as $about)
                                        <li>At Unique clothing we are known for creating the modern hemp backpacks that are now available in profusion of design and colors. Each backpack is made from 100% hemp materials and it is beautifully handcrafted in Nepal, they are high quality and this backpack has everything you need. </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ftr">
        <div class="row">
            <div class="col-md-12 footer-btn">
                <p>©2021 Copyright ucnep All rights reserved. <br>
                Designed & Developed By Sabina Tamang </p>
            </div>
        </div>
    </div>
    <!-- / footer -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('frontend-ui/assets/js/bootstrap.js')}}"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="{{asset('frontend-ui/assets/js/jquery.smartmenus.js')}}"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="{{asset('frontend-ui/assets/js/jquery.smartmenus.bootstrap.js')}}"></script>
    <!-- To Slider JS -->
    <script src="{{asset('frontend-ui/assets/js/sequence.js')}}"></script>
    <script src="{{asset('frontend-ui/assets/js/sequence-theme.modern-slide-in.js')}}"></script>
    <!-- Product view slider -->
    <script type="text/javascript" src="{{asset('frontend-ui/assets/js/jquery.simpleGallery.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend-ui/assets/js/jquery.simpleLens.js')}}"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="{{asset('frontend-ui/assets/js/slick.js')}}"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="{{asset('pfrontend-ui/assets/js/nouislider.js')}}"></script>
    <!-- Custom js -->
    <script src="{{asset('frontend-ui/assets/js/custom.js')}}"></script>
    <script src="{{asset('frontend-ui/assets/js/jquery.js')}}"></script>
    <script src="{{asset('pfrontend-ui/assets/js/zoomsl.min.js')}}"></script>
    <script>
        $(document).ready(function (init){
            $('.small-image img').click(function(){
                var image= $(this).attr('src');
                $('.big-image img').attr('src',image);
            });
            $('#zoom').imagezoomsl({
                zoomrange: [2,4]
            });
        });
        // $(document).ready(function myFunction(x){
        //
        //     if (x.matches){
        //         $('.small-image img').click(function(){
        //                     var image= $(this).attr('src');
        //                     $('.big-image img').attr('src',image);
        //                 });
        //                 $('#zoom').imagezoomsl({
        //                     zoomrange: [2,4]
        //                 });
        //     }
        //     else {
        //         $('.small-image img').click(function(){
        //             var image= $(this).attr('src');
        //             $('.big-image img').attr('src',image);
        //         });
        //         // $('#zoom').imagezoomsl({
        //         //     zoomrange: [0,0]
        //         // });
        //     }
        // });
        // var x = window.matchMedia("(min-width: 700px)")
        // myFunction(x)
        // x.addListener(myFunction)

    </script>

    </body>
    </html>

@endsection
