@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid ">
    <div class="row">
        <div class="col-12 " >
            <div class="col-lg-12">
                <div class="card mb-4" >
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Admin List</h6>
                        <a href="{{route('add.role')}}">
                        <button  style="float: right;" class="btn btn-info">
                            Add Admin
                        </button>
                        </a>

                    </div>
                    <div class="table-responsive p-3" style="border-radius:10px">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        @php($id=0)
                        <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Access</th>
                                    <th>Action </th>

                                </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $key)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td><img style="width: 60px;height:60px;" src="{{asset($key->avatar)}}" alt=""></td>
                                    <td>{{$key->name}}</td>
                                    <td>{{$key->email}}</td>
                                    <td style="width: 40%;">
                                    @if($key->category == 1)
                                    <span class="bade badge-pill badge-danger">category</span>
                                    @else
                                    @endif

                                    @if($key->state_order == 1)
                                    <span class="bade badge-pill badge-secondary">state_order</span>
                                    @else
                                    @endif

                                    @if($key->product == 1)
                                    <span class="bade badge-pill badge-success">product</span>
                                    @else
                                    @endif

                                    @if($key->user == 1)
                                    <span class="bade badge-pill badge-primary">user</span>
                                    @else
                                    @endif

                                    @if($key->ship == 1)
                                    <span class="bade badge-pill badge-danger">ship</span>
                                    @else
                                    @endif

                                    @if($key->coupon == 1)
                                    <span class="bade badge-pill badge-warning">coupon</span>
                                    @else
                                    @endif

                                    @if($key->return_order == 1)
                                    <span class="bade badge-pill badge-info">return_order</span>
                                    @else
                                    @endif

                                    @if($key->brand == 1)
                                    <span class="bade badge-pill badge-light">brand</span>
                                    @else
                                    @endif

                                    @if($key->slider == 1)
                                    <span class="bade badge-pill badge-dark">slider</span>
                                    @else
                                    @endif

                                    @if($key->access == 1)
                                    <span class="bade badge-pill badge-dark">access</span>
                                    @else
                                    @endif

                                    </td>

                                    <td>
                                        <div class="btn btn-info"><a class="abrands" href="{{route('role.edit',$key->id)}}">Edit</a></div>
                                        <div  class="btn btn-danger "><a class="abrands deleted" href="{{route('category.delete',$key->id)}}">Delete</a></div>
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
