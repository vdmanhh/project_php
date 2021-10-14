@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="background-color: white; width:600px;padding:30px;">
<h3 style="text-align: center;">Update Brand</h3>
    <form action="{{route('update.brand',$brand->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">

            <input value="{{$brand->brand_image}}" name='oldimage' type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand_name_en">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Brand_name_en </label>
            <input value="{{$brand->brand_name_en}}" name='brand_name_en' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand_name_en">

        </div>
        @error('brand_name_en')
        <span style="color: red;">Brand_name_hin</span>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input value="{{$brand->brand_name_hin}}" name="brand_name_hin" type="text" class="form-control" id="exampleInputPassword1" placeholder="brand_name_hin">
        </div>
        @error('brand_name_hin')
        <span style="color: red;">Image</span>
        @enderror
        <div class="form-group">
           <div class="row">
               <div class="col-2">
               <img class='showimage' style="width: 60px;height:60px;border-radius:50%" src="{{asset($brand->brand_image)}}"  alt="">

               </div>
               <div class="col-10">
               <input class="image"  style="border:none;" name="image" type="file" class="form-control" id="exampleInputPassword1" placeholder=" ">
               </div>
           </div>
        </div>


        @error('image')
        <span style="color: red;">Fill out information</span>
        <br>
        @enderror

        <button type="submit" class="btn btn-primary">Change</button>
    </form>
</div>
<script>
     $(document).ready(function() {
        $('.image').change(function(e) {
            e.preventDefault();
            var reader = new FileReader();
            reader.onload = function(e) {
                // $('.showimage').attr('class','showw');
                $('.showimage').attr('src', e.target.result);

                // $('.showimage').addClass('showw');
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
