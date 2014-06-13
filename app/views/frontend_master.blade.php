<!DOCTYPE html>
<html lang="en">
<head>
<title>Laravel Image Sharing</title>
{{HTML::style('css/style.css')}}
</head>
<body>
	{{--Heading goes here--}}
	<h2>My awesome image sharing website</h2>
	{{--form validation error, first one is shown--}}
	@if(Session::has('errors'))
		<h3 class="error">{{$errors->first()}}</h3>
	@endif
	{{--error set manually--}}
	@if(Session::has('error'))
		<h3 class="error">{{Session::get('error')}}</h3>
	@endif
	{{--success message--}}
	@if(Session::has('success'))
		<h3 class="error">{{Session::get('success')}}</h3>
	@endif
	{{--content goes here--}}
	@yield('content')
	
</body>
</html>