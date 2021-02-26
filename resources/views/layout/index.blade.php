<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel-Demo</title>
	<!-- css files -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('assets/admin/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('assets/admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('assets/admin/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('assets/admin/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('assets/admin/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- css files -->

	<style type="text/css">
		.datatable-select{
            border: 1px solid #ccc;
            padding: 5px;
            height: 35px;
            border-radius: 3px;
        }
		label.error {
			padding-top: 5px;
			font-size: 14px;
			color: red;
		}
	</style>

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- validation js files -->
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/validation/validate.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/validation/additional_methods.min.js')}}"></script>
	<!-- /validation js files -->

	<!-- datatble JS files -->
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/tables/datatables/extensions/jszip/jszip.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}"></script>
	<!-- /datatble JS files -->

	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/notifications/sweet_alert.min.js')}}"></script>

<!-- {{ URL::asset('')}} -->
	<!-- <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/styling/switchery.min.js')}}"></script> -->
	<!-- <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/styling/switch.min.js')}}"></script> -->
	<!-- <script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/form_checkboxes_radios.js')}}"></script> -->


	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/notifications/jgrowl.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/editors/summernote/summernote.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/common.js')}}"></script>


<script type="text/javascript">
var BASE_URL = "{{url('')}}";

$.validator.setDefaults({
  ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label").text("")
        },
});

//datatables default settings
$.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    order: [],
    dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
    language: {
        search: '<span>Filter:</span> _INPUT_',
        lengthMenu: '<span>Show:</span> _MENU_',
        paginate: { 'first': '&lt;%lt;', 'last': '&gt;%gt;', 'next': '&gt;', 'previous': '&lt;' }
    },
    buttons: {
        dom: {
            button: {
                className: 'btn btn-default'
            }
        },
        buttons: false
    },
    "pageLength": 10,
    "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ]
});

//styled radio & checkboxes
$(".styled").uniform({
    radioClass: 'choice'
});

/* Set Default options to all Sweet Alerts */
swal.setDefaults({
	confirmButtonColor: "#2196F3",
	closeOnConfirm: false,
});
</script>
</head>
<body>
	<!--Main navbar-->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{url('')}}">
				Laravel
			</a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<!-- <ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<span><?php //echo ucwords(get_user_info(get_loggedin_user_id(),'firstname').' '.get_user_info(get_loggedin_user_id(),'lastname')); ?></span>
						<i class="caret"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php //echo base_url('admin/profile/edit'); ?>" ><?php //_el('edit_profile'); ?></a></li>
						<li><a href="<?php //echo admin_url('authentication/logout'); ?>" ><?php //_el('logout'); ?></a></li>
					</ul>
				</li>
			</ul> -->
		</div>
	</div>
	<!-- /Main navbar -->
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">
					<!-- User menu -->
					<!-- <div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<div class="media-body">
									<span class="media-heading text-semibold">
										<?php //echo _l('welcome').'&nbsp;'.get_loggedin_info('username').'&nbsp;'; ?>
										<a style="color: white;" href="<?php //echo admin_url('authentication/logout'); ?>" align="padding-right"><i class="icon-switch2" data-popup="tooltip" data-placement="top"  title="<?php //_el('logout')?>"></i></a>
									</span>
								</div>
							</div>
						</div>
					</div> -->
					<!-- /User menu -->
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion" style="padding: 0px;">
								<li class="{{ (request()->is('/')) ? 'active' : '' }}">
									<a href="{{url('')}}"><i class="icon-home4"></i> <span>Dashboard</span></a>
								</li>
								<li class="{{ (request()->is('projects/*') || request()->is('projects')) ? 'active' : '' }}">
									<a href="{{url('projects')}}"><i class="icon-office"></i> <span>Projects</span></a>
								</li>
								<li class="{{ (request()->is('users/*') || request()->is('users')) ? 'active' : '' }}">
									<a href="{{url('users')}}"><i class="icon-users"></i> <span>Users</span></a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /Main navigation -->
				</div>
			</div>
			<!-- /Main sidebar -->
			<!-- Main content -->
			<div class="content-wrapper">
				<?php echo $content; ?>
				<!-- Footer -->
				<div class="footer text-muted text-center pl-20">
					&copy;<?= date('Y')?>. <a href="#">Admin Panel</a> by <a target="_blank">Laravel</a>
				</div>
				<!-- /Footer -->
			</div>
			<!-- /Main content -->
		</div>
		<!-- /Page content -->
	</div>
	<!-- /Page container -->


	<?php

		if (session()->has('success_message'))
		{
		?>
		<h5 class="text-success my-3">
		<?php
			echo session()->get('success_message');
			?>
		</h5>
	<?php
		}

	?>

	<?php

		if (session()->has('error_message'))
		{
		?>
		<h5 class="text-danger my-3">
		<?php
			echo session()->get('error_message');
			?>
		</h5>
	<?php
		}

	?>
</body>
</html>