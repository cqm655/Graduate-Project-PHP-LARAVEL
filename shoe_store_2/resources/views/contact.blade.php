@extends('page.layout')
@section('content')

<section class="home-slider">
    <div class="bg-product">
        <div class="row" id="product">
            <div class="col-12" id="col-12" style="padding-right: 15px; padding-left: 15px;">
                <div class="page-header-content" style="text-align: center;">
                    <h2 class="product-title">Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<section class="form-send">
    <div class="container-contact">
    <div class="row contact-page-wrapper">
        <div class="col-xl-9" style="width: 100%; height: fit-content;">
            <div class="contact-form-wrap aos-init" data-aos="fade-right">
                <div class="contact-form-title">
                    <h2 class="title">
                        We Are Here!
                        <br>
                        Please Send A Quest
                    </h2>
                </div>
                <div class="contact-form" id="contact-form">
                    <form action="">
                         <div class="row row-gutter-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="email">
                                </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                    <textarea class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb--0">
                                    <button class="btn-theme">Send Message</button>
                                </div>
                            </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
     
    </div>
    </div>


</section>

@endsection