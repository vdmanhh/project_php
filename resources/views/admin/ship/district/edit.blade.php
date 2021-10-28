@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="background-color: white; width:600px;padding:30px;">
<h3 style="text-align: center;">Update District</h3>
    <form action="{{route('update.district',$district->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">District Name </label>
            <input value="{{$district->district_name}}" name='district_name' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand_name_en">

        </div>
        @error('district_name')
        <span style="color: red;">Division</span>
        @enderror


        <div class="form-group">
            <label for="exampleInputPassword1">Choose Division</label>
            <select name="division_id" class="form-control" id="exampleFormControlSelect1">
                    <option >Choose category</option>
                        @foreach($divisions as $cate)
                        <option value="{{$cate->id}}" {{$cate->id == $district->division_id ? 'selected' : ''}}>{{$cate->name_disvision}}</option>
                        @endforeach
                    </select>
        </div>
        @error('division_id')
        <span style="color: red;">fill out information</span>
        @enderror






        <button type="submit" class="btn btn-primary">Change</button>
    </form>
</div>

@endsection
