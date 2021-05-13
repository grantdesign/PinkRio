<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>{{ $title }}</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset(env('THEME')) }}/admin/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset(env('THEME')) }}/admin/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset(env('THEME')) }}/admin/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset(env('THEME')) }}/admin/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="{{ asset(env('THEME')) }}/admin/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset(env('THEME')) }}/admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset(env('THEME')) }}/admin/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset(env('THEME')) }}/admin/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<script>
	    document.addEventListener("DOMContentLoaded", function (event) {
	        var editor = CKEDITOR.replace('content1');
	    });
	</script>
</head>
<body>
	
	@yield('header')

	@yield('right_sidebar')

	@yield('left_sidebar')

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">

			@if(session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif

			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			
			@yield('content')

			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="{{ asset(env('THEME')) }}/admin/vendors/scripts/core.js"></script>
	<script src="{{ asset(env('THEME')) }}/admin/vendors/scripts/script.min.js"></script>
	<script src="{{ asset(env('THEME')) }}/admin/vendors/scripts/process.js"></script>
	<script src="{{ asset(env('THEME')) }}/admin/vendors/scripts/layout-settings.js"></script>
	<script src="{{ asset(env('THEME')) }}/admin/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="{{ asset(env('THEME')) }}/admin/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{ asset(env('THEME')) }}/admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ asset(env('THEME')) }}/admin/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="{{ asset(env('THEME')) }}/admin/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="{{ asset(env('THEME')) }}/admin/vendors/scripts/dashboard.js"></script>
	<script src="{{ asset(env('THEME')) }}/admin/ckeditor/ckeditor.js"></script>
</body>
</html>