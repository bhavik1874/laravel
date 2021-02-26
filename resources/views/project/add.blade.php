<div class="d-flex justify-content-end">
	<a href="{{url('projects')}}" class="btn btn-sm btn-primary mb-2">Project Home</a>
</div>
<div class="row">
	<div class="col-md-4 offset-md-4">
		<form method="POST" action="{{url('projects/add')}}" id="addProjectForm" enctype="multipart/form-data">
			{{@csrf_field()}}
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Save Data</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	$("#addProjectForm").validate({
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