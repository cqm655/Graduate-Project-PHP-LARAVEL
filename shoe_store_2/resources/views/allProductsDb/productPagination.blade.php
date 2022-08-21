<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Style</th>
            <th>Color</th>
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