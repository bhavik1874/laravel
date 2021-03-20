<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Auto Logout after 15 mins (15*60=900 seconds) of inactivity -->
	<!-- <meta http-equiv="refresh" content="28800;url=" /> -->

	<title>Laravel</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset ('assets/admin/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset ('assets/admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset ('assets/admin/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset ('assets/admin/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset ('assets/admin/css/jquery.multiselect.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset ('assets/admin/css/custom.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<style type="text/css">
		.datatable-select {
			border: 1px solid #ccc;
			padding: 5px;
			height: 35px;
			border-radius: 3px;
		}

		.btn-bottom-toolbar {
			position: fixed;
			bottom: 0;
			padding: 15px;
			padding-right: 41px;
			margin: 0 0 0 -46px;
			-webkit-box-shadow: 0 -4px 1px -4px rgba(0, 0, 0, .1);
			box-shadow: 0 -4px 1px -4px rgba(0, 0, 0, .1);
			background: #fff;
			width: calc(100% - 211px);
			z-index: 5;
			border-top: 1px solid #ededed;
		}
	</style>

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/core/libraries/jquery.ui.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/plugins/forms/validation/validate.min.js')}}"></script>

	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/plugins/tables/datatables/extensions/jszip/jszip.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}"></script>

	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/core/app.js')}}"></script>

	<script type="text/javascript" src="{{ URL::asset ('assets/admin/js/common.js')}}"></script>

	<script type="text/javascript">
		// Default Settings for jQuery Validator
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
				if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container')) {
					if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
						error.appendTo(element.parent().parent().parent().parent());
					} else {
						error.appendTo(element.parent().parent().parent().parent().parent());
					}
				}

				// Unstyled checkboxes, radios
				else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
					error.appendTo(element.parent().parent().parent());
				}

				// Input with icons and Select2
				else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
					error.appendTo(element.parent());
				}

				// Inline checkboxes, radios
				else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
					error.appendTo(element.parent().parent());
				}

				// Input group, styled file input
				else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
					error.appendTo(element.parent().parent());
				} else {
					error.insertAfter(element);
				}
			},
			validClass: "validation-valid-label",
			success: function(label) {
				label.addClass("validation-valid-label").text("")
			},
		});

		$(function() {

			// Default initialization for dropdown select
			$('.select').select2({
				minimumResultsForSearch: Infinity
			});

			//datatables default settings
			$.extend($.fn.dataTable.defaults, {
				autoWidth: false,
				order: [],
				dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
				language: {
					search: '<span>Filter:</span> _INPUT_',
					lengthMenu: '<span>Show:</span> _MENU_',
					paginate: {
						'first': '&lt;%lt;',
						'last': '&gt;%gt;',
						'next': '&gt;',
						'previous': '&lt;'
					}
				},
				buttons: {
					dom: {
						button: {
							className: 'btn btn-default'
						}
					},
					buttons: [
						'copyHtml5',
						'csvHtml5',
						'pdfHtml5'
					]
				},
				"pageLength": 25,
				"lengthMenu": [
					[25, 50, 100, -1],
					[25, 50, 100, "All"]
				]
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

			/* jQuery switch */
			var switches = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
			switches.forEach(function(html) {
				var switchery = new Switchery(html);
			});
			/*End of Jquery for checkbox switch */

			<?php

			// $alert_class = '';

			// if ($this->session->flashdata('success')) {
			// 	$alert_class = 'success';
			// } elseif ($this->session->flashdata('warning')) {
			// 	$alert_class = 'warning';
			// } elseif ($this->session->flashdata('danger')) {
			// 	$alert_class = 'danger';
			// } elseif ($this->session->flashdata('info')) {
			// 	$alert_class = 'info';
			// }

			// if ($this->session->flashdata($alert_class)) {
				?>
				// jGrowlAlert("<?php //echo $this->session->flashdata($alert_class) ?>", '<?php //echo $alert_class; ?>');
			<?php
			// }
			?>

		});
	</script>
</head>

<body>
	<!--Main navbar-->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Laravel</a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<span>Logged in user</span>
						<i class="caret"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#">Edit Profile</a></li>
						<li><a href="#">Logout</a></li>
					</ul>
				</li>
			</ul>
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
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<div class="media-body">
									<span class="media-heading text-semibold">
										<?php echo 'welcome' . '&nbsp;' . 'username'; ?>
										<a style="color: white;" href="Logout" align="padding-right"><i class="icon-switch2" data-popup="tooltip" data-placement="top" title="Logout"></i></a>
									</span>
								</div>
							</div>
						</div>
					</div>
					<!-- /User menu -->
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<li class="active">
									<a href="#"><i class="icon-home4"></i><span>Dashboard</span></a>
								</li>
								<li class="active">
									<a href="#">
										<i class="icon-users4"></i>
										<span>Users</span>
									</a>
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
				
				<!-- Footer -->
				<div class="footer text-muted text-center pl-20">
					&copy; <?php echo date('Y') ?>. <a href="#">Admin Panel</a> by <a target="_blank">Laravel</a>
				</div>
				<!-- /Footer -->
			</div>
			<!-- /Main content -->
		</div>
		<!-- /Page content -->
	</div>
	<!-- /Page container -->
</body>

</html>