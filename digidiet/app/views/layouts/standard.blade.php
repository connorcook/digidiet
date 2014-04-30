<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>
  digidiet | 
  @section('title')
  
  @show
  </title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="" />

  <!-- IMPORT ASSETS/SCRIPTS -->
  {{ HTML::script('/js/jquery.min.js'); }} <!-- JQUERY   -->
  {{ HTML::script('/js/jquery.widget.min.js'); }}
  {{ HTML::script('/js/kickstart.js'); }} <!-- KICKSTART -->
  {{ HTML::style('/css/kickstart.css'); }} <!-- KICKSTART -->
  {{ HTML::style('/style.css'); }} <!-- KICKSTART -->
  {{ HTML::style('css/animate.css'); }} <!-- ANIMATE.CSS -->

</head>
<body>
<!-- HEADLINE -->
<div class="headline">
  <h1>digidiet</h1>
  <p><em>Recipes and more from the finest culinary enthusiasts in the world!</em></p>
</div>
<!-- BEGIN NAVIGATION BAR -->
<!-- Menu Horizontal -->
@section('navigation')
<ul class="menu">

<li><a href="{{URL::to('/')}}"><span class="icon" data-icon="G"></span>Home</a></li>
@if ( Auth::guest())
  <li><a href="{{URL::to('/')}}"><span class="icon" data-icon="R"></span>Account</a>
@else
  <li><a href="{{URL::to('profile')}}"><span class="icon" data-icon="R"></span>{{Auth::user()->username}}</a>
@endif
    <ul>
        @if ( Auth::guest() )
          <li><a href="{{URL::to('login')}}"><span class="icon" data-icon="G"></span>Login</a></li>
          <li><a href="{{URL::to('register')}}"><span class="icon" data-icon="G"></span>Register</a></li>
        @elseif (Auth::user()->roles()->where('role_id','=',1)->count()==1 || Auth::user()->roles()->where('role_id','=',2)->count()==1)
          <!--<li>Auth::user()->roles()->where('role_id','=',5)->id</li>-->
          <li><a href="{{URL::to('profile')}}"><span class="icon" data-icon="G"></span>Profile</a></li>
          <li><a href="{{URL::to('cp')}}"><span class="icon" data-icon="G"></span>Control Panel</a></li>
          <li><a href="{{URL::to('logout')}}"><span class="icon" data-icon="G"></span>Logout</a></li>
        @else
          <li><a href="{{URL::to('profile')}}"><span class="icon" data-icon="G"></span>Profile</a></li>
          <li><a href="{{URL::to('logout')}}"><span class="icon" data-icon="G"></span>Logout</a></li>
        @endif
    </ul>
</li>
   
<li><a href="{{URL::to('recipe')}}"><span class="icon" data-icon="R"></span>Recipes</a>
  @if (!Auth::guest())
    <ul>
      <li><a href="{{URL::to('recipe/create')}}"><span class="icon" data-icon="A"></span>Add</a></li>
    </ul>
  @endif
</li>
<li><a href="{{URL::to('/user/')}}">Users</a></li>
<li>
	<form action="{{URL::to('search')}}" method="post">
	<input type="search" name="search">
	<input type="submit" value="Search Recipes">
	</form>
</li>
<!-- NOTIFICATIONS -->
<?php
   if(Auth::check()){
      $notifications = DB::table('notifications')->where('user_id', '=', Auth::user()->id)->take(10)->get();
      $unread = count(DB::table('notifications')->where('user_id', '=', Auth::user()->id)->where('acknowledged', '=', FALSE)->get());
      $total = count($notifications);
    }
?>
@if(Auth::check())
<li><a href="{{URL::to('notification')}}">Updates ({{$unread}})</a>
    @if($total > 0) <!-- IF MESSAGES EXIST, SHOW THEM -->
    <ul>
    <!-- SHOW EACH NOTIFICATION -->
    @foreach($notifications as $update)
      <li><a href="{{URL::to($update->link)}}">
      <i class="{{$update->icon}}"></i>
      <!-- SHOW READ NOTIFICATIONS -->
      @if($update->acknowledged)
      <p>{{$update->content}}</p>

      <!-- SHOW UNREAD NOTIFICATIONS IN BOLD -->
      @else 
      <b><p>{{$update->content}}</p></b>
      <!-- MARK NOTIFICATION AS READ -->
      <?php
        $note = Notification::find($update->id);
        $note->acknowledged = TRUE;
        $note->save();
      ?>
      @endif
      </a></li>
    @endforeach
    </ul>
    @endif
</li>
@endif
<!-- END NOTIFICATIONS -->
</ul>
@show
<!-- END NAVIGATION BAR -->


<div class="grid">
<div class="col_12">
  <!-- MAIN CONTENT SECTION -->
  <div class="col_9">
    @yield('content')
  </div>
  <!-- BEGIN SIDEBAR -->
  <div class="col_3">
  @section('sidebar')
    @yield
  @show
  </div>
  <!-- END SIDEBAR -->

  <hr />

  <!-- SUBCONTENT SECTION --> 
  <div class="col_3">
    @yield('subcontent1')
  </div>
  
  <div class="col_3">
    @yield('subcontent2')
  </div>
  
  <div class="col_3">
    @yield('subcontent3')
  </div>
  
  <div class="col_3">
    @yield('subcontent4')
  
  </div>
</div>

</div><!-- END GRID -->

<!-- FOOTER -->
<div class="clear"></div>
<div id="footer">
&copy; Copyright 2014 All Rights Reserved. 
<a href="{{URL::to('contact')}}">Contact us.</a>
</div>

</body></html> 
