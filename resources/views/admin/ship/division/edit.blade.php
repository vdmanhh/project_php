@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="background-color: white; width:600px;padding:30px;">
<h3 style="text-align: center;">Update Division</h3>
    <form action="{{route('update.division',$division->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Coupon name </label>
            <input value="{{$division->name_disvision}}" name='name_disvision' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand_name_en">

        </div>
        @error('name_disvision')
        <span style="color: red;">Fill out information</span>
        @enderror



        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
