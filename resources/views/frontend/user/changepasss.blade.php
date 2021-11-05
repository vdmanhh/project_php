@extends('frontend.body.home_user')

@section('home')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="width: 90%; margin:auto; padding:50px;margin-top:50px;margin-bottom:70px;background:white">

@include('frontend.user.sidebar_user')
    <div class="col-8" style='width : 60%;float:right;'>
        <h2 style="text-align: center;font-weight:bold">Change password User</h2>
        <form action="{{route('changepasss.user')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="labell" for="exampleInputEmail1 labell">Old Password</label>
                <input name="old_password" type="password" class="form-control inputt" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter old password">

            </div>
            @error('old_password')
                <span style="color: red;">Fill out information</span>
            @enderror
            <div class="form-group">
                <label class="labell" for="exampleInputPassword1 labell">New Password</label>
                <input name="new_password" type="password" class="form-control inputt" id="exampleInputPassword1" placeholder="  New password">
            </div>
            @error('new_password')
                <span style="color: red;">Fill out information</span>
            @enderror
            <div class="form-group">
                <label class="labell" for="exampleInputPassword1 labell">Confirm Password</label>
                <input name="confirm_password" type="password" class="form-control inputt" id="exampleInputPassword1" placeholder="Confirm password">
            </div>
            @error('confirm_password')
                <span style="color: red;">Fill out information</span>
                <br>
            @enderror

            <button style="border-radius: 12px;" type="submit" class="btn btn-primary">Change password</button>
        </form>
    </div>
    <div class="notice">

    </div>

</div>
            <script>
                  @if(Session::has('message'))
        var type = '{{Session::get("alert-type","info")}}'
        var notice = document.querySelector('.notice')
        switch (type) {
            case 'info':
                notice.innerHTML = "{{Session::get('message')}}";
                notice.style.background = 'blue'
                notice.classList.add('actives')
                setTimeout(()=>{
                    notice.classList.remove('actives')
                },4000)
                break;

             case 'success':
                notice.innerHTML = "{{Session::get('message')}}";
                notice.style.background = '#37cb18'
                notice.classList.add('actives')
                setTimeout(()=>{
                    notice.classList.remove('actives')
                },4000)
                break;

            case 'warning':
                notice.innerHTML = "{{Session::get('message')}}";
                notice.style.background = 'orange'
                notice.classList.add('actives')

                setTimeout(()=>{
                    notice.classList.remove('actives')
                },4000)
                break;

        }
        @endif
            </script>
@endsection
