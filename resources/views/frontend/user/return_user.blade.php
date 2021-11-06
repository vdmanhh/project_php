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
                        <th style="text-align: center;" scope="col">STT</th>
                        <th style="text-align: center;" scope="col">Date</th>
                    <th style="text-align: center;"scope="col">Total</th>
                    <th style="text-align: center;"scope="col">Payment</th>
                    <th style="text-align: center;"scope="col">Invoice</th>

                    <th style="text-align: center;"scope="col" >Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($id=1)
                        @foreach($detail as $key)
                        <tr>
                        <th scope="row">{{$id++}}</th>
                    <td>{{$key->order_date}}</td>
                    <td>{{$key->amount}} $</td>
                    <td>{{$key->payment_type}}</td>
                    <td>{{$key->invoice_no}}</td>

                            @if($key->return_order != 0)
                            <td class=""><span  style="background-color: green;color:white;padding:10px 10px;border-radius:10px">Return order Successfully</span></td>

                            @else
                            <td class=""><span  style="background-color: brown;color:white;padding:10px 10px;border-radius:10px">Waiting processing...</span></td>
                             @endif
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
