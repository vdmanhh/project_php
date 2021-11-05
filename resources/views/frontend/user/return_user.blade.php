@extends('frontend.body.home_user')

@section('home')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="width: 90%; padding:50px;margin-top:50px;background:white">

    @include('frontend.user.sidebar_user')
    <div class="col-10" style='width : 70%;float:right;'>

        <div class="row">

            <div class="col-6">
                <h3 style="background-color: #0f6cb2;padding:10px;width:270px;border-radius:20px;color:white;text-align:center">Order Item Return</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> Image</th>
                            <th scope="col">Product Name</th>

                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Quantity</th>

                            <th scope="col">Price </th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderItem as $item)
                        <tr>
                            <th ><img style="height: 100px;width: 100px;" src="{{asset($item->product->product_thambnail)}}" alt=""></th>
                            <td width='20%'>{{$item->product->product_name_en}}</td>
                            <td>{{$item->color}}</td>
                            <td>{{$item->size}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->price}} $</td>
                            <td class=""><span  style="background-color: brown;color:white;padding:10px 10px;border-radius:10px">Return Order</span></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
            </div>

        </div>


    </div>


</div>

@endsection
