@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid ">
    <div class="row">
        <div class="col-12 " >
            <div class="col-lg-12">
                <div class="card mb-4" >
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Return Order List <span class="badge badge-bill badge-danger">{{count($detail)}}</span></h6>
                    </div>
                    <div class="table-responsive p-3" style="border-radius:10px">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        @php($id=0)
                        <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Date</th>
                                    <th>Invoice </th>
                                    <th>Amout</th>
                                    <th>Reason Return</th>
                                    <th>Status </th>
                                    <th>Action </th>

                                </tr>
                            </thead>

                            <tbody>
                            @foreach($detail as $key)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$key->order_date}}</td>
                                    <td>{{$key->invoice_no}}</td>
                                    <td>{{$key->amount}}</td>
                                    <td>{{$key->return_reason}}</td>
                                    <td class="badge badge-warning" style="margin-top: 10px;">{{$key->status}}</td>
                                    <td>
                                        <div class="btn btn-info"><a class="abrands" href="{{route('accept',$key->id)}}">Approve</a></div>

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
