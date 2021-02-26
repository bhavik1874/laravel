<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <span class="text-semibold">Users</span>
            </h4>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li>
                <a href="{{url('')}}"><i class="icon-home2 position-left"></i>Dashboard</a>
            </li>
            <li class="active">Users</li>
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
            <a href="{{url('users/add')}}" class="btn btn-primary">Add New<i class="icon-plus-circle2 position-right"></i></a>
            <!-- <a href="javascript:delete_selected();" class="btn btn-danger" id="delete_selected"><?php //_el('delete_selected');?><i class=" icon-trash position-right"></i></a> -->
        </div>
        <!-- /Panel heading -->

        <!-- Listing table -->
        <div class="panel-body table-responsive">
            <table id="users_table" class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th width="2%">
                            <input type="checkbox" name="select_all" id="select_all" class="styled" onclick="select_all(this);" >
                        </th>
                        <th width="38%">Name</th>
                        <th width="50%">Email</th>
                        <th width="10%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    	foreach ($users as $key => $user) {
                    	?>
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox styled"  name="delete"  id="{{$user->id}}">
                        </td>

						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
                        <td class="text-center">
                            <a data-popup="tooltip" data-placement="top"  title="Edit" href="{{url('users/edit',$user->id)}}" id="{{$user->id}}" class="text-info"><i class="icon-pencil7"></i></a>
                            <a data-popup="tooltip" data-placement="top"  title="Delete" href="javascript:delete_user({{$user->id}});" class="text-danger delete" id="{{$user->id}}"><i class=" icon-trash"></i></a>
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

<script type="text/javascript">
$(document).ready(function() {
    $('#users_table').DataTable({
        'columnDefs': [ {
        'targets': [0,3],
        'orderable': false,
        }],
    });

    //add class to style style datatable select box
    $('div.dataTables_length select').addClass('datatable-select');
});

function delete_user(id)
{
	if(confirm("Are you sure you want to delete this record?") == true)
	{
		$.ajax({
            url:"{{url('users/delete')}}",
            type: 'POST',
            data: {user_id:id,_token: '{{csrf_token()}}'},
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