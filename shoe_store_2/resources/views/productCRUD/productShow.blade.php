@extends('page.layout')
@section('content')

<section class="home-slider">
<div class="bg-product">
       <div class="row" id="product">
        <div class="col-12" id="col-12"  style="padding-right: 15px; padding-left: 15px;">
            <div class="page-header-content" style="text-align: center;">
                 <h2 class="product-title">PRODUCT DETAILS</h2>
            </div>
        </div>
       </div>
        </div>
    </div>
</section>

<hr>

@foreach($images1 as $image1)
@endforeach
@foreach($images2 as $image2)
@endforeach
@foreach($images3 as $image3)
@endforeach
@foreach($images4 as $image4)
@endforeach

<div class="container justify-content-center">
    <div class="row">
        <div class="col-sm-3">
            <div class="column-img">
                <img id="img-fit" src="/storage/product_images/{{$image1->image}}" onclick="myFunction(this);">
            </div>
            <div class="column-img">
                <img id="img-fit" src="/storage/product_images/{{$image2->image}}" onclick="myFunction(this);">
            </div>
            <div class="column-img">
                <img id="img-fit" src="/storage/product_images/{{$image3->image}}" onclick="myFunction(this);">
            </div>
            <div class="column-img">
                <img id="img-fit" src="/storage/product_images/{{$image4->image}}" onclick="myFunction(this);">
            </div>
        </div>
        <div class="col">
            <div class="row">
                <!-- Expanded image -->
                <img id="expandedImg" src="/storage/product_images/{{$image1->image}}" onclick="myFunction(this);">
            </div>
        </div>
        <div class="col-sm">
            <form action="/addToCart" method="POST">
                @csrf
                <h3>{{$product->product_name}}</h3>
                <hr>
                <br>
                <h6>{{$product->product_description}}</h6>
                <br>
                <h4>{{$product->product_price}} lei</h4>
                <hr>
                <h6>STIL: @php echo ucfirst("{$product->product_style}"); @endphp</h6> <!-- Uppercase fisrt letter -->
                <hr>
                <h6>Marimi:
                    @foreach($size as $i )
                    @php
                    $value = json_decode($i);
                    echo $value;
                    @endphp

                    @endforeach
                   
                </h6>
                <hr>
                <div class="container d-flex" style="padding: 0;">
                    <div class="col-md-4" style="margin-top: 15px;">
                        <h6 style="margin-top: 15px;">Add To Cart:</h6>
                    </div>
                    <div class="col">
                        <!-- send form -->
                        <form id="form-cart" method="post" action="javascript:void(0)">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" id="id">
                            <a id="cart" class="btn btn-outline-secondary"><img src="/storage/icons/addToCart.jpg" id="addToCart"></a>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>



<!-- Cart call method -->

<!-- expand image for view -->
<script>
    function myFunction(imgs) {
        // Get the expanded image
        var expandImg = document.getElementById("expandedImg");
        // Get the image text
        var imgText = document.getElementById("imgtext");
        // Use the same src in the expanded image as the image being clicked on from the grid
        expandImg.src = imgs.src;
        // Use the value of the alt attribute of the clickable image as text inside the expanded image
        imgText.innerHTML = imgs.alt;
        // Show the container element (hidden with CSS)
        expandImg.parentElement.style.display = "block";
    }
</script>

<!-- add to card badge number/info in DB -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let i = 0;
    $('#cart').click(function() {
        i++;
        $('.badge').text(i);

        id = $('#id').val();

        $.ajax({
            url: "/addcart",
            type: "POST",
            data: {
                id: id,
            }
        })
    });
</script>


@endsection