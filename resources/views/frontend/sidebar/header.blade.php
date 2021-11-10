<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        @auth
                        <li class="myaccount" style="cursor: pointer;color:white" data-toggle="modal" data-target="#tracking"><span>My Tracking</span></li>
                        @else
                        @endauth
                        <li class="wishlist"><a href="{{route('wishlist')}}"><span>Wishlist</span></a></li>
                        <li class="header_cart hidden-xs"><a href="{{route('carts')}}"><span>My Cart</span></a></li>
                        <li class="check"><a href="#"><span>Checkout</span></a></li>
                        @auth
                        <li class="login"><a href="{{route('user.info')}}"><span>User</span></a></li>
                        @else
                        <li class="login"><a href="{{route('login')}}"><span>Login/Register</span></a></li>
                        @endauth
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small lang"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">Language </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if(session()->get('language') == 'korean')
                                <li><a href="{{route('english')}}">English</a></li>
                                @else
                                <li><a href="{{route('korean')}}">Korean</a></li>
                                @endif


                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{route('home')}}"> <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form action="{{route('search')}}" method="POST">
                            @csrf
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input onfocus="search_result_show()" onblur="search_result_hide()" class="search-field" id="searchs" name="search" placeholder="Search here..." />
                                <button type="submit" class="search-button">Search</button>
                                <!-- <a class="search-button" href="#"></a> -->
                            </div>
                        </form>


                    </div>
                    <!-- /.search-area -->
                    <div id="searchProducts" style="background-color: white;position: absolute;z-index: 99;width: 99%;margin-top: 10px;border-radius: 15px ;">
                            <div class="container mt-5">
                                <div class="row d-flex justify-content-center ">
                                    <div class="col-md-6">
                                        <div class="card carsearch">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <div class="basket-item-count"><span class="count">2</span></div>
                                    <div class="total-price-basket"> <span class="lbl">Shopping Cart</span> <span class="value carttotal"></span> </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="minicart">

                                </div>





                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price nedan'>$600.00</span> </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->
    <div class="modal fade" id="tracking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Tracking Order</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('tracking')}}" method="POST">
                        @csrf
                        <label for="">Invoid Code</label>
                        <input name="code" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter invoide code">
                        <button class="btn btn-info " style="margin-top: 10px;">Check now</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown"> <a href="home.html">Home</a> </li>
                                @php
                                $cates = App\Models\Category::latest()->get();

                                @endphp
                                @foreach($cates as $key)
                                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                        @if(session()->get('language') == 'korean')
                                        {{$key->category_name_hin}}
                                        @else
                                        {{$key->category_name_en}}
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                    @php
                                                    $subs = App\Models\SubCategory::where('category_id',$key->id)->get();

                                                    @endphp
                                                    @foreach($subs as $value)
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <a href="{{route('category.page',$value->id)}}">
                                                            <h2 class="title titlemenu">

                                                                @if(session()->get('language') == 'korean')
                                                                {{$value->subcategory_name_hin}}
                                                                @else
                                                                {{$value->subcategory_name_en}}
                                                                @endif
                                                            </h2>
                                                        </a>
                                                        <ul class="links">
                                                            @php
                                                            $subsubs = App\Models\SubSubCategory::where('subcategory_id',$value->id)->get();

                                                            @endphp
                                                            @foreach($subsubs as $values)
                                                            <li><a href="{{route('subsubcategory.page',$values->id)}}">

                                                                    @if(session()->get('language') == 'korean')
                                                                    {{$values->subsubcategory_name_hin}}
                                                                    @else
                                                                    {{$values->subsubcategory_name_en}}
                                                                    @endif

                                                                </a></li>
                                                            @endforeach
                                                        </ul>

                                                    </div>
                                                    @endforeach
                                                    <!-- /.col -->


                                                    <!-- /.col -->

                                                    <!-- /.col -->

                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/top-menu-banner.jpg')}}" alt=""> </div>
                                                    <!-- /.yamm-content -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                                <li class=""> <a href="{{route('shop')}}">SHOP</a> </li>

                                </li>
                                <li class="dropdown  navbar-right special-menu"> <a href="#">Get 30% off on selected items</a> </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
<script>
  function search_result_hide(){
    $("#searchProducts").slideUp();
  }
   function search_result_show(){
      $("#searchProducts").slideDown();
  }
</script>
