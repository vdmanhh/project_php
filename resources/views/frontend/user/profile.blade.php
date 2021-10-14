@extends('frontend.body.home_user')

@section('home')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="width: 70%; margin:auto; padding:50px;margin-top:50px;margin-bottom:70px;background:white" >

        <div class="col-4" style="float: left; width:40%">
            <img  class="showimage" src=" {{(!empty($user->avatar))? url('upload/user/'.$user->avatar):
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC6iPDSqcgCcAtdEz_rPY0B-sxqMd7hz0Hlg&usqp=CAU'}}" alt="">
            <ul class="uluser">
                <li class="liuser"><a class="auser" href="{{route('user.info')}}">Profile</a></li>
                <li class="liuser"><a class="auser" href="{{route('user.changespass')}}"> Change pass</a></li>
                <li class="liuser"><a class="auser" href="{{route('logout')}}">Log out</a> </li>
            </ul>
        </div>
        <div class="col-8" style='width : 60%;float:right;' >
                <h2 style="text-align: center;font-weight:bold">Hello -->...{{$user->name}}</h2>
            <form action="{{route('update.profileuser')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="labell" for="exampleInputEmail1 labell">Name</label>
                    <input name="name" value="{{$user->name}}" type="text" class="form-control inputt" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label class="labell" for="exampleInputPassword1 labell">Email</label>
                    <input name="email" value="{{$user->email}}" type="email" class="form-control inputt" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="labell" for="exampleInputPassword1 labell">Image</label>
                    <input name="image"  class="image inputt" type="file" class="form-control" id="exampleInputPassword1" >
                </div>

                <button style="border-radius: 12px;" type="submit" class="btn btn-primary">Change profile</button>
            </form>
        </div>
        <div class="notice">

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
