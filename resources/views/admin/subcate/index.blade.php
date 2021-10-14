@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid ">
    <div class="row">
        <div class="col-8 ">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                    </div>
                    <div class="table-responsive p-3" style="border-radius:10px">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            @php($id=0)
                            <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Category</th>
                                    <th>SubCategory En</th>
                                    <th>SubCategory Hin</th>

                                    <th>Action </th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($subs as $key)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$key->category_name_en}}</td>
                                    <td>{{$key->subcategory_name_en}}</td>
                                    <td>{{$key->subcategory_name_hin}}</td>


                                    <td>
                                        <div class="btn btn-info"><a class="abrands" href="{{route('subcategory.edit',$key->id)}}">Edit</a></div>
                                        <div class="btn btn-danger "><a class="abrands deleted" href="{{route('subcategory.delete',$key->id)}}">Delete</a></div>
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
            <h3 class="text-primary" style="font-weight:bold;text-align: center;padding-top:20px">Add SubCategory</h3>
            <form method="post" enctype="multipart/form-data" action="{{route('add.subcategory')}}" class="mt-3 mb-5" style="width: 80%; margin:auto">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">SubCategory Name EngLish</label>
                    <input type="text" name="subcategory_name_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name english">

                </div>
                @error('subcategory_name_en')
                <span style="color: red;">Fill out information</span>
                @enderror

                <div class="form-group">
                    <label for="exampleInputPassword1">SubCategory Name Hindi</label>
                    <input name="subcategory_name_hin" type="text" class="form-control mb-2" id="exampleInputPassword1" placeholder="Enter name hindi">

                </div>

                @error('subcategory_name_hin')
                <span style="color: red;">Fill out information</span>
                <br>
                @enderror


                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Category</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                    <option >Choose category</option>
                        @foreach($cates as $cate)
                        <option value="{{$cate->id}}">{{$cate->category_name_en}}</option>
                        @endforeach
                    </select>
                </div>

                @error('category_id')
                <span style="color: red;">Fill out information</span>
                <br>
                @enderror
                <button type="submit" class="btn btn-primary">Add category</button>
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
