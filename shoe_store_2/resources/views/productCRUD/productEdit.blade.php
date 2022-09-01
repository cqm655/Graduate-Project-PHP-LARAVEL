@extends('layouts.app') 
@section('content')


<div class="row justify-content-between">
    <div class=" col-md-4 d-flex justify-content-center" id="addProduct">
        <form action="/product-update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" form-group">
                <label for="title" class="mt-2">Product Title</label>
                <input type="text" class="form-control" name="title" required placeholder="Enter product title" value="{{$product->product_name}}"><br>
            </div>

            <div class="form-group">
                <label for="style" class="mt-2" >Style</label><br>
                <select name="style" id="type">
                    <!-- set selected option from productCreate.blade -->
                    <option value="{{$product->product_style}}" selected>{{$product->product_style}}</option>
                    <!-- the rest of options -->
                    <option value="athleisure">Athleisure</option>
                    <option value="casual">Casual</option>
                    <option value="outdoor">Outdoor</option>
                    <option value="formal">Formal</option>
                </select><br>
            </div>
            <div class="form-group">
                <label class="mt-2">Color</label><br>
                <select name="color" id="color">
                    <option value="{{$product->product_color}}" selected>{{$product->product_color}}</option>
                    <option value="black">Black</option>
                    <option value="blue">Blue</option>
                    <option value="brown">Brown</option>
                    <option value="white">White</option>
                    <option value="grey">Grey</option>
                    <option value="yellow">Yellow</option>
                    <option value="red">Red</option>
                </select><br>
            </div>
            <div class="form-group">
                <label class="mt-2">Size</label><br>
                <div class="container size-name d-flex" id="size">
                    <label for="" style="margin-right: 20px;">40</label>
                    <label for="" style="margin-right: 20px;">41</label>
                    <label for="" style="margin-right: 20px;">42</label>
                    <label for="" style="margin-right: 20px;">43</label>
                    <label for="" style="margin-right: 20px;">44</label>
                </div>
                <div class="container d-flex">
                    <div class="div-btn-check" style="display: flex;">
                        <select name="s40" id="" style="margin-right: 5px;">
                            <option value="{{$size40}}" selected>{{$size40}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="s41" id="" style="margin-right: 5px;">
                            <option value="{{$size41}}" selected>{{$size41}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="s42" id="" style="margin-right: 5px;">
                            <option value="{{$size42}}" selected>{{$size42}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="s43" id="" style="margin-right: 5px;">
                            <option value="{{$size43}}" selected>{{$size43}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="s44" id="">
                            <option value="{{$size44}}" selected>{{$size44}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="mt-2">Gender</label><br>
                <div class="div-btn-check" style="display: flex;">
                    <select name="gender" id="">
                        <option value="{{$product->gender}}" selected>{{$product->gender}}</option>
                        <option value="male">Barbati</option>
                        <option value="female">Femei</option>
                        <option value="other">Altii</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="product_container" style="width:100px ;">
                <label class="mt-2">Price</label>
                <input value="{{$product->product_price}}" type="number" class="form-control " name="price"  placeholder="Price"><br>
            </div>
            <div class="form-control">
                <label>Description</label>
                <input value="{{$product->product_description}}" type="text" class="form-control" name="description" required placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="files" class="form-label mt-2">Upload Images:</label>
                <input type="file" id="image" name="images[]" class="form-control" multiple accept="image/*">
            </div>
            <div class="mt-4">
                <input type="hidden" value="{{$product->id}}" name="id">
                <button type="submit" class="btn btn-primary">Save Product</button>
            </div>
        </form>
    </div>


    <!-- Preview images from DB, if they are -->
    <div class="col-lg-6">
        <div class="preview" >
            @if(empty($image) )
            @else
            <div style="display:flex;">
                 <div ><img id="img-fit-edit" src="/storage/product_images/{{$image[0]->image}}" style="width:300px; height:300px" alt=""></div>
                 <div><img id="img-fit-edit" src="/storage/product_images/{{$image[1]->image}}" style="width:300px; height:300px"  alt=""></div>
            </div>
           <div style="display: flex;">
              <div ><img id="img-fit-edit" src="/storage/product_images/{{$image[2]->image}}" style="width:300px; height:300px"  alt=""></div>
            @endif
            @if(empty($image[3]) )
            @else
            <div><img id="img-fit-edit" src="/storage/product_images/{{$image[3]->image}}" style="width:300px; height:300px"  alt=""></div>
            @endif
           </div>
          
        </div>
    </div>
</div>
<!-- preview image -->
<script type="text/javascript">
    function previewImages() {
        var $preview = $('.preview').empty();
        if (this.files) $.each(this.files, readAndPreview);
        function readAndPreview(i, file) {
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } // else...
            var reader = new FileReader();
            $(reader).on("load", function() {
                let div = document.createElement("div");

                $preview.append($("<img/>", {
                    src: this.result,
                    height: 300
                }));
            });
            reader.readAsDataURL(file);
        }
    }
    $('#file-input').on("change", previewImages);
    document.querySelector('#image').addEventListener("change", previewImages);
</script>


@endsection