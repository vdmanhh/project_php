@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-fluid ">
    <div class="row">
        <div class="col-8 " >
            <div class="col-lg-12">
                <div class="card mb-4" >
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Slider List</h6>
                    </div>
                    <div class="table-responsive p-3" style="border-radius:10px">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        @php($id=0)
                        <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Slider Title</th>
                                    <th>Slider Desc</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action </th>

                                </tr>
                            </thead>

                            <tbody>
                            @foreach($sliders as $key)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$key->title}}</td>
                                    <td>{{$key->desc}}</td>
                                    <td><img style="width: 60px;height:60px;border-radius:50%" src="{{asset($key->image)}}" alt=""></td>
                                    <td>
                                    @if($key->status == '1')
                                            <span class="badge badge-success" style="padding:5px 10px">Active</span>
                                        @else
                                        <span class="badge badge-warning" style="padding:5px ">InActive</span>
                                        @endif
                                    </td>
                                    <td width='32%'>
                                        <div class="btn btn-info"><a class="abrands" href="{{route('slider.edit',$key->id)}}">Edit</a></div>
                                        <div  class="btn btn-danger "><a class="abrands deleted" href="{{route('slider.delete',$key->id)}}">Delete</a></div>
                                        @if($key->status == '1')
                                        <div class="btn btn-warning"><a class="abrands" href="{{route('slider.inactive',$key->id)}}">InActive</a></div>
                                        @else
                                        <div class="btn btn-success"><a class="abrands" href="{{route('slider.active',$key->id)}}">Active</a></div>
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
        <div class="col-4" style="background-color: white;border: 1px solid #e3e2e2;border-radius:10px; height:600px">
            <h3 class="text-primary" style="font-weight:bold;text-align: center;padding-top:20px">Add Slider</h3>
            <form method="post" enctype="multipart/form-data" action="{{route('add.slider')}}" class="mt-3 mb-5" style="width: 80%; margin:auto">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Slider Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name english">

                </div>
                @error('title')
                        <span style="color: red;">Fill out information</span>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">Slider Desc</label>
                    <input name="desc" type="text" class="form-control mb-2" id="exampleInputPassword1" placeholder="Enter name hindi">
                    <label for="exampleInputPassword1">Slider Image</label>
                </div>
                @error('desc')
                        <span style="color: red;">Fill out information</span>
                @enderror


                <div class="row mb-3">

                    <div class="col-3">
                        <img class="showimage" style="border-radius:100%;width: 70px;height:70px;border:1px solid #e3e2e2 " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAAAQlBMVEX///+hoaGenp6ampr39/fHx8fOzs7j4+P8/Pyvr6/d3d3FxcX29va6urqYmJjs7OzU1NSlpaW1tbWtra3n5+e/v78TS0zBAAACkUlEQVR4nO3b63KCMBCGYUwUUVEO6v3fagWVY4LYZMbZnff51xaZ5jON7CZNEgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABQb5tvI8qzX4/nH84XG5Upfj2ir2V2E5fZ/XpIX9saMnhkYLIkiyRJjdgMoiEDMmiQgfwM8rSu77ew2wnPoLTmwdZBs0J2BuXrYckcQm4nOoP+WcmWAbcTnUHZPy9eA24nOoN7n0HI54ToDM5k8PjluwyqgNuJzqDoaugPg8gWZ4noDAYLwuIg75fLeeHHsjNIzrZJwWwW+0DNsmEWPjiEZ5AcD8ZUu8VZ8HyQMifvBdIz+PS33i8adu+7Qn4Gn1Tdupl7rlCfQb9seosK7RkcBy1o30iVZ5CPOtDW3WhQnsF13IV3v0p3BqfJRoSpXVepzmA/24+yqeMyzRm4tqOs44lSUwa3yfgOri25av5CPRnklR33VlPnrqSZV09qMsiqSWV082xOz1uPajJ49pTM/f115k6guWa6JGjJ4N1lt8fXN2rv/vysjFaSQdFXBc/KKF04ptFPliclGVR9Bu27XCyeVOkmy5OODAZN9rYyyip/AIPJ8qIig+PoXbf7YdPdncFoSdCQQT4ZceV+MhiFMBy0hgyu0yGvOLI17KwpyGBaHK5jtt0N5GcwLw7XZdB31sRn8O+ziqYro8Vn4CwOV+k6a9Iz+PwRsKC7h+gMfMXhKu/OmuwM/MXhKq8yWnYG/uJw5Uxoy2jRGZTBZ/jboxuSM1guDtdNhKazJjiDbNMe0AxzKUVnkO+jEJxBxNtJzWCTxlNLzSB8KehJ/H+mJGYAjaDjzj9SnHZRuXZiAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAECXP1XDHv7U4SNFAAAAAElFTkSuQmCC" alt="">
                    </div>
                    <div class="col-9">
                        <div class="form-group">

                            <input name="image" class="image" style="border:none;transform:translateY(20px)" type="file" class="form-control" id="exampleInputPassword1" placeholder="Enter name hindi">
                        </div>
                    </div>
                    @error('image')
                        <span style="color: red;padding-left:10px">Fill out information</span>
                        <br>
                @enderror
                </div>


                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.image').change(function(e) {
            e.preventDefault();
            var reader = new FileReader();
            reader.onload = function(e) {
                // $('.showimage').attr('class','showw');
                $('.showimage').attr('src', e.target.result);

                // $('.showimage').addClass('showw');
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
@endsection
