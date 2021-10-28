@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="background-color: white; width:600px;padding:30px;">
<h3 style="text-align: center;">Update State</h3>
    <form action="{{route('update.state',$state->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">State Name </label>
            <input value="{{$state->state_name}}" name='state_name' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand_name_en">

        </div>
        @error('state_name')
        <span style="color: red;">{{ $message }}</span>
        @enderror


        <div class="form-group">
            <label for="exampleInputPassword1">Choose Division</label>
            <select name="division_id" class="form-control" id="exampleFormControlSelect1">
                    <option >Choose category</option>
                        @foreach($divisions as $cate)
                        <option value="{{$cate->id}}" {{$cate->id == $state->division_id ? 'selected' : ''}}>{{$cate->name_disvision}}</option>
                        @endforeach
                    </select>
        </div>
        @error('division_id')
        <span style="color: red;">fill out information</span>
        @enderror


        <div class="form-group">
            <label for="exampleInputPassword1">Choose District</label>
            <select name="district_id" class="form-control" id="exampleFormControlSelect1">
                    <option >Choose category</option>
                        @foreach($district as $cate)
                        <option value="{{$cate->id}}" {{$cate->id == $state->district_id ? 'selected' : ''}}>{{$cate->district_name}}</option>
                        @endforeach
                    </select>
        </div>
        @error('district_id')
        <span style="color: red;">fill out information</span>
        @enderror






        <button type="submit" class="btn btn-primary">Change</button>
    </form>
</div>

@endsection
