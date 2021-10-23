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
                    <h5 class="modal-title title"  id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row rowmodal">
                        <div class="col-4 rolwcol">
                            <img style="width: 140px; height : 174px" class="imgmodal" src="" alt="">
                        </div>
                        <div class="col-4 rolwcol" style="width: 50%;padding-left:20px;line-height:25px">
                            <div><span>Product price : <strong class="price pr-5 hoa"></strong><del class="selling_price"></del> </span></div>
                            <div><span>Product code : <strong class="code hoa"></strong></span></div>
                            <div><span>Product category : <strong class="category hoa"></strong></span></div>
                            <div><span>Product brand : <strong class="brand hoa"></strong></span></div>
                            <div><span>Product status : <strong class="status hoa"></strong></span></div>
                        </div>
                        <div class="col-4 rolwcol">
                            <form action="">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Color</label>
                                    <select  class="selectcolor form-control" id="exampleFormControlSelect1">
                                        <option disabled selected=''>Choose Color</option>


                                    </select>
                                </div>
                                <div class="form-group bigsize">
                                    <label for="exampleFormControlSelect1">Size</label>
                                    <select class="form-control selectsize" id="exampleFormControlSelect1">
                                        <option disabled selected=''>Choose Size</option>


                                    </select>
                                </div>
                                <div class="btn btn-info" style="width: 100%;">Add to Cart</div>
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
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    function productview(id){
        $.ajax({
            type : 'get',
            url : '/product/modal/' + id,
            dataType:'json',
            success : function(data){
                $('.title').text(data.product.product_name_en);

                if(data.product.discount_price == null){
                    $('.price').text((data.product.selling_price).toLocaleString() + '$');
                    $('.selling_price').text('');
                }
              else{
                $('.price').text((data.product.discount_price).toLocaleString() + '$');
                $('.selling_price').text((data.product.selling_price).toLocaleString() + '$');
              }
                $('.code').text(data.product.product_color_en);
                $('.category').text(data.category);
                $('.brand').text(data.brand);
                if(data.product.product_qty >0){
                    $('.status').text('Avaible');
                    $('.status').addClass('colorstatus');
                }
                else{
                    $('.status').text('StockOut');
                    $('.status').addClass('colorstatusOut');
                }

                $('.imgmodal').attr('src','/'+data.product.product_thambnail);

                $('.selectcolor').empty();
                $.each(data.color,function(key,values){
                    $('.selectcolor').append('<option value="'+values+'"> '+values+'</option>')
                })

                $('.selectsize').empty();
                if(data.size == ''){
                $('.bigsize').hide();
                }
                else{
                    $.each(data.size,function(key,values){
                    $('.selectsize').append('<option value="'+values+'"> '+values+'</option>')
                })
                }


            }
        })
    }
</script>
</body>

</html>
