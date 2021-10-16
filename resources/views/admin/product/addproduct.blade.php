@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-fluid" style="background-color: #10467a;color:white; padding:20px;z-index:-1;width:90%">
        <h3 style="text-align: center;padding-bottom:20px">Add Product</h3>
    <div class="form">
        <form action="{{route('add.product')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category</label>
                        <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach($cates as $key)
                            <option value="{{$key->id}}">{{$key->category_name_en}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label  for="exampleFormControlSelect1">Select SubCategory</label>
                        <select name="subcategory_id" class="form-control" id="exampleFormControlSelect1">


                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select SubSubCategory</label>
                        <select name="subsubcategory_id" class="form-control" id="exampleFormControlSelect1">


                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Brand</label>
                        <select name="brand_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach($brands as $key)
                            <option value="{{$key->id}}">{{$key->brand_name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Name En</label>
                        <input name="product_name_en" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Name Hin</label>
                        <input name="product_name_hin" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Code</label>
                        <input name="product_code" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Quantity</label>
                        <input name="product_qty" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Selling Price</label>
                        <input name="selling_price" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
            </div>


            <div class="row" >
                <div class="col-4" style="width: 100%;">
                    <label for="exampleFormControlInput1">Product Tags Hin</label>
                    <input type="text" name="product_tags_hin" class="form-control" value="" data-role="tagsinput" required="">
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1">Product Size En</label>
                    <input  name="product_size_en" type="text" value="" data-role="tagsinput" required="" />
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1">Product Size Hin</label>
                    <input name="product_size_hin" type="text" value="" data-role="tagsinput" required="" />
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <label for="exampleFormControlInput1">Product Color En</label>
                    <input name="product_color_en" type="text" value="" data-role="tagsinput" />
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1">Product Color Hin</label>
                    <input name="product_color_hin" type="text" value="" data-role="tagsinput" />
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Tag En</label>
                        <input name="product_tags_en" type="text" value="" data-role="tagsinput" />
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Discount Price</label>
                        <input name="discount_price" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Main Thambnail</label>
                        <input style="background-color: white;padding:5px;border-radius:6px;width:100%" class="images" name="product_thambnail" type="file" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <img class="showimages" src="" alt="">
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Multi Image</label>
                        <input style="padding:4px;height:40px" type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required="">
                    </div>
                    <div class="rowaa" id="preview_img"></div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Short Desc En</label>
                        <input name="short_descp_en" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Short Desc Hin</label>
                        <input name="short_descp_hin" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <textarea name="long_descp_en" id="editor"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <textarea name="long_descp_hin" id="editor1"></textarea>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group form-check" style="margin: auto; width:60%">
                        <input value="1" name="hot_deals" type="checkbox" class="form-check-input" id="exampleCheck1" style="font-size: 40px;">
                        <label class="form-check-label" for="exampleCheck1">Hot Deal</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group form-check" style="margin: auto; width:60%">
                        <input value="1" name="featured" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Featured</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group form-check" style="margin: auto; width:60%">
                        <input value="1" name="special_offer" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Special Offer</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group form-check" style="margin: auto; width:60%">
                        <input value="1" name="special_deals" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Special Deal</label>
                    </div>
                </div>
            </div>

          <button type="submit" class="btn btn-info mt-5">Add Product</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('asset/tags.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea#editor',
        menubar: false
    });
    tinymce.init({
        selector: 'textarea#editor1',
        menubar: false
    });
</script>
<script>
    $(document).ready(function() {
        $('.images').change(function(e) {
            e.preventDefault();
            var reader = new FileReader();
            reader.onload = function(e) {
                // $('.showimage').attr('class','showw');
                $('.showimages').attr('src', e.target.result).width(80).height(80);
                $('.showimages').addClass('borderss')

                // $('.showimage').addClass('showw');
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script>
    $('#multiImg').on('change', function() { //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file) { //loop though each file
                if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file) { //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                .height(80); //create image element
                            $('#preview_img').append(img); //append image to output element
                            $('.thumb').addClass('bordersss');
                        };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        } else {
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
</script>

<script>
    $(document).ready(function() {

        // //////
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();

            if (category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        var d = $('select[name="subcategory_id"]').empty();
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        // //////
        $('select[name="subcategory_id"]').on('change', function() {
            var subcategory_id = $(this).val();

            if (subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/ajax') }}/" + subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

@endsection
