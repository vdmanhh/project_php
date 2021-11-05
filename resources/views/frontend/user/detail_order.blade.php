@extends('frontend.body.home_user')

@section('home')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" style="width: 90%; padding:50px;margin-top:50px;background:white">

    @include('frontend.user.sidebar_user')
    <div class="col-10" style='width : 70%;float:right;'>

        <div class="row">

            <div class="col-6">
            <h3 style="background-color: #0f6cb2;padding:10px;width:200px;border-radius:20px;color:white;text-align:center">Detail Order</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Shipping Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Division</th>
                            <th scope="col">District</th>
                            <th scope="col">State</th>
                            <th scope="col">Post Code</th>
                            <th scope="col">Order </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>{{$detail->name}}</td>
                            <td>{{$detail->phone}}</td>
                            <td>{{$detail->email}}</td>
                            <td>{{$detail->division->name_division }}</td>

                            <td>{{$detail->district->district_name}}</td>
                            <td>{{$detail->state->state_name}}</td>
                            <td>{{$detail->post_code}}</td>
                            <td >{{$detail->order_date }}</td>
                        </tr>

                    </tbody>
                </table>
                <hr>
            </div>
            <div class="col-6">
                <h3 style="background-color: #0f6cb2;padding:10px;width:200px;border-radius:20px;color:white;text-align:center">Order Detail</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Payment Type</th>
                            <th scope="col">TranxID</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Order Total</th>

                            <th scope="col">Order </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th >{{$detail->user->name}}</th>
                            <td>{{$detail->phone}}</td>
                            <td>{{$detail->payment_type}}</td>
                            <td>{{$detail->transaction_id}}</td>
                            <td>{{$detail->invoice_no}}</td>
                            <td>{{$detail->amount}}</td>
                            <td class="badge badge-pill badge-warning" style="background: #418DB9; padding:5px;margin-top:25px">{{$detail->status}}</td>
                        </tr>

                    </tbody>
                </table>
                <hr>
            </div>
            <div class="col-6">
                <h3 style="background-color: #0f6cb2;padding:10px;width:200px;border-radius:20px;color:white;text-align:center">Order Item</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Quantity</th>

                            <th scope="col">Price </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <th ><img style="height: 100px;width: 100px;" src="{{asset($item->product->product_thambnail)}}" alt=""></th>
                            <td width='20%'>{{$item->product->product_name_en}}</td>
                            <td>{{$item->product->product_code }}</td>
                            <td>{{$item->color}}</td>
                            <td>{{$item->size}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->price}} $</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
            </div>

        </div>

            <div class="">
                @if($detail->status !== 'deleveried')

                @else
                @php
                    $order = App\Models\Order::where('id',$detail->id)->where('return_reason','=',NULL)->first();
                @endphp
                    @if($order)
                    <h3>Return Order</h3>
                <form method="POST" action="{{route('return',$detail->id)}}" style="width: 70%;">
                @csrf
                    <textarea   style="width: 70%;border: 1px solid #b7b1b140;" name="return" id="" cols="30" rows="9"></textarea>
                    <br>
                    <button class="btn btn-danger" style="margin-top: 10px;">Send</button>
                </form>
                @else
                <span class="badge badge-danger" style="background-color: #cb1111;padding:10px 10px;font-size:20px;color:white">You already send return order !</span>
                @endif
                @endif
            </div>
    </div>


</div>

@endsection
