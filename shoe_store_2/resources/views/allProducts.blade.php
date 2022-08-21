@extends('page.layout')
@section('content')

<section class="home-slider">

    <div class="bg ">
        <div class="slider-container">
            <div class="row justify-content-between align">
                <div class="row-lg-5">
                    <p  style="font-size: 58px;" data-aos="fade-right"data-aos-duration="10000">EXCLUSIVE</p>
                    <p style="font-size: 64px; font-style: sans sherif;" data-aos="fade-right" data-aos-duration="1000">NEW SHOES</p>
                </div>
                <div class="row-lg-5">
                    <a href="#" class="btn-slider btn-outline-danger" style="color: #fff;">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="product-category mt-md-30">
                    <div class="inner-content">
                        <img src="/background_img/1.jpg" id="img-thumbail">
                        <div class="content-text">
                            <div id="thumb-text">New Arrival</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="product-category mt-md-30">
                    <div class="inner-content">
                        <img src="/background_img/4.jpg" id="img-thumbail">
                        <div class="content-text">
                            <span>Sale 50% Off</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="product-category mt-md-30">
                    <div class="inner-content">
                        <img src="/background_img/3.jpg" id="img-thumbail">
                        <div class="content-text">
                            <span>Best Offer!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="ml15">
                    <span class="word">Out</span>
                    <span class="word">now</span>
                </h1>
                <div class="description">
                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem voluptate veniam, eum, dolorum assumenda magnam facilis quis exercitationem dolores sapiente vitae tempora dolore quisquam sunt architecto aliquid eos est incidunt.</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="product-item">
                    <div class="card-content">
                        <div class="product-thumb">
                            <a href="/product-show/{{$products[0]->id}}"> <img id="img-thumbail" src="/storage/product_images/{{$products[0]->images[0]->image}}" style="width: 270px; height:270px" alt=""></a>
                            <div class="add-to-cart">
                                <a href="#">
                                    <!-- add to cart -->

                                    <input type="hidden" value="{{$products[0]->id}}" id="id">
                                    <a id="cart" onclick="addToCart(this.id)" class="btn btn-outline-secondary"><img src="/storage/icons/addToCart.jpg" id="addToCart"></a>

                                    <!-- end add to cart -->
                                </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 style="color: grey;">{{$products[0]->gender}}</h3>
                            <h3 style="font-weight: bold;"> {{$products[0]->product_name}}</h3>
                            <h3 style="color: grey; margin:0">{{$products[0]->product_price}} lei</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="product-item">
                    <div class="card-content">
                        <div class="product-thumb">
                            <a href="/product-show/{{$products[1]->id}}"> <img id="img-thumbail" src="/storage/product_images/{{$products[1]->images[0]->image}}" style="width: 270px; height:270px" alt=""></a>
                            <div class="add-to-cart">
                                <a href="#">
                                    <!-- add to cart -->

                                    <input type="hidden" value="{{$products[1]->id}}" id="id1">
                                    <a id="cart1" onclick="addToCart(this.id)" class="btn btn-outline-secondary"><img src="/storage/icons/addToCart.jpg" id="addToCart"></a>

                                    <!-- end add to cart -->
                                </a>
                            </div>

                        </div>
                        <div class="product-info">
                            <h3 style="color: grey;">{{$products[1]->gender}}</h3>
                            <h3 style="font-weight: bold;"> {{$products[1]->product_name}}</h3>
                            <h3 style="color: grey; margin:0">{{$products[1]->product_price}} lei</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="product-item">
                    <div class="card-content">
                        <div class="product-thumb">
                            <a href="/product-show/{{$products[2]->id}}"> <img id="img-thumbail" src="/storage/product_images/{{$products[2]->images[0]->image}}" style="width: 270px; height:270px" alt=""></a>
                            <div class="add-to-cart">
                                <a href="#">
                                    <!-- add to cart -->

                                    <input type="hidden" value="{{$products[2]->id}}" id="id2">
                                    <a id="cart2" onclick="addToCart(this.id)" class="btn btn-outline-secondary"><img src="/storage/icons/addToCart.jpg" id="addToCart"></a>

                                    <!-- end add to cart -->
                                </a>
                            </div>

                        </div>
                        <div class="product-info">
                            <h3 style="color: grey;">{{$products[2]->gender}}</h3>
                            <h3 style="font-weight: bold;"> {{$products[2]->product_name}}</h3>
                            <h3 style="color: grey; margin:0">{{$products[2]->product_price}} lei</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="product-item">
                    <div class="card-content">
                        <div class="product-thumb">
                            <a href="/product-show/{{$products[3]->id}}"> <img id="img-thumbail" src="/storage/product_images/{{$products[3]->images[0]->image}}" style="width: 270px; height:270px" alt=""></a>
                            <div class="add-to-cart">
                                <a href="#">
                                    <!-- add to cart -->

                                    <input type="hidden" value="{{$products[3]->id}}" id="id3">
                                    <a id="cart3" onclick="addToCart(this.id)" class="btn btn-outline-secondary"><img src="/storage/icons/addToCart.jpg" id="addToCart"></a>

                                    <!-- end add to cart -->
                                </a>
                            </div>

                        </div>
                        <div class="product-info">
                            <h3 style="color: grey;">{{$products[3]->gender}}</h3>
                            <h3 style="font-weight: bold;"> {{$products[3]->product_name}}</h3>
                            <h3 style="color: grey; margin:0">{{$products[3]->product_price}} lei</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="product-item">
                    <div class="card-content">
                        <div class="product-thumb">
                            <a href="/product-show/{{$products[4]->id}}"> <img id="img-thumbail" src="/storage/product_images/{{$products[4]->images[0]->image}}" style="width: 270px; height:270px" alt=""></a>
                            <div class="add-to-cart">
                                <a href="#">
                                    <!-- add to cart -->

                                    <input type="hidden" value="{{$products[4]->id}}" id="id4">
                                    <a id="cart4" onclick="addToCart(this.id)" class="btn btn-outline-secondary"><img src="/storage/icons/addToCart.jpg" id="addToCart"></a>

                                    <!-- end add to cart -->
                                </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 style="color: grey;">{{$products[4]->gender}}</h3>
                            <h3 style="font-weight: bold;"> {{$products[4]->product_name}}</h3>
                            <h3 style="color: grey; margin:0">{{$products[4]->product_price}} lei</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="product-item">
                    <div class="card-content">
                        <div class="product-thumb">
                            <a href="/product-show/{{$products[5]->id}}"> <img id="img-thumbail" src="/storage/product_images/{{$products[5]->images[0]->image}}" style="width: 270px; height:270px" alt=""></a>
                            <div class="add-to-cart">
                                <a href="#">
                                    <!-- add to cart -->

                                    <input type="hidden" value="{{$products[5]->id}}" id="id5">
                                    <a onclick="addToCart(this.id)" id="cart5 " class="btn btn-outline-secondary"><img src="/storage/icons/addToCart.jpg" id="addToCart"></a>

                                    <!-- end add to cart -->
                                </a>
                            </div>

                        </div>
                        <div class="product-info">
                            <h3 style="color: grey;">{{$products[5]->gender}}</h3>
                            <h3 style="font-weight: bold;"> {{$products[5]->product_name}}</h3>
                            <h3 style="color: grey; margin:0">{{$products[5]->product_price}} lei</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="product-item">
                    <div class="card-content">
                        <div class="product-thumb">
                            <a href="/product-show/{{$products[6]->id}}"> <img id="img-thumbail" src="/storage/product_images/{{$products[6]->images[0]->image}}" style="width: 270px; height:270px" alt=""></a>
                            <div class="add-to-cart">
                                <a href="#">
                                    <!-- add to cart -->

                                    <input type="hidden" value="{{$products[6]->id}}" id="id6">
                                    <a onclick="addToCart(this.id)" id="cart6" class="btn btn-outline-secondary"><img src="/storage/icons/addToCart.jpg" id="addToCart"></a>

                                    <!-- end add to cart -->
                                </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 style="color: grey;">{{$products[6]->gender}}</h3>
                            <h3 style="font-weight: bold;"> {{$products[6]->product_name}}</h3>
                            <h3 style="color: grey; margin:0">{{$products[6]->product_price}} lei</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="product-item">
                    <div class="card-content">
                        <div class="product-thumb">
                            <a href="/product-show/{{$products[7]->id}}"> <img id="img-thumbail" src="/storage/product_images/{{$products[7]->images[0]->image}}" style="width: 270px; height:270px" alt=""></a>

                            <div class="add-to-cart">
                                <a href="#">
                                    <!-- add to cart -->
                                    <input type="hidden" value="{{$products[7]->id}}" id="id7">
                                    <a onclick="addToCart(this.id)" id="cart7" class="btn btn-outline-secondary"><img src="/storage/icons/addToCart.jpg" id="addToCart"></a>
                                    <!-- end add to cart -->
                                </a>
                            </div>

                        </div>
                        <div class="product-info">
                            <h3 style="color: grey;">{{$products[7]->gender}}</h3>
                            <h3 style="font-weight: bold;"> {{$products[7]->product_name}}</h3>
                            <h3 style="color: grey; margin:0">{{$products[7]->product_price}} lei</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section style="display: flex;">
<section class="feature-area">
    <div class="container pb--0">
        <div class="row">
            <div class="col-12" style="flex: 0 0 auto; width:100%">
                <div class="feature-content-box">
                    <div class="feature-box-wrap">
                        <div class="col-item">
                            <div class="feature-icon-box" id="icon-box">
                                <img src="/storage/icons/delivery.png" alt="" id="icon-img">
                                <div class="content">
                                    <h5 class="title">Free Home Delivery</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-item">
                            <div class="feature-icon-box" id="icon-box">
                                <img src="/storage/icons/wallet.png" alt="" id="icon-img">
                                <div class="content">
                                    <h5 class="title">Secure Payment</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-item">
                            <div class="feature-icon-box" id="icon-box">
                                <img src="/storage/icons/discount.png" alt="" id="icon-img">
                                <div class="content">
                                    <h5 class="title">Order Discount</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-item">
                            <div class="feature-icon-box" id="icon-box">
                                <img src="/storage/icons/support.png" alt="" id="icon-img">
                                <div class="content">
                                    <h5 class="title">Online Support</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shape-group-style"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<!-- add to cart -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //count data entries in DB and return in view, addToCart icon badge
    $(document).ready(function() {
        $.ajax({
            url: "/count",
            type: "get",
            success: function(data) {

                $('.badge').text(data);
            }
        })
    })

    let i = '';

    function addToCart(idCart) {
        let id = '';
        console.log(idCart)
        switch (idCart) {
            case 'cart':
                id = $('#id').val();
                break;
            case 'cart1':
                id = $('#id1').val();
                break;
            case 'cart2':
                id = $('#id2').val();
                break;
            case 'cart3':
                id = $('#id3').val();
                break;
            case 'cart4':
                id = $('#id4').val();
                break;
            case 'cart5':
                id = $('#id5').val();
                break;
            case 'cart6':
                id = $('#id6').val();
                break;
            case 'cart7':
                id = $('#id7').val();
                break;
        }
        i++;
        $('.badge').text(i);

        $.ajax({
            url: "/addcart",
            type: "POST",
            data: {
                id: id
            }
        })
    }
</script>

<!-- wrap every letter -->
<script>
    var textWrapper = document.querySelector('.ml12');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({
            loop: true
        })
        .add({
            targets: '.ml12 .letter',
            translateX: [40, 0],
            translateZ: 0,
            opacity: [0, 1],
            easing: "easeOutExpo",
            duration: 1200,
            delay: (el, i) => 500 + 30 * i
        }).add({
            targets: '.ml12 .letter',
            translateX: [0, -30],
            opacity: [1, 0],
            easing: "easeInExpo",
            duration: 1100,
            delay: (el, i) => 100 + 30 * i
        });
</script>

<script>
    anime.timeline({
            loop: true
        })
        .add({
            targets: '.ml15 .word',
            scale: [14, 1],
            opacity: [0, 1],
            easing: "easeOutCirc",
            duration: 800,
            delay: (el, i) => 800 * i
        }).add({
            targets: '.ml15',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
</script>

<
@endsection