@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container mt-5" style="background-color: white; padding:30px">
    <div class="row">
        <div class="col-4">

          


<!--  -->
                                @if(!empty($user->avatar))
                                @if($user->type == 2)
                                <img class="img-profile rounded-circle" src="{{asset($user->avatar)}}" style="border-radius:100%;width: 240px;height:240px;margin-left:50%;transform:translateX(-50%); margin-top:20px;margin-bottom:20px">
                                @else
                                <img class="img-profile rounded-circle" src="{{url('upload/admin/'.$user->avatar)}}" style="border-radius:100%;width: 240px;height:240px;margin-left:50%;transform:translateX(-50%); margin-top:20px;margin-bottom:20px">
                                @endif
                            @else
                         <img class="img-profile rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC6iPDSqcgCcAtdEz_rPY0B-sxqMd7hz0Hlg&usqp=CAU" style="border-radius:100%;width: 240px;height:240px;margin-left:50%;transform:translateX(-50%); margin-top:20px;margin-bottom:20px">
                            @endif

<!--  -->


            <div style="text-align: center;">

                <h3>{{$user->name}}</h3>
                <span>{{$user->email}}</span>
            </div>


        </div>
        <div class="col-8">
            <h3 style="text-align: center;">Edit profile Admin</h3>
            <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data" style="width: 500px; margin:auto;">
            @csrf
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
                    <input class="image" name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                </div>

                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>
</div>
<script>
                    $(document).ready(function () {
                        $('.image').change(function (e) {
                            e.preventDefault();
                            var reader = new FileReader();
                            reader.onload = function(e){
                                $('.showimage').attr('src',e.target.result);

                            }
                            reader.readAsDataURL(e.target.files['0']);
                        });
                    });
                </script>
@endsection
