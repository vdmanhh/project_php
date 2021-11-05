@extends('frontend.body.home_user')

@section('home')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="width: 90%; margin:auto; padding:50px;margin-top:50px;margin-bottom:70px;background:white">

    @include('frontend.user.sidebar_user')
    <div class="col-10" style='width : 60%;float:right;'>
        <h2 style="text-align: center;font-weight:bold">User Oder</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>  <th scope="col">STT</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Order</th>
                    <th scope="col" >Action</th>
                </tr>
            </thead>
            <tbody>
                @php($id=1)

                @foreach($order as $key)
                <tr>
                    <th scope="row">{{$id++}}</th>
                    <td>{{$key->order_date}}</td>
                    <td>{{$key->amount}} $</td>
                    <td>{{$key->payment_type}}</td>
                    <td>{{$key->invoice_no}}</td>
                    <td>{{$key->status}}</td>
                    <td style="width: 30%;">
                    <a href="{{url('detail/order/'.$key->id)}}"> <div style="width: 80px;margin-bottom: 10px; " class="btn btn-info "><i class="far fa-eye"></i> View</div></a>

                        <a href="{{url('download/order/'.$key->id)}}"><div style="width: 80px;" class="btn btn-danger"><i class="fas fa-download"></i> PDF</div></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


</div>

@endsection
