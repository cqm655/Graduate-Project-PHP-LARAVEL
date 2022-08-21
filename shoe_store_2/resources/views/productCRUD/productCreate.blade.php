@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('app.css')}}">


<div class="row justify-content-between">
    @if(session('success'))
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Success!</h4>
        <p class="mb-0">New product added successfully</p>
    </div>
    @elseif(session('deleted'))
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Deleted!</h4>
        <p class="mb-0">Product deleted successfully</p>
    </div>
    @endif
    <div class=" col-md-4" id="addProduct">
        <h3>Add Product</h3>
        <form action="/add-product" method="post" enctype="multipart/form-data">

            @csrf
            <div class=" form-group">
                <label for="title" class="mt-2">Product Title</label>
                <input type="text" class="form-control" name="title" required placeholder="Enter product title"><br>
            </div>

            <div class="form-group">
                <label for="style" class="mt-2">Style</label><br>
                <select name="style" id="type">
                    <option value="athleisure">Athleisure</option>
                    <option value="casual">Casual</option>
                    <option value="outdoor">Outdoor</option>
                    <option value="formal">Formal</option>
                </select><br>
            </div>
            <div class="form-group">
                <label class="mt-2">Color</label><br>
                <select name="color" id="color">
                    <option value="black">Black</option>
                    <option value="blue">Blue</option>
                    <option value="brown">Brown</option>
                    <option value="white">White</option>
                    <option value="grey">Grey</option>
                    <option value="yellow">Yellow</option>
                    <option value="brown">Brown</option>
                    <option value="red">Red</option>
                    <option value="pink">Pink</option>
           
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
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="s41" id="" style="margin-right: 5px;">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="s42" id="" style="margin-right: 5px;">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="s43" id="" style="margin-right: 5px;">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="s44" id="" style="margin-right: 5px;">
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
                        <option value="male">Barbati</option>
                        <option value="female">Femei</option>
                        <option value="other">Altii</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="product_container" style="width:100px ;">
                <label class="mt-2">Price</label>
                <input type="number" class="form-control " name="price" required min=300 max=10000  placeholder="Price"><br>
            </div>
            <div class="form-control">
                <label>Description</label>
                <textarea type="textarea" class="form-control" name="description" required placeholder="Enter description"></textarea>
            </div>
            <div class="form-group">
                <label for="files" class="form-label mt-2">Upload Images:</label>
                <input type="file" id="image" name="images[]" class="form-control" multiple accept="image/*">
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Save Product</button>
            </div>
        </form>
    </div>

    <div class="col-lg-6">
        <div id="preview">

        </div>

    </div>

</div>

<!-- preview image -->
<script type="text/javascript">
    function previewImages() {

        var $preview = $('#preview').empty();

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