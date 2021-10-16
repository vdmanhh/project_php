@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 ">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Product Manager</h6>
                    </div>
                    <div class="table-responsive p-3" style="border-radius:10px">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">



                            <thead class="thead-light">
                                <tr>

                                    <th>Image </th>
                                    <th>Product Name En</th>
                                    <th>Product Quantity</th>
                                    <th>Product Price</th>
                                    <th>Prodcut Discount </th>
                                    <th>Status</th>
                                    <th>Action</th>


                                </tr>
                            </thead>

                            <tbody>
                                @foreach($products as $key)
                                <tr>

                                    <td><img style="width: 80px;height:80px;border:1px solid white" src="{{asset($key->product_thambnail)}}" alt=""></td>
                                    <td>{{$key->product_name_en}}</td>
                                    <td>{{$key->product_qty}}</td>
                                    <td>{{$key->selling_price}} $</td>
                                    <td>
                                        @if($key->discount_price =='null')
                                        <span class="badge badge-warning" style="padding:5px 10px">No Discount</span>
                                        @else
                                            @php
                                            $count = $key->selling_price - $key->discount_price;
                                            $per = ($count/$key->selling_price) * 100;
                                            @endphp
                                            <span class="badge badge-warning" style="padding:5px 10px">{{round($per)}} %</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($key->status == '1')
                                            <span class="badge badge-success" style="padding:5px 10px">Active</span>
                                        @else
                                        <span class="badge badge-warning" style="padding:5px ">InActive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn btn-info"><a class="abrands" href="{{route('product.edit',$key->id)}}">Edit</a></div>
                                        <div class="btn btn-danger "><a class="abrands deleted" href="{{route('product.delete',$key->id)}}">Delete</a></div>
                                        @if($key->status == '0')
                                        <a  href="{{route('active',$key->id)}}" class="btn btn-success bnrn" style="padding-right :18px;padding-left :18px">Active</a>

                                        @else
                                        <a href="{{route('inactive',$key->id)}}" class="btn btn-warning bnrn">InActive</a>
                                        @endif

                                    </td>

                                </tr>
                                @endforeach




                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
@endsection
