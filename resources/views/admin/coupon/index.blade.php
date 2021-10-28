@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid ">
    <div class="row">
        <div class="col-8 " >
            <div class="col-lg-12">
                <div class="card mb-4" >
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Coupon List</h6>
                    </div>
                    <div class="table-responsive p-3" style="border-radius:10px">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        @php($id=0)
                        <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Coupon name</th>
                                    <th>Discount </th>
                                    <th>Date Valid</th>
                                    <th>Status</th>
                                    <th>Action </th>

                                </tr>
                            </thead>

                            <tbody>
                            @foreach($coupons as $key)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$key->name_coupon}}</td>
                                    <td>{{$key->discount}}</td>
                                    <td>{{$key->date}}</td>
                                    <td>{{$key->status}}</td>
                                    <td>
                                        <div class="btn btn-info"><a class="abrands" href="{{route('coupon.edit',$key->id)}}">Edit</a></div>
                                        <div  class="btn btn-danger "><a class="abrands deleted" href="{{route('coupon.delete',$key->id)}}">Delete</a></div>
                                    </td>

                                </tr>
                            @endforeach




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4" style="background-color: white;border: 1px solid #e3e2e2;border-radius:10px; height:600px">
            <h3 class="text-primary" style="font-weight:bold;text-align: center;padding-top:20px">Add Coupon</h3>
            <form method="post" enctype="multipart/form-data" action="{{route('add.coupon')}}" class="mt-3 mb-5" style="width: 80%; margin:auto">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Coupon name</label>
                    <input type="text" name="name_coupon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name coupon">

                </div>
                @error('name_coupon')
                        <span style="color: red;">Fill out information</span>
                @enderror

                <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Discount</label>
                    <input name="discount" type="text" class="form-control mb-2" id="exampleInputPassword1" placeholder="Enter discount">

                </div>
                @error('discount')
                        <span style="color: red;">Fill out information</span>
                @enderror

                <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Date Valid</label>
                    <input name="date" type="date" class="form-control mb-2" id="exampleInputPassword1">

                </div>
                @error('date')
                        <span style="color: red;">Fill out information</span>
                @enderror
                    <br>




                <button type="submit" class="btn btn-primary">Add Coupon</button>
            </form>
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
