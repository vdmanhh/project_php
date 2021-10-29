<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ManhD.Vu</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

    <!-- Customizable CSS -->
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

    <!-- Icons/Glyphs -->

    <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/2.css')}}">
    <link rel="stylesheet" href="{{asset('backend/1.css')}}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('backend/1.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.sidebar.header')
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-vs" id="top-banner-and-menu">
        @yield('home')
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->

    <!-- ============================================== INFO BOXES ============================================== -->
    <div class="row our-features-box">
        <div class="container">
            <ul>
                <li>
                    <div class="feature-box">
                        <div class="icon-truck"></div>
                        <div class="content-blocks">We ship worldwide</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-support"></div>
                        <div class="content-blocks">call
                            +1 800 789 0000</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-money"></div>
                        <div class="content-blocks">Money Back Guarantee</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-return"></div>
                        <div class="content">30 days return</div>
                    </div>
                </li>

            </ul>
        </div>

        <div class="notice"></div>
    </div>

    <!-- modal product -->

    <div class="modal fade fadess" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title titlees" id="exampleModalLabel"></h5>
                    <button type="button" id="closeModel" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row rowmodal">
                        <div class="col-4 rolwcol">
                            <img style="width: 140px; height : 174px" class="imgmodal" src="" alt="">
                        </div>
                        <div class="col-4 rolwcol" style="width: 50%;padding-left:20px;line-height:25px">
                            <div><span>Product price : <strong class="pricess pr-5 hoa"></strong><del class="selling_price"></del> </span></div>
                            <div><span>Product code : <strong class="code hoa"></strong></span></div>
                            <div><span>Product category : <strong class="category hoa"></strong></span></div>
                            <div><span>Product brand : <strong class="brand hoa"></strong></span></div>
                            <div><span>Product status : <strong class="status hoa"></strong></span></div>
                        </div>
                        <div class="col-4 rolwcol">
                            <form action="">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Color</label>
                                    <select class="selectcolor form-control" id="exampleFormControlSelect1">
                                        <option disabled selected=''>Choose Color</option>


                                    </select>
                                </div>
                                <div class="form-group bigsizee">
                                    <label for="exampleFormControlSelect1">Size</label>
                                    <select class="form-control selectsize" id="exampleFormControlSelect1">
                                        <option disabled selected=''>Choose Size</option>


                                    </select>
                                </div>
                                <div class="form-group bigsizes">
                                    <label for="exampleFormControlSelect1">Quantity</label>
                                    <input type="number" class="qtyys">
                                </div>

                                <input class="inputhiden" type="hidden">
                                <!-- <button type="submit"onclick="addToCart()" class="btn btn-info" style="width: 100%;">Add to Cart</button> -->
                                <button type="button" class="btn btn-primary mb-2" onclick="addToCart()">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- /.info-boxes -->
    <!-- ============================================== INFO BOXES : END ============================================== -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.sidebar.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->

    <script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/echo.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        @if(Session::has('message'))
        var type = '{{Session::get("alert-type","info")}}'
        var notice = document.querySelector('.notice')
        switch (type) {
            case 'info':
                notice.innerHTML = "{{Session::get('message')}}";
                notice.style.background = 'blue'
                notice.classList.add('actives')
                setTimeout(() => {
                    notice.classList.remove('actives')
                }, 4000)
                break;

            case 'success':
                notice.innerHTML = "{{Session::get('message')}}";
                notice.style.background = 'green'
                notice.classList.add('actives')
                setTimeout(() => {
                    notice.classList.remove('actives')
                }, 4000)
                break;

            case 'warning':
                notice.innerHTML = "{{Session::get('message')}}";
                notice.style.background = 'orange'
                notice.classList.add('actives')

                setTimeout(() => {
                    notice.classList.remove('actives')
                }, 4000)
                break;

        }
        @endif
    </script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function productview(id) {
            $.ajax({
                type: 'get',
                url: '/product/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    $('.titlees').text(data.product.product_name_en);
                    $('.inputhiden').val(data.product.id);
                    $('.qtyys').val(1);
                    if (data.product.discount_price == null) {
                        $('.pricess').text((data.product.selling_price).toLocaleString() + '$');
                        $('.selling_price').text('');
                    } else {
                        $('.pricess').text((data.product.discount_price).toLocaleString() + '$');
                        $('.selling_price').text((data.product.selling_price).toLocaleString() + '$');
                    }
                    $('.code').text(data.product.product_color_en);
                    $('.category').text(data.category);
                    $('.brand').text(data.brand);
                    if (data.product.product_qty > 0) {
                        $('.status').text('Avaible');
                        $('.status').removeClass('colorstatusOut');
                        $('.status').addClass('colorstatus');
                    } else {
                        $('.status').text('StockOut');
                        $('.status').removeClass('colorstatus');
                        $('.status').addClass('colorstatusOut');
                    }

                    $('.imgmodal').attr('src', '/' + data.product.product_thambnail);

                    $('.selectcolor').empty();
                    $.each(data.color, function(key, values) {
                        $('.selectcolor').append('<option value="' + values + '"> ' + values + '</option>')
                    })

                    $('.selectsize').empty();


                    $.each(data.size, function(key, values) {
                        $('.selectsize').append('<option value="' + values + '"> ' + values + '</option>')
                        if (data.size == '') {
                            $('.bigsizee').hide();
                        } else {
                            $('.bigsizee').show();
                        }

                    })



                }
            })
        }

        function addToCart() {

            var product_id = $('.inputhiden').val();
            var product_name = $('.titlees').text();
            var color = $('.selectcolor option:selected').text();
            var size = $('.selectsize option:selected').text();
            var quantity = $('.qtyys').val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    id: product_id,
                    name: product_name,
                    color: color,
                    quantity: quantity,
                    size: size,
                },
                url: '/product/add/cart/',
                success: function(datas) {
                    miniCart();

                    $('#closeModel').click();


                    if ($.isEmptyObject(datas.error)) {
                        var color = 'successWish';
                        noticeAler(color, datas.success)
                    } else {
                        var color = 'failWish';
                        noticeAler(color, datas.error);
                    }
                }
            })
        }
    </script>
    <script>
        function miniCart() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/minicart/',
                success: function(value) {
                    var miniCart = "";
                    $('.count').text(value.cartQty);
                    $('.carttotal').text(value.cartTotal + '$');
                    $('.nedan').text(value.cartTotal + '$');
                    $.each(value.carts, function(k, val) {
                        miniCart += `<div class="cart-item product-summary">
                                    <div class="row "><div class="col-xs-4">
                                            <div class="image"> <a href="detail.html"><img src="/${val.options.image}" alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">

                                          <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                                            <div class="price"> ${val.price} * ${val.qty}</div>

                                        </div>
                                        <button type="button" class="col-xs-1 action" id='${val.rowId}' onclick='removeCart(this.id)'> <a href="#"><i class="fa fa-trash"></i></a>  </div> </div></button> <br>`;

                        $('.minicart').html(miniCart);
                    })
                }
            })
        }
        miniCart();
        //remove cart
        function removeCart(rowId) {
            console.log(rowId);
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/remove/cart/' + rowId,
                success: function(key) {
                    miniCart();

                    if ($.isEmptyObject(key.error)) {
                        var color = 'successWish';
                        noticeAler(color, key.success)
                    } else {
                        var color = 'failWish';
                        noticeAler(color, key.error);
                    }

                }
            })
        }
    </script>
    <script>
        function noticeAler(color, content) {

            $('.notice').removeClass('successWish');
            $('.notice').removeClass('failWish');
            $('.notice').text(content);
            $('.notice').addClass('actives');
            $('.notice').addClass(color); //background
            setTimeout(() => {
                $('.notice').removeClass('actives');
            }, 4000)

        }
    </script>

    <script>
        function addToWishList(id) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/add/wishlist/' + id,
                success: function(data) {

                    if (data.success) {
                        var color = 'successWish';
                        noticeAler(color, data.success)
                    } else {
                        var color = 'failWish';
                        noticeAler(color, data.error);
                    }
                }
            })
        }
    </script>

    <script>
        function getWishlish() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/wishlist/get/wishlish/',
                success: function(data) {
                    console.log(data)
                    var key = '';
                    $.each(data, function(k, val) {
                        key += `<tr>
					<td class="col-md-3 col-sm-6 col-xs-6"><img style="width : 200px;height:200px" src="/${val.product.product_thambnail}" alt="imga"></td>
					<td class="col-md-7 col-sm-6 col-xs-6">
						<div class="product-name"><a href="#" class="titlees">${val.product.product_name_en}</a></div>
						<div class="rating">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( 06 Reviews )</span>
                            <input class="inputhiden" value='${val.product.id}' type="hidden">
                            <input class="qtyys" value='1' type="hidden">



						</div>
						<div class="price">
						${val.product.discount_price}
							<span>	${val.product.selling_price}</span>
						</div>
					</td>


					<td class="col-md-1 ">
						<button data-toggle="modal"data-target="#exampleModal" id="${val.product.id}" onclick="productview(this.id)" class="btn-upper btn btn-primary"><i class="fa fa-shopping-cart"></i> </button>
					</td>


					<td class="col-md-1 close-btn">
						<button type='button' id='${val.id}'onclick='removeWish(this.id)' class=""><i class="fa fa-times"></i></button>
					</td>
				</tr>`;

                        $('.tbody').html(key);
                    })
                }
            })
        }

        getWishlish();
    </script>

    <script>
        function removeWish(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/wishlist/remove/wishlist/" + id,
                success: function(key) {
                    getWishlish();

                    if (key.success) {
                        var color = 'successWish';
                        noticeAler(color, key.success)
                    } else {
                        var color = 'failWish';
                        var contend = 'Remove wishlist was fail';
                        noticeAler(color, contend);
                    }
                    getWishlish();
                }
            })
        }
    </script>

    <script>
        function getCarts() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/get/cart/user/',
                success: function(data) {
                    console.log(data);
                    var rows = '';
                    $.each(data.carts, function(k, val) {
                        rows += ` <tr>

                            <td class="cart-image">
                                <a class="entry-thumbnail" href="detail.html">
                                    <img style="width:80px;height:80px" src="/${val.options.image}" alt="">
                                </a>
                            </td>
                            <td class="cart-product-name-info" style="width:20%">
                                <h4 class='cart-product-description'><a href="detail.html">${val.name}</a></h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="rating rateit-small"></div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="reviews">
                                            (06 Reviews)
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                            </td>

                            <td class="cart-product-edit"><p class="product-edit">${val.options.color}</p></td>

                            <td class="cart-product-quantity">
                              ${val.qty >1 ?`
                                <button type="button"  id='${val.rowId}' onclick='cartDecre(this.id)' class="btn btn-danger">-</button>
                                `:`
                                <button type="button" disabled class="btn btn-danger">-</button>
                                `}

                                <input style="width: 30px;text-align:center" type="number" disabled value="${val.qty}">
                                <button type="button" id='${val.rowId}' onclick='cartIncre(this.id)' class="btn btn-success">+</button>
                            </td>
                            <td class="cart-product-sub-total"><span class="cart-sub-total-price">
                            ${val.options.size == null ? `...` : `${val.options.size}`}

                            </span></td>
                            <td class="cart-product-grand-total"><span class="cart-grand-total-price">${val.subtotal} $</span></td>
                            <td class="romove-item"><button type="button" title="cancel" id='${val.rowId}' onclick='removeCartUser(this.id)' class="btn btn-info">Delete</button></td>
                            </tr>`;

                            $('.tbodycartss').html(rows);
                    })
                }
            })
        }
        getCarts()
    </script>

    <script>
        function removeCartUser(rowId){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/remove/cart-user/" + rowId,
                success: function(key) {
                    getCarts()
                    miniCart();
                    getValCoupon()
                    $('.tablecoupon').show();
                    if (key.success) {
                        var color = 'successWish';
                        noticeAler(color, key.success)
                    } else {
                        var color = 'failWish';
                        var contend = 'Remove cart was fail';
                        noticeAler(color, contend);
                    }

                }
            })
        }
    </script>

    <script>
        function cartDecre(rowId){
                $.ajax({
                    type :'GET',
                    dataType:'json',
                    url : '/decre/cart/'+rowId,
                    success :function(data){
                        getCarts()
                    miniCart();
                    getValCoupon()
                    }
                })
        }
        function cartIncre(rowId){
            $.ajax({
                    type :'GET',
                    dataType:'json',
                    url : '/incre/cart/'+rowId,
                    success :function(data){
                        getCarts()
                    miniCart();
                    getValCoupon()
                    }
                })
        }
    </script>

    <script>
        function checkCoupon(){
                var val = $('.couponval').val();
                if(val==''){
                    var color = 'failWish';
                        var contend = 'You need to enter the discount code ';
                        noticeAler(color, contend);
                }else{
                    $.ajax({
                       type :'POST',
                       dataType:'json',
                       data:{
                           'coupon_name' : val
                       },
                       url:'/check/coupon/',
                       success:function(data){
                        getValCoupon();

                        if (data.success) {
                        var color = 'successWish';
                        noticeAler(color, data.success)
                        $('.tablecoupon').hide();
                             } else {
                        var color = 'failWish';
                        var contend = 'Remove cart was fail';
                        noticeAler(color, data.error);
                        $('.couponval').val('');
                    }
                       }
                    })
                }
        }


        function getValCoupon(){
            $.ajax({
                type:'GET',
                dataType:'json',
                url:'/get/coupon/total',
                success:function(key){
                    var bien =''
                    console.log(key);
                    if(key.subTotal){
                        bien += `<table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="cart-sub-total">
                                                Subtotal<span class="inner-left-md">$${key.subTotal}</span>
                                            </div>
                                            <div class="cart-grand-total">
                                                Grand Total<span class="inner-left-md">$${key.subTotal}</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="cart-checkout-btn pull-right">
                                                <a href="{{route('checkout')}}"><button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button></a>

                                                </div>
                                            </td>
                                        </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->`

                            $('.usbbbtotal').html(bien);
                    }else{
                        bien += `<table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="cart-sub-total">
                                                Subtotal<span class="inner-left-md">$${key.total_sub}</span>
                                            </div>
                                            <div class="cart-sub-total">
                                                <span style='padding-right:19px'>Name Coupon</span><span class="inner-left-md">${key.coupon_name}</span>
                                                <button class='btn btn-danger'type='button' onclick='removerCoupon()'>X</button>
                                            </div>
                                            <div class="cart-sub-total">
                                            <span class="inner-left-md"style='padding-right:66px'>Discount</span><span class="inner-left-md">${key.discount} %</span>
                                            </div>
                                            <div class="cart-sub-total">
                                            Discount Mount<span class="inner-left-md">- $${key.discount_mount}</span>
                                            </div>
                                            <div class="cart-grand-total">
                                                Grand Total<span class="inner-left-md">$${key.total_mount}</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="cart-checkout-btn pull-right">
                                                <a href="{{route('checkout')}}"><button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button></a>

                                                </div>
                                            </td>
                                        </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->`

                            $('.usbbbtotal').html(bien);
                    }
                }
            })
        }

        getValCoupon();

        function removerCoupon(){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/remove/couponss/",
                success: function(keys) {
              $('.tablecoupon').show();
                     getValCoupon();
                     $('.couponval').val('');
                    if (keys.success) {
                        var color = 'successWish';
                        noticeAler(color, keys.success)
                    } else {
                        var color = 'failWish';
                        var error = 'Remove coupon was fail';
                        noticeAler(color,error);
                    }

                }
            })
        }
    </script>
    <script>
     $(document).ready(function () {
        $('select[name="division_id"]').on('change',function(){
                var val = $(this).val();
           $.ajax({
               type : 'GET',
               dataType:'json',
               url : '/get/districts/'+val,
               success : function(data){

                   var a = '';
                   $('select[name="state_id"]').empty();
                   $('select[name="district_id"]').empty();
                   $.each(data,function(key,vl){

            $('select[name="district_id"]').append(`<option value="${vl.id}" >${vl.district_name} </option>`)
                   })
               }
           })
        })



        $('select[name="district_id"]').on('change',function(){
                var val = $(this).val();
           $.ajax({
               type : 'GET',
               dataType:'json',
               url : '/get/states/'+val,
               success : function(data){

                   var a = '';
                   $('select[name="state_id"]').empty();
                   $.each(data,function(key,vl){

                       $('select[name="state_id"]').append( `<option value="${vl.id}" >${vl.state_name} </option>`)
                   })
               }
           })
        })
     });
    </script>

</body>


</html>
