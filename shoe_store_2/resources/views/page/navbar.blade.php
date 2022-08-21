<nav class="navbar navbar-light navbar-expand-lg " style="background-color:#fff ;">

    <a class="navbar-brand" style=" text-decoration: none; margin-left: 5%; color:#474747; font-style: italic;" href="/">Rosso</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
        <div class="navbar-nav" style="margin-left: 5%;">
            <div id="divMenuWrapper1" class="divMenuWrapper1 d-flex">

            </div>
        </div>

    </div>
    <!-- Login link -->
    <a href="/all-products" class="btn-login"> {{Auth::user()->name ?? 'LogIn' }} </a>
    <!-- add to cart btn -->
    <button class="button square m-1" id="openCart" onclick="document.getElementById('cartModal').style.display='block'" style="left: -20px;">
        <span class="mif-cart"></span>
        <span class="badge bg-red fg-white"></span>
    </button>
</nav>
<div class="container">
    <div class="nav-item">
        <div class="dropdown">
            <a class="dropdown-link" href="/" class="dropbtn">Home</a>
        </div>
        <div class="dropdown">
            <a class="dropdown-link" id="ball" onclick="showCategory(this.id)" href="/catalog" class="dropbtn">Barbati</a>
            <div class="dropdown-content">
                <a href="/catalog" id="bcasual" onclick="showCategory(this.id)">Casual</a>
                <a href="/catalog" id="bformal" onclick="showCategory(this.id)">Formal</a>
                <a href="/catalog" id="boutdoor" onclick="showCategory(this.id)">Outdoor</a>
                <a href="/catalog" id="bathleisure" onclick="showCategory(this.id)">Athleisure</a>
            </div>
        </div>
        <div class="dropdown"> 
            <a class="dropdown-link" onclick="showCategory(this.id)" id="fall" href="/catalog" class="dropbtn">Femei</a>
            <div class="dropdown-content">
                <a href="#file" id="fcasual" onclick="showCategory(this.id)">Casual</a>
                <a href="#edit" id="fformal" onclick="showCategory(this.id)">Formal</a>
                <a href="#edit" id="foutdoor" onclick="showCategory(this.id)">Outdoor</a>
                <a href="#edit" id="fathleisure" onclick="showCategory(this.id)">Athleisure</a>
            </div>
        </div>
        <div class="dropdown">
            <a class="dropdown-link" href="/about" class="dropbtn">About</a>
        </div>
    </div>
</div>

<!-- modal window Add To Cart -->
<div class="w3-container">
    <div id="cartModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container-header ">
                <span onclick="document.getElementById('cartModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h2 class="w3-title">Cart</h2>
            </header>
            <div class="w3-container">
                <table class="table">
                    <thead class="thead-grey ">
                        <tr>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Style</th>
                            <th scope="col">Product Color</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Size</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                        <tr>
                            <!-- content from ajax -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- buy cart form -->
<div class="container-payment" id="payment-modal">
    <div class="payment-content">

        <div class="container p-0">
            <span class="close">&times;</span>
            <div class="card px-4">
                <p class="h8 py-3">Payment Details</p>
                <div class="row gx-3">
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text-field mb-1">Person Name</p>
                            <input class="payment-form mb-3" type="text" placeholder="Name" value="Barry Allen">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text-field mb-1">Card Number</p>
                            <input class="payment-form mb-3" type="text" placeholder="1234 5678 435678">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text-field mb-1">Expiry</p>
                            <input class="payment-form mb-3" type="text" placeholder="MM/YYYY">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text-field mb-1">CVV/CVC</p>
                            <input class="payment-form mb-3 pt-2 " type="password" placeholder="***">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="btn btn-primary mb-3">
                            <div class="price d-flex" style="align-items: center;">
                                 <span class="ps-3" id="price"></span>
                                 <span class="ps-3" style="font-size: 16px;"><h4>lei</h4></span>
                            </div>
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- fetch data from DB -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#openCart').click(function() {

        $.get('/showcart', function(show) {

            let len = show['data'].length;
            $('.badge').text(len);
            console.log(len);
            $('#content').empty();
            let money = '';
            if (len > 0) {

                for (var i = 0; i < len; i++) {
                    var image = show['data'][i].image;
                    var name = show['data'][i].product_name;
                    var style = show['data'][i].product_style;
                    var color = show['data'][i].product_color;
                    var price = show['data'][i].product_price;
                    console.log(image);

                    var tr = "<tr>" +
                        "<td>" + "<img src='/storage/product_images/" + image + "' id='addToCartThumb' >" + "</td>" +
                        "<td>" + name + "</td>" +
                        "<td>" + style + "</td>" +
                        "<td>" + color + "</td>" +
                        "<td>" + price + " lei " + "</td>" +

                        "<td>" + "<select>" +
                        "<option value='40'>" + 40 + "</option>" +
                        "<option value='40'>" + 41 + "</option>" +
                        "<option value='40'>" + 42 + "</option>" +
                        "<option value='40'>" + 43 + "</option>" +
                        "<option value='44'>44</option>" + "</select>" +

                        "<td>" + "<a href='/deletecart/" + show['data'][i].id + "'class='btn btn-outline-secondary' '>" +
                        "<img src='/storage/icons/delete.png' id='addToCart' >" + "</a>" + "</td>" +
                        "<td>" + "<a href='#'class='btn btn-outline-success' '>" +
                        "<img src='/storage/icons/buy.png' id='buy' >" + "</a>" + "</td>" +
                        "</tr>" + "<br>";

                    $('#content').append(tr);
                    money = show['data'][i].product_price;

                }
                $('#price').text(money);
            }

            // Get the modal
            var modal = document.getElementById("payment-modal");

            // Get the button that opens the modal
            var btn = document.getElementById("buy");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            $('#buy').click(function() {
                modal.style.display = "block";
                document.getElementById('cartModal').style.display = "none";
            })
        })
    });
</script>
<script>
    // Get the modal
    var modal = document.getElementById("payment-modal");

    // Get the button that opens the modal
    var btn = document.getElementById("buy");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    $('#buy').click(function() {

    })
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<!-- nav bar link => catalog -->
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
            }
        })
    }
</script>