@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid ">
    <div class="row">
        <div class="col-8 " >
            <div class="col-lg-12">
                <div class="card mb-4" >
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                    </div>
                    <div class="table-responsive p-3" style="border-radius:10px">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        @php($id=0)
                        <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Category En</th>
                                    <th>Category Hin</th>
                                    <th>Category Icon</th>
                                    <th>Action </th>

                                </tr>
                            </thead>

                            <tbody>
                            @foreach($category as $key)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$key->category_name_en}}</td>
                                    <td>{{$key->category_name_hin}}</td>
                                    <td> <i style="font-size:35px" class="{{$key->category_icon}}"></i></td>

                                    <td>
                                        <div class="btn btn-info"><a class="abrands" href="{{route('category.edit',$key->id)}}">Edit</a></div>
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
        <div class="col-4" style="background-color: white;border: 1px solid #e3e2e2;border-radius:10px; height:600px">
            <h3 class="text-primary" style="font-weight:bold;text-align: center;padding-top:20px">Add Category</h3>
            <form method="post" enctype="multipart/form-data" action="{{route('add.category')}}" class="mt-3 mb-5" style="width: 80%; margin:auto">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name EngLish</label>
                    <input type="text" name="category_name_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name english">

                </div>
                @error('category_name_en')
                        <span style="color: red;">Fill out information</span>
                @enderror

                <div class="form-group">
                    <label for="exampleInputPassword1">Category Name Hindi</label>
                    <input name="category_name_hin" type="text" class="form-control mb-2" id="exampleInputPassword1" placeholder="Enter name hindi">

                </div>
                @error('category_name_hin')
                        <span style="color: red;">Fill out information</span>
                @enderror

                <div class="form-group">
                    <label for="exampleInputPassword1">Category Icon</label>
                    <input name="category_icon" type="text" class="form-control mb-2" id="exampleInputPassword1" placeholder="Enter icon">

                </div>
                @error('category_icon')
                        <span style="color: red;">Fill out information</span>
                @enderror
                    <br>




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
