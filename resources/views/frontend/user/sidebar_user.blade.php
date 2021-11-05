
@php
    $user = App\Models\User::find(Auth::id());
@endphp
<div class="col-2" style="float: left; width:30%">
            <img  class="showimage" src=" {{(!empty($user->avatar))? url('upload/user/'.$user->avatar):
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC6iPDSqcgCcAtdEz_rPY0B-sxqMd7hz0Hlg&usqp=CAU'}}" alt="">
            <ul class="uluser">
                <li class="liuser"><a class="auser" href="{{route('user.info')}}">Profile</a></li>
                <li class="liuser"><a class="auser" href="{{route('user.changespass')}}"> Change pass</a></li>
                <li class="liuser"><a class="auser" href="{{route('user.orderss')}}"> Order</a></li>
                <li class="liuser"><a class="auser" href="{{route('return.user')}}">Return Order</a></li>
                <li class="liuser"><a class="auser" href="{{route('cancel.user')}}">Cancel Order</a></li>
                <li class="liuser"><a class="auser" href="{{route('logout')}}">Log out</a> </li>
            </ul>
        </div>

