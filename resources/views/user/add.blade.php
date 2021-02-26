<div class="d-flex justify-content-end">
	<a href="{{url('users')}}" class="btn btn-sm btn-primary mb-2">User Home</a>
</div>
<div class="row">
	<div class="col-md-4 offset-md-4">
		<form method="POST" action="{{url('users/add')}}" id="addUserForm" enctype="multipart/form-data">
			{{@csrf_field()}}
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{ old('name') }}">
				<label class="error">
					@error('name')
					{{$message}}
					@enderror
				</label>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="{{ old('email') }}">
				<label class="error">
					@error('email')
					{{$message}}
					@enderror
				</label>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
				<label class="error">
					@error('password')
					{{$message}}
					@enderror
				</label>
			</div>
			<!-- <div class="form-group">
				<label>File</label>
				<input type="file" name="file" class="form-control">
				<label class="error">
					@error('file')
					{{$message}}
					@enderror
				</label>
			</div> -->
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Save Data</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	// $.validator.addMethod("emailExists", function(value, element){
	// 	var mail_id = $(element).val();
	// 	var ret_val = '';
	// 	$.ajax({
	// 		url:"{{url('users/checkEmail')}}",
 //            type: 'POST',
 //            data: {email: mail_id,_token: '{{csrf_token()}}'},
	// 		async: false,
	// 		success: function(msg)
	// 		{
	// 			if(msg=="false"){ret_val = false;}
	// 			else{ret_val = true;}
	// 		}
	// 	});

	// 	return ret_val;
 //    }, "Email already exists !");
	// $("#addUserForm").validate({
 //        rules: {
 //          name: {
 //            required: true,
 //          },
 //          email: {
 //            required: true,
 //            maxlength: 60,
 //            email: true,
 //            emailExists: true,
 //          },
 //        },
 //        messages: {
 //          name: {
 //            required: "Name is required.",
 //          },
 //          email: {
 //            required: "Email is required.",
 //            email: "It does not seem to be a valid email.",
 //            maxlength: "The email should be or equal to 60 chars.",
 //          },
 //        },
 //    });
</script>