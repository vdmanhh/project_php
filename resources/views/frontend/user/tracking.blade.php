@extends('frontend.body.home_user')

@section('home')
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');





.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #157ed2
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #157ed2;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #157ed2;
    border-color: #157ed2;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #157ed2;
    border-color: #157ed2;
    border-radius: 1px
}
h5{
    font-weight: bold;
}
.conl{
    text-align: center;
    margin-top: 30px;
}
</style>

<div class="container">
    <article class="card" style="margin-bottom: 100px;">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
           <div class="row" style="width:100%;margin-left: 5%;margin-right:5%;display:flex">
               <div class="col-2 conl" style="width: 15%;">
                   <h5>Invoide Number</h5>
                   <span>{{$order->invoice_no}}</span>
               </div>
               <div class="col-2 conl"style="width: 15%;">
               <h5>Order Date</h5>
                   <span>{{$order->order_date}}</span>
               </div>
               <div class="col-2 conl"style="width: 15%;">
               <h5>Shipping By - {{$order->name}}</h5>
                   <span>{{$order->district->district_name}}</span>
               </div>
               <div class="col-2 conl"style="width: 15%;">
               <h5>Phone Number</h5>
                   <span>{{$order->phone}}</span>
               </div>
               <div class="col-2 conl"style="width: 15%;">
               <h5>Payment Method</h5>
                   <span>{{$order->payment_method}}</span>
               </div>
               <div class="col-2 conl"style="width: 15%;">
               <h5>Total Amount</h5>
                   <span>{{$order->amount}} $</span>
               </div>
           </div>


                @if($order->status == 'pending')
                <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Proccessing</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Order Transfer </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Deleveried</span> </div>
                </div>
                @elseif($order->status == 'processing')
                <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Order Proccessing</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Order Transfer </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Deleveried</span> </div>
                </div>
                @elseif($order->status == 'transfer')
                <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Proccessing</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order Transfer </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Deleveried</span> </div>
                </div>
                @elseif($order->status == 'deleveried')
                <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Proccessing</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Order Transfer</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Deleveried</span> </div>
                </div>
                @endif



            <hr>


        </div>
    </article>
</div>
@endsection
