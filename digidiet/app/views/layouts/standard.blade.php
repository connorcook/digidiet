<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to DIGIDIET.com!</title>
  <style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);
		
		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #000000;
			left: 50%;
			top: 50%;
		        background-image:url("/images/food.png");
		}

		.container {
			border:2px solid #FF0000;
			border-radius:25px;
			margin-left: 50px;
			margin-top: 50px;
			margin-bot: 50px;
			margin-right: 50px;
		        background-color:#ffffff;
		        opacity:0.7;
			
		 }

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
	    
        <div class="container">
            @yield('content')
        </div>
</body>
</html>
