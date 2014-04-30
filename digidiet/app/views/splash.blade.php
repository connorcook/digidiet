@extends('layouts.standard')

@section('title')
	Home
@stop

<!-- Displays main homepage content -->
@section('content')
	
	<!-- Slideshow -->
	<h2 style="text-align:center;">Welcome to <b>digidiet</b>!</h2>
	<br>
	<p style ="text-align:justify">
	Our philosophy has always been that knowledge is to be shared, including knowledge on delicious, delicious food. After all, if someone else has already created the perfect (cheese) wheel, why reinvent it?
	<br><br>
	So we decided there should be an open forum to encourage this exchange of knowledge. Of food.
	<br><br>
	<a href="register">Join us</a> as we seek out the best and the brightest of every food artist in the world and spread their experience to all the poor college students.
	<br>
	<br>
	Thank you,
	<br>
	<b>Staff @ digidiet</b>
	</p>
	<h6 style="text-align:left;">Recent Uploads:</h2>

<head>
  <style>
    /* Prevents slides from flashing */
    #slides {
      display:none;
    }
        #slides .slidesjs-navigation {
      margin-top:5px;
    }

    #slides .slidesjs-previous {
      margin-right: 5px;
      float: left;
    }
    #slides .slidesjs-next {
      margin-right: 5px;
      float: left;
    }

    #slides a:link,
    #slides a:visited {
      color: #333
    }

    #slides a:hover,
    #slides a:active {
      color: #9e2020
    }

  </style>

  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="/js/jquery.slides.js"></script>

  <script>
    $(function(){
      $("#slides").slidesjs({
        width: 940,
        height: 528
      });
    });

  </script>
</head>
<body>
  <div id="slides">
  	@foreach(DB::table('recipes')->orderBy('created_at', 'desc')->take(5)->get() as $recipe)
     	<img src="{{$recipe->image_url}}">
    @endforeach
    <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
      <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
  </div>
</body>


@stop

@section('sidebar')
  <h4>Announcements</h4>
  <div class="news">
	  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  	  <p>Lorem ipsum... <a href="">Read more</a></p>
  </div>
  
	

@stop

<!-- Displays content under What's Hot section of splash page -->
@section('subcontent1')
	<h4>What's Hot</h4>
    <ol>
	@foreach(DB::table('recipes')->orderBy('created_at', 'desc')->take(5)->get() as $recipe)
     	<li><p><a href="/recipe/{{ $recipe->id }}">{{ $recipe->title }}</a></p></li>
    @endforeach
    </ol>
@stop

<!-- Displays content under Newest section of splash page -->
@section('subcontent2')
	<h4>Newest</h4>
  	<ol>
	@foreach(DB::table('recipes')->orderBy('created_at', 'asc')->take(5)->get() as $recipe)
     	<li><p><a href="/recipe/{{ $recipe->id }}">{{ $recipe->title }}</a></p></li>
    @endforeach
    </ol>
@stop

<!-- Displays content under Top Rated section of splash page -->
@section('subcontent3')
	<h4>Top Rated</h4>
    <ol>
	@foreach($recipes as $recipe)
     	<li><p><a href="/recipe/{{ $recipe->id }}">{{ $recipe->title }}</a></p></li>
    @endforeach
    </ol>
@stop

<!-- Displays content under New Users section of splash page -->
@section('subcontent4')
	<h4>New Users</h4>
    <ol>
	@foreach(DB::table('users')->orderBy('created_at', 'desc')->take(5)->get() as $user)
     	<li><p><a href="/user/{{ $user->id }}">{{ $user->username }}</a></p></li>
    @endforeach
    </ol>
@stop
