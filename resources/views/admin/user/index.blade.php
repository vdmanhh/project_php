@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid ">
    <div class="row">
        <div class="col-12 " >
            <div class="col-lg-12">
                <div class="card mb-4" >
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">User List  : <span class="badge badge-pill badge-danger">{{count($users)}}</span></h6>
                    </div>
                    <div class="table-responsive p-3" style="border-radius:10px">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        @php($id=0)
                        <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Image</th>
                                    <th>Name </th>
                                    <th>Email </th>

                                    <th>Status </th>
                                    <th>Action </th>

                                </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $key)
                                <tr>
                                    <td>{{$id++}}</td>
                                    @if(!empty($key->avatar))

                                    @if($key->type == 1)
                        <td><img style="width: 80px;height:80px;" src="{{url('upload/admin/'.$key->avatar)}} " alt=""></td>
                                    @elseif($key->type == 0)
                        <td><img style="width: 80px;height:80px;" src="{{url('upload/user/'.$key->avatar)}} " alt=""></td>
                                    @else
                                    <td><img style="width: 80px;height:80px;" src="{{asset($key->avatar)}} " alt=""></td>
                                    @endif

                                    @else
                                    <td><img style="width: 80px;height:80px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC6iPDSqcgCcAtdEz_rPY0B-sxqMd7hz0Hlg&usqp=CAU" alt=""></td>
                                    @endif

                                    <td>{{$key->name}}</td>
                                    <td>{{$key->email}}</td>
                                    <td>
                                    @if($key->UserOnline())
         <span class="badge badge-pill badge-success">Active Now</span>
		@else
            <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($key->status)->diffForHumans() }}</span>
		@endif
                                    </td>
                                    <td>
                                        <div class="btn btn-info"><a class="abrands" href="">Edit</a></div>
                                        <div  class="btn btn-danger "><a class="abrands deleted" href="">Delete</a></div>
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
