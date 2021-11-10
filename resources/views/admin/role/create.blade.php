@extends('admin.home')
@section('home_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container mt-5" style="background-color: white; padding:30px">
<h3 style="text-align: center;">Add Admin</h3>
<form action="{{route('add.role.admin')}}" method="post" enctype="multipart/form-data" >
                @csrf
    <div class="row">
        <div class="col-6">


                <div class="form-group">
                    <label for="exampleInputEmail1">Username </label>
                    <input value="" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email </label>
                    <input value="" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password </label>
                    <input value="" name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Profile </label> <br>
                    <div style="display: flex;">
                    <img class="showimage" style="border-radius:100%;width: 80px;height:80px;margin-right:10px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrJgwdOAjqaZGS7kn35IVm_ZN6E4XFuJ7V_g&usqp=CAU" alt="">
                    <input class="image" name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">


                    </div>


                </div>

                <button type="submit" class="btn btn-primary">Create</button>

        </div>

        <div class="col-6 mt-5">
           <div class="row">
               <div class="col-4">
               <fieldset>
				<input type="checkbox" id="checkbox_1" name="category" value="1">
				<label for="checkbox_1">Category</label>
			</fieldset>
            <fieldset>
				<input type="checkbox" id="checkbox_9" name="state_order" value="1">
				<label for="checkbox_9">State Order</label>
			</fieldset>
            <fieldset>
				<input type="checkbox" id="checkbox_9" name="product" value="1">
				<label for="checkbox_9">Product</label>
			</fieldset>

               </div>
               <div class="col-4">
               <fieldset>
				<input type="checkbox" id="checkbox_9" name="user" value="1">
				<label for="checkbox_9">User</label>
			</fieldset>
               <fieldset>
				<input type="checkbox" id="checkbox_9" name="ship" value="1">
				<label for="checkbox_9">Ship</label>
			</fieldset>
            <fieldset>
				<input type="checkbox" id="checkbox_9" name="coupon" value="1">
				<label for="checkbox_9">Coupon</label>
			</fieldset>
               </div>
               <div class="col-4">
               <fieldset>
				<input type="checkbox" id="checkbox_9" name="return_order" value="1">
				<label for="checkbox_9">Return Order</label>
			</fieldset>

            <fieldset>
				<input type="checkbox" id="checkbox_9" name="brand" value="1">
				<label for="checkbox_9">Brand</label>
			</fieldset>
            <fieldset>
				<input type="checkbox" id="checkbox_9" name="slider" value="1">
				<label for="checkbox_9">Slider</label>
			</fieldset>
            <fieldset>
				<input type="checkbox" id="checkbox_10" name="access" value="1">
				<label for="checkbox_9">Access</label>
			</fieldset>

               </div>
           </div>



        </div>
    </div>

    </form>
</div>
<script>
    $(document).ready(function() {
        $('.image').change(function(e) {
            e.preventDefault();
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.showimage').attr('src', e.target.result);

            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
