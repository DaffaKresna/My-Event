<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="{{ asset('admin-kit/assets/img/icons/icon-48x48.png') }}"/>

	<title>@yield('title')</title>

	<link href="{{ asset('admin-kit/assets/css/app.css') }}" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
</head>

<body>
	<div class="wrapper">
    @include('admin.partials.sidebar')

		<div class="main">
      @include('admin.partials.header')

			@yield('content')

      @include('admin.partials.footer')
		</div>
	</div>

  @include('admin.partials.script')

</body>

</html>