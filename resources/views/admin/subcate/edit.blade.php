@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="background-color: white; width:600px;padding:30px;">
<h3 style="text-align: center;">Update Category</h3>
    <form action="{{route('update.subcategory',$subs->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">SubCategory_name_en </label>
            <input value="{{$subs->subcategory_name_en}}" name='subcategory_name_en' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand_name_en">

        </div>
        @error('category_name_en')
        <span style="color: red;">fill out information</span>
        @enderror


        <div class="form-group">
            <label for="exampleInputPassword1">SubCategory_name_hin</label>
            <input value="{{$subs->subcategory_name_hin}}" name="subcategory_name_hin" type="text" class="form-control" id="exampleInputPassword1" placeholder="brand_name_hin">
        </div>
        @error('category_name_hin')
        <span style="color: red;">fill out information</span>
        @enderror

        <div class="form-group">
            <label for="exampleInputPassword1">Choose Category</label>
            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                    <option >Choose category</option>
                        @foreach($cates as $cate)
                        <option value="{{$cate->id}}" {{$cate->id == $subs->category_id ? 'selected' : ''}}>{{$cate->category_name_en}}</option>
                        @endforeach
                    </select>
        </div>
        @error('category_name_hin')
        <span style="color: red;">fill out information</span>
        @enderror






        <button type="submit" class="btn btn-primary">Change</button>
    </form>
</div>

@endsection
