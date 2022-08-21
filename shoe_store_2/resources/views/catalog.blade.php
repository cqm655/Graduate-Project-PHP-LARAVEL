@extends('page.layout')
@section('content')

<section class="home-slider">
    <div class="bg-product">
        <div class="row" id="product">
            <div class="col-12" id="col-12" style="padding-right: 15px; padding-left: 15px;">
                <div class="page-header-content" style="text-align: center;">
                    <h2 class="product-title">PRODUCT PAGE</h2>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="product-area">
    <div class="container-product">
        <div class="row flex-xl-row-reverse justify-content-between">
            <div class="col-xl-9">
                <div class="row" id="row">

                </div>
            </div>
            <div class="col">
                <div class="shop-sidebar">
                    <div class="shop-sidebar-style">
                        <h4 class="sidebar-title">Shoe Style</h4>
                        <hr>
                        <div class="sidebar-category">
                            <ul class="category-list mb--0">
                                <li><a id="all" onclick="showCategory(this.id)" href="#">All</a></li>
                                <li><a id="formal" onclick="showCategory(this.id)" href="#">Formal</a></li>
                                <li><a id="casual" onclick="showCategory(this.id)" href="#">Casual</a></li>
                                <li><a id="athleisure" onclick="showCategory(this.id)" href="#">Athleisure</a></li>
                                <li><a id="outdoor" onclick="showCategory(this.id)" href="#">Outdor</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-sidebar-style">
                        <h4 class="sidebar-title">Shoe Color</h4>
                        <hr>
                        <div class="sidebar-category">
                            <ul class="category-list mb--0">
                                <a href="#" id="red" onclick="showCategory(this.id)"><span class="dot-red"></span></a>
                                <a href="#" id="white" onclick="showCategory(this.id)"><span class="dot-white"></span></a>
                                <a href="#" id="blue" onclick="showCategory(this.id)"><span class="dot-blue"></span></a>
                                <a href="#" id="brown" onclick="showCategory(this.id)"><span class="dot-brown"></span></a>
                                <a href="#" id="grey" onclick="showCategory(this.id)"><span class="dot-grey"></span></a>
                                <a href="#" id="black" onclick="showCategory(this.id)"><span class="dot-black"></span></a>
                            </ul>
                        </div>

                    </div>
                    <div class="shop-sidebar-style">
                        <h4 class="sidebar-title">Shoe Size</h4>
                        <hr>
                        <div class="sidebar-category">
                            <ul class="category-list mb--0">
                                <div class="square">
                                    <li><a href="#" id="40" onclick="showCategory(this.id)">40</a></li>
                                </div>
                                <div class="square">
                                    <li><a href="#" id="41" onclick="showCategory(this.id)">41</a></li>
                                </div>
                                <div class="square">
                                    <li><a href="#" id="42" onclick="showCategory(this.id)">42</a></li>
                                </div>
                                <div class="square">
                                    <li><a href="#" id="43" onclick="showCategory(this.id)">43</a></li>
                                </div>
                                <div class="square">
                                    <li><a href="#" id="44" onclick="showCategory(this.id)">44</a></li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-sidebar-style">
                        <h4 class="sidebar-title">Price</h4>
                        <hr>
                        <div class="sidebar-category">
                            <div class="d-flex">
                                <p style="margin-right: 5px;">From</p><input id="minPrice" type="text" max="5000" min="300" style="width: 60px;" size="4" maxlength="4">
                            </div>
                            <div class="d-flex">
                                <p style="margin-right: 27px;">To</p><input id="maxPrice" type="text" max="5000" min="300" style="width: 60px;" size="4" maxlength="4">
                            </div>
                        </div>
</section>

<!-- fetch and sort data using AJAX -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showCategory(e) {
        $('#row').empty();
        $.ajax({
            url: "/sort",
            type: "POST",
            data: {
                data: e
            },
            success: function(d) {

                let len = d.product.length;
                let lenImg = d.image.length;
                console.log(e.product)
                // function to select unique elements from image DB
                const uniqueElementsBy = (arr, fn) =>
                    arr.reduce((acc, v) => {
                        if (!acc.some(x => fn(v, x))) acc.push(v);
                        return acc;
                    }, []);

                let uniqID = uniqueElementsBy(
                    d.image,
                    (a, b) => a.product_id == b.product_id
                );


                let val = '';
                for (let i = 0; i < len; i++) {
                    for (let k = 0; k < uniqID.length; k++) {
                        if (d.product[i].id == uniqID[k].product_id) {
                            val = uniqID[k].image;
                            // create array so we can sort unique id`s

                            // Create card div for every product

                            let divCol = document.createElement('div');
                            divCol.className = "col-md-3";
                            let divProdItem = document.createElement('div');
                            divProdItem.className = "product-item";
                            let divCardContent = document.createElement('div');
                            divCardContent.className = "card-content";
                            let divProdContent = document.createElement('div');
                            divProdContent.className = "product-thumb";
                            let divProdInfo = document.createElement('div');
                            divProdInfo.className = "product-info";
                            // create image
                            let image = document.createElement('IMG');
                            // create the template of each product
                            $('#row').append(
                                divCol
                            )
                            $(divCol).append(
                                divProdItem
                            )
                            $(divProdItem).append(
                                divCardContent
                            )
                            $(divCardContent).append(
                                divProdContent
                            )
                            $(divCardContent).append(
                                divProdContent,
                                divProdInfo
                            )
                            $(divProdContent).append(
                                "<a href='/product-show/" + d.product[i].id + "'>" +
                                "<img class='image-thumbail' src='/storage/product_images/" + val + "'>" +
                                "</a>")
                            $(divProdInfo).append(
                                d.product[i].product_name + "<br>" +
                                d.product[i].product_price + " lei"
                            )
                        }
                    }
                }
            }
        })
    }
</script>
@endsection