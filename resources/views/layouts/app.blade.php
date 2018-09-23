<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name')}}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="author" href="humans.txt">
    </head>
    <body style="background-image: url('https://www.elegantthemes.com/blog/wp-content/uploads/2013/09/bg-12-full.jpg');">
    		@include('inc.navbar')
    		@include('inc.messages')
	    	<div class='container' style="margin-top:20px; margin-bottom: 100px;">
	    	  
              @yield('content')     
	        
	       </div>
	    	@include('inc.footer')
    </body>
</html>