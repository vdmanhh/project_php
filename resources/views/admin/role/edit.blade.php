@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container mt-5" style="background-color: white; padding:30px">
    <h3 style="text-align: center;">Update Admin</h3>
    <form action="{{route('editt.role.admin',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">


                <div class="form-group">
                    <label for="exampleInputEmail1">Username </label>
                    <input value="{{$user->name}}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email </label>
                    <input value="{{$user->email}}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Profile </label> <br>
                    <div style="display: flex;">
                        <img class="showimage" style="border-radius:100%;width: 80px;height:80px;margin-right:10px" src="{{asset($user->avatar)}}" alt="">
                        <input class="image" name="profile_photo_path" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                        <input type="hidden" name="old_image" value="{{ $user->avatar }}">
                    </div>


                </div>


            </div>

            <div class="col-6 mt-5">
                <div class="row">
                    <div class="col-4">
                        <fieldset>
                            <input type="checkbox" id="checkbox_1" name="category" value="1" {{$user->category ==1 ? 'checked' :''}}>
                            <label for="checkbox_1">Category</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="checkbox_2" name="state_order" value="1" {{$user->state_order ==1 ? 'checked' :''}}>
                            <label for="checkbox_2">State Order</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="checkbox_3" name="product" value="1" {{$user->product ==1 ? 'checked' :''}}>
                            <label for="checkbox_3">Product</label>
                        </fieldset>

                    </div>
                    <div class="col-4">
                        <fieldset>
                            <input type="checkbox" id="checkbox_4" name="user" value="1" {{$user->user ==1 ? 'checked' :''}}>
                            <label for="checkbox_4">User</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="checkbox_5" name="ship" value="1" {{$user->ship ==1 ? 'checked' :''}}>
                            <label for="checkbox_5">Ship</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="checkbox_6" name="coupon" value="1" {{$user->coupon ==1 ? 'checked' :''}}>
                            <label for="checkbox_6">Coupon</label>
                        </fieldset>
                    </div>
                    <div class="col-4">
                        <fieldset>
                            <input type="checkbox" id="checkbox_7" name="return_order" value="1" {{$user->return_order ==1 ? 'checked' :''}}>
                            <label for="checkbox_7">Return Order</label>
                        </fieldset>

                        <fieldset>
                            <input type="checkbox" id="checkbox_8" name="brand" value="1" {{$user->brand ==1 ? 'checked' :''}}>
                            <label for="checkbox_8">Brand</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="checkbox_9" name="slider" value="1" {{$user->slider ==1 ? 'checked' :''}}>
                            <label for="checkbox_9">Slider</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="checkbox_9" name="access" value="1" {{$user->access ==1 ? 'checked' :''}}>
                            <label for="checkbox_9">Slider</label>
                        </fieldset>

                    </div>
                </div>



            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </div>

    </form>
</div>
<script>
    $(document).ready(function() {
        $('.image').change(function(e) {
            e.preventDefault();
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.showimage').attr('src', e.target.result);

            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
