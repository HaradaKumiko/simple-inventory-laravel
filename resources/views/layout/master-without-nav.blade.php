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
   		@yield('content')
</div>
  		@include('layout.script')    
</body>
</html>
