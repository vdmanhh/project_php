@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="background-color: white; width:600px;padding:30px;">
<h3 style="text-align: center;">Update Coupon</h3>
    <form action="{{route('update.coupon',$coupon->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Coupon name </label>
            <input value="{{$coupon->name_coupon}}" name='name_coupon' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand_name_en">

        </div>
        @error('name_coupon')
        <span style="color: red;">Fill out information</span>
        @enderror


        <div class="form-group">
            <label for="exampleInputPassword1">Coupon Discount</label>
            <input value="{{$coupon->discount}}" name="discount" type="text" class="form-control" id="exampleInputPassword1" placeholder="brand_name_hin">
        </div>
        @error('discount')
        <span style="color: red;">Fill out information</span>
        @enderror

        <div class="form-group">
            <label for="exampleInputPassword1">Coupon Date Valid</label>
            <input value="{{$coupon->date}}" name="date" type="date" class="form-control" id="exampleInputPassword1" placeholder="brand_name_hin">
        </div>
        @error('date')
        <span style="color: red;">Fill out information</span>
        @enderror




        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
