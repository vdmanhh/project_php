@extends('admin.home')
@section('home_admin')

<div class="container" style="background-color: white; width:600px;padding:30px;">
<h3 style="text-align: center;">Update Category</h3>
    <form action="{{route('update.subsubcategory',$subsubcate->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">SubSubCategory_name_en </label>
            <input value="{{$subsubcate->subsubcategory_name_en}}" name='subsubcategory_name_en' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand_name_en">

        </div>
        @error('subsubcategory_name_en')
        <span style="color: red;">fill out information</span>
        @enderror


        <div class="form-group">
            <label for="exampleInputPassword1">SubSubCategory_name_hin</label>
            <input value="{{$subsubcate->subsubcategory_name_hin}}" name="subsubcategory_name_hin" type="text" class="form-control" id="exampleInputPassword1" placeholder="brand_name_hin">
        </div>
        @error('subsubcategory_name_hin')
        <span style="color: red;">fill out information</span>
        @enderror

        <div class="form-group">
            <label for="exampleInputPassword1">Choose Category</label>
            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                    <option >Choose category</option>
                        @foreach($cates as $cate)
                        <option value="{{$cate->id}}" {{$cate->id == $subsubcate->category_id ? 'selected' : ''}}>{{$cate->category_name_en}}</option>
                        @endforeach
                    </select>
        </div>
        @error('category_name_hin')
        <span style="color: red;">fill out information</span>
        @enderror


        <div class="form-group">
            <label for="exampleInputPassword1">Choose Category</label>
            <select name="subcategory_id" class="form-control" id="exampleFormControlSelect1">
                    <option >Choose category</option>
                        @foreach($subs as $cate)
                        <option value="{{$cate->id}}" {{$cate->id == $subsubcate->subcategory_id ? 'selected' : ''}}>{{$cate->subcategory_name_en}}</option>
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
