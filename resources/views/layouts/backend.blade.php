<!doctype html>
<html lang="en">

<head>
	<title>Website RPP Al-MUjahidin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	@livewireStyles
	@include('includes.backend.style')
	@stack('add-style')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@livewire('component.navbar')
		<!-- END NAVBAR -->
        
		<!-- LEFT SIDEBAR -->
		@include('includes/backend/sidebar')
		<!-- END LEFT SIDEBAR -->
        
		<!-- MAIN -->
		<div class="main">
			@yield('content')
		</div>
		<!-- END MAIN -->
        
		<div class="clearfix"></div>
        <!-- Footer -->
		@include('includes/backend/footer')
	</div>
	<!-- END WRAPPER -->
    
	<!-- Javascript -->
	@include('includes/backend/script')
	@stack('add-script')
	@livewireScripts
</body>

</html>
