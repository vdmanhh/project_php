@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

$user = Auth::user();
@endphp

<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{$prefix == '/admin' ? 'activess' : ''}}">
        <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="colorsw">Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>

    @if($user->category ==1)
    <li class="nav-item manhs  {{$prefix == '/category' ? 'activess' : ''}}">
        <a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Category</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('category')}}">All category</a>
                <a class="collapse-item" href="{{route('subcategory')}}">All Subcategory</a>
                <a class="collapse-item" href="{{route('subsubcate')}}">All SubSubCategory</a>
            </div>
        </div>
    </li>

    @else
    @endif


    @if($user->state_order ==1)
    <li class="nav-item  {{$prefix == '/orders' ? 'activess' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Order</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('order.pending')}}">Pending Order</a>
                <a class="collapse-item" href="{{route('order.processing')}}">Processing Order</a>
                <a class="collapse-item" href="{{route('order.transfer')}}">Transfer Order</a>
                <a class="collapse-item" href="{{route('order.delevery')}}">Deleveried Order</a>
                <a class="collapse-item" href="{{route('order.cancel')}}">Cancel Order</a>
            </div>
        </div>
    </li>
    @else
    @endif



    @if($user->product ==1)
    <li class="nav-item {{$prefix == '/product' ? 'activess' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Product</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tables</h6>
                <a class="collapse-item" href="{{route('product')}}">Add Product</a>
                <a class="collapse-item" href="{{route('product.manager')}}">Manager Product</a>
            </div>
        </div>
    </li>
    @else
    @endif

    @if($user->ship ==1)
    <li class="nav-item {{$prefix == '/ship' ? 'activess' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Manager Ship</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('ship')}}">Shipping</a>
                <a class="collapse-item" href="{{route('district')}}">District</a>
                <a class="collapse-item" href="{{route('state')}}">State Ship</a>
            </div>

        </div>
    </li>
    @else
    @endif

    @if($user->coupon ==1)
    <li class="nav-item {{$prefix == '/coupon' ? 'activess' : ''}}">
        <a class="nav-link" href="{{route('coupon')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Coupon</span>
        </a>
    </li>
    @else
    @endif

    @if($user->brand ==1)
    <li class="nav-item {{$prefix == '/brand' ? 'activess' : ''}}">
        <a class="nav-link" href="{{route('brand')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Brand</span>
        </a>
    </li>
    @else
    @endif

    @if($user->slider ==1)
    <li class="nav-item {{$prefix == '/slider' ? 'activess' : ''}}">
        <a class="nav-link" href="{{route('slider')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Slider</span>
        </a>
    </li>
    @else
    @endif


    @if($user->user ==1)
    <li class="nav-item {{$prefix == '/user' ? 'activess' : ''}}">
        <a class="nav-link" href="{{route('user.alls')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Manager User</span>
        </a>
    </li>
    @else
    @endif

    @if($user->return_order ==1)
    <li class="nav-item {{$prefix == '/return' ? 'activess' : ''}}">
        <a class="nav-link" href="{{route('order.returns')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Return Order</span>
        </a>
    </li>
    @else
    @endif


    @if($user->access ==1)
    <li class="nav-item {{$prefix == '/role' ? 'activess' : ''}}">
        <a class="nav-link" href="{{route('role')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Role User</span>
        </a>
    </li>
    @else
    @endif

    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
