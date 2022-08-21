@extends('page.layout')
@section('content')

<section class="home-slider">
    <div class="bg-product">
        <div class="row" id="product">
            <div class="col-12" id="col-12" style="padding-right: 15px; padding-left: 15px;">
                <div class="page-header-content" style="text-align: center;">
                    <h2 class="product-title">About Us</h2>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<section class="about-area">
    <div class="container-about">
        <div class="about-item position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-thumb">
                        <div class="shape-one scene">
                            <span class="scene-layer" data-depth=".2">
                                  <img src="/storage/icons/about.png" width="570px" height="368px" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h4 class="sub-title">Smart Life</h4>
                        <h3 class="title">With Smart Shoes</h3>
                        <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, hic tenetur aut incidunt quaerat facere dicta quasi eos consectetur nisi temporibus unde assumenda voluptate illo rem natus maiores odio inventore.</p>
                   <a href="/contact" class="btn-theme">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection