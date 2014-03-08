<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>DIGIDIET!</title>
  <!-- <link rel="stylesheet" href="/css/metro-bootstrap.css"> -->
  <!-- <script src="/js/jquery.min.js"></script>
  // <script src="/js/jquery.widget.min.js"></script>
  // <script src="/js/metro.min.js"></script> -->
  {{ HTML::style('/css/metro-bootstrap.css'); }}
  {{ HTML::style('/css/metro-bootstrap-responsive.css'); }}
  {{ HTML::style('/css/iconFont.css'); }}
  {{ HTML::script('/js/jquery.min.js'); }}
  {{ HTML::script('/js/jquery.widget.min.js'); }}
  {{ HTML::script('/js/metro.min.js'); }}
  {{ HTML::script('/js/metro-button-set.js'); }}


  <style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);
		
		body {
			/*margin:0;
			font-family:'Lato', sans-serif;*/
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

		
	</style>
</head>
<body class="metro">

<nav class="navigation-bar light">
	<nav class="navigation-bar-content">
		<div class="element">
			<a class="dropdown-toggle" href="#">NAVIGATE</a>
			<ul class="dropdown-menu" data-role="dropdown">
				<li><a href="#">Home</a></li>
				<li><a href="#">Profile</a></li>
				<li><a href="#">Settings</a></li>
			</ul>
		</div>

		<span class="element-divider"></span>
		<a class="element brand" href="#"><span class="icon-spin"></span></a>
        <a class="element brand" href="#"><span class="icon-printer"></span></a>
        <span class="element-divider"></span>
        

		<div class="element input-element">
            <form>
                <div class="input-control text">
                    <input type="text" placeholder="Search...">
                    <button class="btn-search"></button>
                </div>
            </form>
        </div>

        <span class="element-divider"></span>

        <div class="element place-right">
            <a class="dropdown-toggle" href="#">
                <span class="icon-cog"></span>
            </a>
            <ul class="dropdown-menu place-right" data-role="dropdown">
                <li><a href="#">Products</a></li>
                <li><a href="#">Download</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Buy Now</a></li>
            </ul>
        </div>

        <span class="element-divider place-right"></span>
        <a class="element place-right" href="#"><span class="icon-locked-2"></span></a>
        <span class="element-divider place-right"></span>
        <a class="element place-right" href="#"><span class="icon-user"></span></a>
        <button class="element image-button image-left place-right">
            Anonymous
            
        </button>
	</nav>
</nav>

        <div class="container">
            @yield('content')
        </div>
        

</body>
</html>
