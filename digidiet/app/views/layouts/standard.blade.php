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
			font-size: 20px;
			font-color: #FF7400;
			text-align:center;
			color: #000000;
			
		    background-image: url({{ URL::asset('/images/food.png'); }})

		}


		.container {
			
			border:3px solid #216268;
			border-radius:15px;
			width: 60%;
			margin: 20% auto;
			padding: 10px;

		    background-color:#009999;

		       opacity:0.7;
			
		 }
		 h2{
			font-size:  64px;
			font-color: #A64B00;
			margin-bottom: 5px;
			margin-top: 5px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
		}
	</style>
</head>
<body>

	    
        <div class="container">
            @yield('content')
        </div>

</body>
</html>
