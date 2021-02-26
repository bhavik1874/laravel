<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold">Projects</span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="{{url('')}}"><i class="icon-home2 position-left"></i>Dashboard</a>
            </li>
            <li class="active">Projects</li>
        </ul>
    </div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">
    <!-- Panel -->
    <div class="panel panel-flat">
        <!-- Panel heading -->
        <div class="panel-heading">
            <a href="{{url('projects/add')}}" class="btn btn-primary">Add New<i class="icon-plus-circle2 position-right"></i></a>
            <!-- <a href="javascript:delete_selected();" class="btn btn-danger" id="delete_selected"><?php //_el('delete_selected');?><i class=" icon-trash position-right"></i></a> -->
        </div>
        <!-- /Panel heading -->

        <!-- Listing table -->
        <div class="panel-body table-responsive">
            <table id="projects_table" class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th width="2%">
                            <input type="checkbox" name="select_all" id="select_all" class="styled" onclick="select_all(this);" >
                        </th>
                        <th width="40%">Name</th>
						<th width="50%">Description</th>
						<th width="8%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    	foreach ($projects as $key => $project)
                    	{
                    	?>
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox styled"  name="delete"  id="{{$project->id}}">
                        </td>

						<td>{{ucwords($project->name)}}</td>
						<td>{{ucwords($project->description)}}</td>
                        <td class="text-center">
                            <a data-popup="tooltip" data-placement="top"  title="Edit" href="{{url('projects/edit',base64_encode($project->id))}}" id="{{$project->id}}" class="text-info"><i class="icon-pencil7"></i></a>
                            <a data-popup="tooltip" data-placement="top"  title="Delete" href="{{url('projects/delete',$project->id)}}" class="text-danger delete" id="{{$project->id}}"><i class=" icon-trash"></i></a>
                        </td>
                    </tr>
                    <?php }

                    ?>
                </tbody>
            </table>
        </div>
        <!-- /Listing table -->
    </div>
    <!-- /Panel -->
</div>
<!-- /Content area -->

{{ $projects }}

<script type="text/javascript">
$(document).ready(function() {
    $('#projects_table').DataTable({
        'columnDefs': [ {
        'targets': [0,3],
        'orderable': false,
        }],
    });

    //add class to style style datatable select box
    $('div.dataTables_length select').addClass('datatable-select');
});

function delete_project(id)
{
	if(confirm("Are you sure you want to delete this record?") == true)
	{
		$.ajax({
            url:"{{url('projects/delete')}}",
            type: 'POST',
            data: {project_id:id,_token: '{{csrf_token()}}'},
            success: function(msg)
            {
                if(msg == 'true')
                {
                	alert('Record deleted');
                    $("#"+id).closest("tr").remove();
                }
                else
                {
                	alert('Something goes wrong');
                }
            }
        });
	}
	else
	{
		console.log(id);
	}
}

/**
 * Change status when clicked on the status switch
 *
 * @param {obj}  obj  The object
 */
// function change_status(obj)
// {
//     var checked = 0;

//     if(obj.checked)
//     {
//         checked = 1;
//     }

//     $.ajax({
//         url:BASE_URL+'admin/beans/update_status',
//         type: 'POST',
//         data: {
//             bean_id: obj.id,
//             is_active:checked
//         },
//         success: function(msg)
//         {
//             if (msg=='true')
//             {
//                 jGrowlAlert("<?php //_el('_activated', _l('bean')); ?>", 'success');
//             }
//             else
//             {
//                 jGrowlAlert("<?php //_el('_deactivated', _l('bean')); ?>", 'success');
//             }
//         }
//     });
// }

/**
 * Deletes a single record when clicked on delete icon
 *
 * @param {int}  id  The identifier
 */
// function delete_record(id)
// {
//     swal({
//         title: "<?php //_el('single_deletion_alert');?>",
//         text: "<?php //_el('single_recovery_alert');?>",
//         type: "warning",
//         showCancelButton: true,
//         cancelButtonText:"<?php //_el('no_cancel_it');?>",
//         confirmButtonText: "<?php //_el('yes_i_am_sure');?>",
//     },
//     function()
//     {
//         $.ajax({
//             url:BASE_URL+'admin/beans/delete',
//             type: 'POST',
//             data: {
//                 bean_id:id
//             },
//             success: function(msg)
//             {
//                 if (msg=="true")
//                 {
//                     swal({
//                         title: "<?php //_el('_deleted_successfully', _l('bean'));?>",
//                         type: "success",
//                     });
//                     $("#"+id).closest("tr").remove();
//                 }
//                 else
//                 {
//                     swal({
//                         title: "<?php //_el('access_denied', _l('bean'));?>",
//                         type: "error",
//                     });
//                 }
//             }
//         });
//     });
// }

/**
 * Deletes all the selected records when clicked on DELETE SELECTED button
 */
// function delete_selected()
// {
//     var bean_ids = [];

//     $(".checkbox:checked").each(function()
//     {
//         var id = $(this).attr('id');
//         bean_ids.push(id);
//     });
//     if (bean_ids == '')
//     {
//         jGrowlAlert("<?php //_el('select_before_delete_alert', _l('beans'))?>", 'danger');
//         preventDefault();
//     }
//     swal({
//         title: "<?php //_el('multiple_deletion_alert');?>",
//         text: "<?php //_el('multiple_recovery_alert');?>",
//         type: "warning",
//         showCancelButton: true,
//         cancelButtonText:"<?php //_el('no_cancel_it');?>",
//         confirmButtonText: "<?php //_el('yes_i_am_sure');?>",
//     },
//     function()
//     {
//         $.ajax({
//             url:BASE_URL+'admin/beans/delete_selected',
//             type: 'POST',
//             data: {
//               ids:bean_ids
//             },
//             success: function(msg)
//             {
//                 if (msg=="true")
//                 {
//                     swal({
//                         title: "<?php //_el('_deleted_successfully', _l('beans'));?>",
//                         type: "success",
//                     });
//                     $(bean_ids).each(function(index, element)
//                     {
//                         $("#"+element).closest("tr").remove();
//                     });
//                 }
//                 else
//                 {
//                     swal({
//                         title: "<?php //_el('access_denied', _l('bean'));?>",
//                         type: "error",
//                     });
//                 }
//             }
//         });
//     });
// }
</script>