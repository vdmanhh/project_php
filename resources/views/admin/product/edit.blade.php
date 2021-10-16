@extends('admin.home')
@section('home_admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-fluid" style="border-radius:20px;background-color: #10467a;color:white; padding:20px;z-index:-1;width:90%">
    <h3 style="text-align: center;padding-bottom:20px">Add Product</h3>
    <div class="form">
        <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category</label>
                        <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach($cates as $key)
                            <option value="{{$key->id}}" {{$key->id ==$product->category_id ? 'selected' : ''}}>{{$key->category_name_en}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select SubCategory</label>
                        <select name="subcategory_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach($subs as $key)
                            <option value="{{$key->id}}" {{$key->id ==$product->subcategory_id ? 'selected' : ''}}>{{$key->subcategory_name_en}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select SubSubCategory</label>
                        <select name="subsubcategory_id" class="form-control" id="exampleFormControlSelect1">

                            @foreach($subsubs as $key)
                            <option value="{{$key->id}}" {{$key->id ==$product->subsubcategory_id ? 'selected' : ''}}>{{$key->subsubcategory_name_en}}</option>
                            @endforeach
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
                            <option value="{{$key->id}}" {{$key->id ==$product->brand_id ? 'selected' : ''}}>{{$key->brand_name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Name En</label>
                        <input value="{{$product->product_name_en}}" name="product_name_en" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Name Hin</label>
                        <input value="{{$product->product_name_hin}}" name="product_name_hin" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Code</label>
                        <input value="{{$product->product_code}}" name="product_code" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Quantity</label>
                        <input value="{{$product->product_qty}}" name="product_qty" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Selling Price</label>
                        <input value="{{$product->selling_price}}" name="selling_price" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-4" style="width: 100%;">
                    <label for="exampleFormControlInput1">Product Tags Hin</label>
                    <input value="{{$product->product_tags_hin}}" type="text" name="product_tags_hin" class="form-control" value="" data-role="tagsinput" required="">
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1">Product Size En</label>
                    <input value="{{$product->product_size_en}}" name="product_size_en" type="text" value="" data-role="tagsinput" required="" />
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1">Product Size Hin</label>
                    <input value="{{$product->product_size_hin}}" name="product_size_hin" type="text" value="" data-role="tagsinput" required="" />
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <label for="exampleFormControlInput1">Product Color En</label>
                    <input value="{{$product->product_color_en}}" name="product_color_en" type="text" value="" data-role="tagsinput" />
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1">Product Color Hin</label>
                    <input value="{{$product->product_color_hin}}" name="product_color_hin" type="text" value="" data-role="tagsinput" />
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Tag En</label>
                        <input value="{{$product->product_tags_en}}" name="product_tags_en" type="text" value="" data-role="tagsinput" />
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-4">

                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Discount Price</label>
                        <input value="{{$product->discount_price}}" name="discount_price" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-4">

                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Short Desc En</label>
                        <input value="{{$product->short_descp_en}}" name="short_descp_en" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Short Desc Hin</label>
                        <input value="{{$product->short_descp_hin}}" name="short_descp_hin" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <textarea name="long_descp_en" id="editor">{{$product->long_descp_en}}</textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <textarea name="long_descp_hin" id="editor1">{{$product->long_descp_hin}}</textarea>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group form-check" style="margin: auto; width:60%">
                        <input value="1" name="hot_deals" type="checkbox" class="form-check-input" id="exampleCheck1" style="font-size: 40px;" {{$product->hot_deals == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleCheck1">Hot Deal</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group form-check" style="margin: auto; width:60%">
                        <input value="1" name="featured" type="checkbox" class="form-check-input" id="exampleCheck1" {{$product->featured == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleCheck1">Featured</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group form-check" style="margin: auto; width:60%">
                        <input value="1" name="special_offer" type="checkbox" class="form-check-input" id="exampleCheck1" {{$product->special_offer == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleCheck1">Special Offer</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group form-check" style="margin: auto; width:60%">
                        <input value="1" name="special_deals" type="checkbox" class="form-check-input" id="exampleCheck1" {{$product->special_deals == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleCheck1">Special Deal</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-info mt-5">Update Product</button>
        </form>
    </div>


</div>
<div class="container-fluid mt-5" style="border-radius:20px;background-color: #10467a;color:white; padding:20px;z-index:-1;width:90%">
    <div class="mb-5">
        <h3>Update Multi Image</h3>
        <form action="{{route('update.multiiamge',$product->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @php($d=0)
            <div class="row mt-5">
                @foreach($imgs as $value => $key)

                <div class="col-3">
                    <img width="300px" class="borderss " height="300px" src="{{asset($key->photo_name)}}" alt="">
                    <a href="{{route('delete.multi',$key->id)}}" id="deleted" class="btn btn-danger mt-3 deleted runs">X</a>
                    <input name="oldimage[{{$key->id}}]" type="file" class="form-control mt-4 inputruns " id="exampleCheck1">


                </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-info mt-5">Update Multi Image</button>
        </form>
    </div>



</div>
<div class="container-fluid mt-5" style="border-radius:20px;background-color: #10467a;color:white; padding:20px;z-index:-1;width:90%">
    <div class="row">
        <div class="col-6">
            <h4>Add Image</h4>
            <div class="row">
                <div class="col-3">
                    <form action="{{route('add.multiimages',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input  name="add_iamge" type="file" class="form-control image" id="exampleFormControlInput1">
                        <button type="submit" class="btn btn-info mt-5">Add Multi Image</button>
                    </form>
                </div>
                <div class="col-9">
                    <img class="showimage" src="" alt="">
                </div>
            </div>
        </div>
        <!-- thambnail -->
        <div class="col-6">
            <h4>Update Thambnail</h4>
           <div class="row">
           <div class="col-4">
                <form action="{{route('update.thamn',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input name="change_thamn" type="file" class="form-control images imt" id="exampleFormControlInput1">
                    <button type="submit" class="btn btn-info mt-5">Add Multi Image</button>
                </form>
            </div>
            <div class="col-8">
                <img class="showimages aiamge borderss" src="{{asset($product->product_thambnail	)}}" alt="">
            </div>
           </div>
        </div>
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
        $('.image').change(function(e) {
            e.preventDefault();
            // console.log($('.image').attr('bien'));
            var reader = new FileReader();
            reader.onload = function(e) {
                // $('.showimage').attr('class','showw');
                $('.showimage').attr('src', e.target.result);


                $('.showimage').addClass('showws');
            }
            reader.readAsDataURL(e.target.files['0']);
        });



        $('.images').change(function(e) {
            e.preventDefault();
            // console.log($('.image').attr('bien'));
            var reader = new FileReader();
            reader.onload = function(e) {
                // $('.showimage').attr('class','showw');
                $('.showimages').attr('src', e.target.result);


                $('.showimages').addClass('showws');
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>




@endsection
