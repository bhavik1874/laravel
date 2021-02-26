<div class="d-flex justify-content-end">
	<a href="{{url('projects')}}" class="btn btn-sm btn-primary mb-2">project Home</a>
</div>
<div class="row">
	<div class="col-md-4 offset-md-4">
		<form method="POST" action="{{url('projects/edit')}}" id="editProjectForm" enctype="multipart/form-data">
			{{@csrf_field()}}
			<input type="hidden" name="id" value="{{$project->id}}">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{$project->name}}">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control">{{$project->description}}</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Save Data</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	$("#editProjectForm").validate({
        rules: {
          name: {
            required: true,
          },
          description: {
            required: true,
            maxlength: 500
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          description: {
            required: "Description is required.",
            maxlength: "The description should not more than 500 chars.",
          },
        },
      });
</script>