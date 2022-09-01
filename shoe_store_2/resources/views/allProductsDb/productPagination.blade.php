<table class="table table-striped">
    <thead>
        <tr>
            <th><input type="text" placeholder="Title" id="keyword"></th>
            <th><input type="text" placeholder="Style" id="keywordStyle"></th>
            <th><input type="text" placeholder="Color" id="keywordColor"></th>
            <th>Size</th>
            <th>Price</th>
        </tr>
    </thead>

    @foreach($product as $item)

    <tr>
        <td>{{$item->product_name}}</td>
        <td>{{$item->product_style}}</td>
        <td>{{$item->product_color}}</td>
        <td>{{$item->product_size}}</td>
        <td>{{$item->product_price}} lei</td>
        <td>
            <a href="{{route('product.images', $item->id)}}" class="btn btn-outline-dark">View</a>
        </td>
        <td>
            <form action="/product-delete" method="post">
                @csrf
                <input type="hidden" value="{{$item->id}}" name="id">
                <button class="btn btn-outline-danger">DEL</button>
            </form>
        </td>
        <td>
            <form action="/product-edit" method="POST">
                @csrf
                <input type="hidden" value="{{$item->id}}" name="id">
                <input type="hidden" value="{{$item->product_size}}" name="size">
                <button class="btn btn-outline-success">Edit</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

<div id="pagination">
    {{$product->links()}}
</div>

<div class="show">

</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>



<script type="text/javascript">
    $('#keyword').on('keyup', function() {
        let title = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search',
            data: {
                dataTitle: title
            },
            success: function(data) {
                if (data != '') {
                    let len = data.products.length;
                    let output = '';
                    for (let i = 0; i < len; i++) {
                        output += "<table class='table table-striped'>" +
                            '<tr>' +
                            "<td>" + data.products[i].product_name + "</td>" +
                            "<td>" + data.products[i].product_style + "</td>" +
                            "<td>" + data.products[i].product_color + "</td>" +
                            "<td>" + data.products[i].product_size + "</td>" +
                            "<td>" + data.products[i].product_price + "</td>" +
                            "<td>" +
                            " <a href='{{route('product.images', $item->id)}}' class='btn btn-outline-dark'>View</a>" +
                            "  </td>" +
                            "</table>";
                    }
                    $('.show').html(
                        output
                    );
                } else {
                    $('.show').empty();
                }
            }
        });
    })
</script>
<script  type="text/javascript"> 
$('#keywordStyle').on('keyup', function() {
        let style = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search',
            data: {
                dataStyle: style
            },
            success: function(data) {
                if (data != '') {
                    let len = data.productStyle.length;
                    let output = '';
                    for (let i = 0; i < len; i++) {
                        output += "<table class='table table-striped'>" +
                            '<tr>' +
                            "<td>" + data.productStyle[i].product_name + "</td>" +
                            "<td>" + data.productStyle[i].product_style + "</td>" +
                            "<td>" + data.productStyle[i].product_color + "</td>" +
                            "<td>" + data.productStyle[i].product_size + "</td>" +
                            "<td>" + data.productStyle[i].product_price + "</td>" +
                            "<td>" +
                            " <a href='{{route('product.images', $item->id)}}' class='btn btn-outline-dark'>View</a>" +
                            "  </td>" +
                            "</table>";
                    }
                    $('.show').html(
                        output
                    );
                } else {
                    $('.show').empty();
                }
            }
        });
    })</script>
<script  type="text/javascript"> 
$('#keywordColor').on('keyup', function() {
        let color = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search',
            data: {
                dataColor: color
            },
            success: function(data) {
                if (data != '') {
                    let len = data.productColor.length;
                    let output = '';
                    for (let i = 0; i < len; i++) {
                        output += "<table class='table table-striped'>" +
                            '<tr>' +
                            "<td>" + data.productColor[i].product_name + "</td>" +
                            "<td>" + data.productColor[i].product_style + "</td>" +
                            "<td>" + data.productColor[i].product_color + "</td>" +
                            "<td>" + data.productColor[i].product_size + "</td>" +
                            "<td>" + data.productColor[i].product_price + "</td>" +
                            "<td>" +
                            " <a href='{{route('product.images', $item->id)}}' class='btn btn-outline-dark'>View</a>" +
                            "  </td>" +
                            "</table>";
                    }
                    $('.show').html(
                        output
                    );
                } else {
                    $('.show').empty();
                }
            }
        });
    })</script>

