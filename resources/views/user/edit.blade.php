<div class="d-flex justify-content-end">
	<a href="{{url('users')}}" class="btn btn-sm btn-primary mb-2">User Home</a>
</div>
<div class="row">
	<div class="col-md-4 offset-md-4">
		<form method="POST" action="{{url('users/edit')}}" enctype="multipart/form-data">
			{{@csrf_field()}}
			<input type="hidden" name="id" value="{{$user->id}}">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{$user->name}}">
				<label class="error">
					@error('name')
					{{$message}}
					@enderror
				</label>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="{{$user->email}}">
				<label class="error">
					@error('email')
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