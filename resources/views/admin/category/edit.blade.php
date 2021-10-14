@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="background-color: white; width:600px;padding:30px;">
<h3 style="text-align: center;">Update Category</h3>
    <form action="{{route('update.category',$category->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Brand_name_en </label>
            <input value="{{$category->category_name_en}}" name='category_name_en' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand_name_en">

        </div>
        @error('category_name_en')
        <span style="color: red;">Brand_name_hin</span>
        @enderror


        <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input value="{{$category->category_name_hin}}" name="category_name_hin" type="text" class="form-control" id="exampleInputPassword1" placeholder="brand_name_hin">
        </div>
        @error('category_name_hin')
        <span style="color: red;">Image</span>
        @enderror

        <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input value="{{$category->category_icon}}" name="category_icon" type="text" class="form-control" id="exampleInputPassword1" placeholder="brand_name_hin">
        </div>
        @error('category_icon')
        <span style="color: red;">Image</span>
        @enderror




        <button type="submit" class="btn btn-primary">Change</button>
    </form>
</div>

@endsection
