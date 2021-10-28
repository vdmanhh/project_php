@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid ">
    <div class="row">
        <div class="col-8 ">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">District List</h6>
                    </div>
                    <div class="table-responsive p-3" style="border-radius:10px">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            @php($id=0)
                            <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Division</th>
                                    <th>District Name</th>
                                      <th>Action </th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($districts as $key)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$key->name_disvision}}</td>
                                    <td>{{$key->district_name}}</td>



                                    <td>
                                        <div class="btn btn-info"><a class="abrands" href="{{route('district.edit',$key->id)}}">Edit</a></div>
                                        <div class="btn btn-danger "><a class="abrands deleted" href="{{route('district.delete',$key->id)}}">Delete</a></div>
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
            <h3 class="text-primary" style="font-weight:bold;text-align: center;padding-top:20px">Add District</h3>
            <form method="post" enctype="multipart/form-data" action="{{route('add.district')}}" class="mt-3 mb-5" style="width: 80%; margin:auto">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">District Name </label>
                    <input type="text" name="district_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name english">

                </div>
                @error('district_name')
                <span style="color: red;">Fill out information</span>
                @enderror




                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Division</label>
                    <select name="name_disvision" class="form-control" id="exampleFormControlSelect1">
                    <option >Choose category</option>
                        @foreach($divisions as $cate)
                        <option value="{{$cate->id}}">{{$cate->name_disvision}}</option>
                        @endforeach
                    </select>
                </div>

                @error('name_disvision')
                <span style="color: red;">Fill out information</span>
                <br>
                @enderror
                <button type="submit" class="btn btn-primary">Add District</button>
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
