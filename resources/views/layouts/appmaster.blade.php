<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ActivityBootStrap</title>
    <link rel="stylesheet" href="resources/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="resources/assets/css/styles.css">


<html lang="en">
    <head>
    	<title>@yield('title')</title>
    </head>
    <body>
     	@include('layouts.header') 
     	        <div align="center">
        	@yield('content')
        </div>
<!-- 		@include('layouts.footer') -->
    </body>
</html>
