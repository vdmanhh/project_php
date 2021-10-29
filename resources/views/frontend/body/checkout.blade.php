@extends('frontend.body.home_user')

@section('home')
<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <form class="register-form" method="POST" action="{{route('form.checkout')}}">
                @csrf
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 rht-col" style="width: 60%;">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                        <span>Checkout</span>
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-heading">

                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in" style="background-color: white;">

                                    <!-- panel-body  -->
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 already-registered-login">



                                                <div class="form-group">
                                                    <label style="font-size: 14px;" class="info-title" for="exampleInputEmail1">Shipping name <span>*</span></label>
                                                    <input name="shipping_name" type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required="" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label style="font-size: 14px;" class="info-title" for="exampleInputPassword1">Email <span>*</span></label>
                                                    <input name="email" type="text" class="form-control unicase-form-control text-input" id="exampleInputPassword1" required="" placeholder="">

                                                </div>
                                                <div class="form-group">
                                                    <label style="font-size: 14px;" class="info-title" for="exampleInputPassword1">Phone <span>*</span></label>
                                                    <input name="phone" type="text" class="form-control unicase-form-control text-input" id="exampleInputPassword1" required="" placeholder="">

                                                </div>
                                                <div class="form-group">
                                                    <label style="font-size: 14px;" class="info-title" for="exampleInputPassword1">Post code <span>*</span></label>
                                                    <input name="post_code" type="text" class="form-control unicase-form-control text-input" id="exampleInputPassword1" required="" placeholder="">

                                                </div>


                                            </div>

                                            <div class="col-md-6 col-sm-6 already-registered-login">


                                                <div class="form-group">
                                                    <label style="font-size: 14px;" class="info-title" for="exampleInputEmail1">Select Division<span>*</span></label>
                                                    <select name="division_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select </option>
                                                        @foreach($divsions as $key)
                                                        <option value="{{$key->id}}">{{$key->name_disvision}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label style="font-size: 14px;" class="info-title" for="exampleInputPassword1">Select District <span>*</span></label>
                                                    <select name="district_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select </option>

                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label style="font-size: 14px;" class="info-title" for="exampleInputPassword1">Select State <span>*</span></label>
                                                    <select name="state_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select </option>

                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label style="font-size: 14px;" class="info-title" for="exampleInputPassword1">Password <span>*</span></label><br>
                                                    <textarea class="form-control" required="" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>

                                                </div>


                                            </div>
                                            <!-- already-registered-login -->

                                        </div>

                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->

                            <!-- checkout-step-06  -->

                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 sidebar " style="width: 40%;">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Infomation Product Checkout</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            <div class="" style="display: flex;flex-wrap:wrap">
                                                @foreach($carts as $key)
                                                <div style="width: 50%;">
                                                    <li><strong>Image : </strong> <img style="width: 80px;height:80px" src="{{asset($key->options->image)}}" alt=""></li>
                                                    <br>
                                                    <li style="display: flex;">
                                                        <div style="padding-right: 20px;"><strong>Qty :</strong>{{$key->qty}}</div>
                                                        <div style="padding-right: 20px;"> <strong>Size :</strong>{{$key->options->size}}</div>
                                                        <div style="padding-right: 20px;"> <strong>Color :</strong>{{$key->options->color}}</div>
                                                    </li>
                                                    <hr>
                                                </div>
                                                @endforeach
                                            </div>
                                            @if(Session::has('coupon'))
                                            <li><strong>Sub Total :</strong> {{$cartTotal}} $</li>
                                            <hr>

                                            <li><strong>Coupon Name :</strong> {{Session::get('coupon')['coupon_name']}}</li>
                                            <hr>

                                            <li><strong>Coupon Discount :</strong> - {{Session::get('coupon')['discount']}} %</li>
                                            <hr>

                                            <li><strong>Discount Mount :</strong> - {{session()->get('coupon')['discount_mount']}} $</li>
                                            <hr>

                                            <li><strong>Grand Total :</strong>{{session()->get('coupon')['total_mount']}} $</li>
                                            @else
                                            <li><strong>Sub Total :</strong>{{$cartTotal }} $</li>
                                            <hr>

                                            <li><strong>Grand Total :</strong>{{$cartTotal }}$</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>
                                    <div class="">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label for="" class="pr-3">Stripe</label>
                                                <input type="radio" name="payment_method" value="stripe">
                                                <br>
                                                <img style="width: 80px;height:60px;border:1px solid #dbdada" src="{{asset('frontend/images/stripe.png')}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="pr-3">Cash</label>
                                                <input type="radio" name="payment_method" value="cash"> <br>
                                                <img style="width: 80px;height:60px;border:1px solid #dbdada" src="{{asset('frontend/images/cash.png')}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="pr-3">Cart</label>
                                                <input type="radio" name="payment_method" value="cart"> <br>
                                                <img style="width: 80px;height:60px;border:1px solid #dbdada" src="{{asset('frontend/images/visa.png')}}">
                                            </div>

                                        </div>
                                        <br>
                                        <button class="btn btn-info" type='submit'>Checkout</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div><!-- /.row -->
            </form>
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">

            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item m-t-10">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->
                </div><!-- /.owl-carousel #logo-slider -->
            </div><!-- /.logo-slider-inner -->

        </div><!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
