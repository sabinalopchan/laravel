
@section('top-header')


<!-- ====================top-header========================= -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 left-header">
                        @foreach($contactData as $contact)
                        <div class="item1">
                            <i class="fa fa-phone"></i>&ensp;&ensp;{{$contact->mobile}}&ensp;&ensp;&ensp;&ensp;
                            <i class="fa fa-envelope"></i>&ensp;&ensp;{{$contact->email}}
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-3 col-md- 3 col-sm-3 right-header">
                        <div class="icon">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            <a href="https://www.facebook.com/search/top?q=unique%20creations%20nepal%20exports"></i>&ensp;&ensp;</a>
                            <a href="https://www.facebook.com/Unique-creations-nepal-exports-2099771103464814/"><i class="fa fa-instagram"></i>&ensp;</a>
                            <a href="https://www.twitter.com/"><i class="fa fa-twitter"></i>&ensp;&ensp;</a>
                            <a href="https://www.whatsapp.com/"><i class="fa fa-whatsapp"></i>&ensp;</a>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
