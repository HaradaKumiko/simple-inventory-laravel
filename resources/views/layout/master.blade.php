<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') - Inventory Apps</title>
  @include('layout.head')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
		@include('layout.navbar')
	  	@include('layout.sidebar')
   		@yield('content')
	  	@include('layout.footer')
	</div>
</div>
  		@include('layout.script')    
</body>
</html>