@extends('admin.home')
@section('home_admin')
<link rel="stylesheet" href="{{asset('backend/1.css')}}">
<div class="container" style="background-color: white; width:600px;padding:30px;">
<h3 style="text-align: center;">Update password</h3>
    <form action="{{route('update.pass')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Current pass</label>
            <input name='old_password' type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">

        </div>
        @error('old_password')
        <span style="color: red;">Fill out information</span>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input name="new_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        @error('new_password')
        <span style="color: red;">Fill out information</span>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input name="confirm_password" type="password" class="form-control" id="exampleInputPassword1" placeholder=" Confirm Password">
        </div>


        @error('confirm_password')
        <span style="color: red;">Fill out information</span>
        <br>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
                notice.style.background = 'green'
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
