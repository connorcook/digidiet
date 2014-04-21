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

</head>
<body>

<!-- BEGIN NAVIGATION BAR -->
<!-- Menu Horizontal -->
@section('navigation')
<ul class="menu">
<li class="current">

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
<li><a href="{{URL::to('/user/')}}">User Directory</a></li>
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
  @section('sidebar')
  <div class="col_3">
  <h5>Now Serving</h5>
  <ul class="icons">
  <li><i class="icon-ok"></i> Drinks</li>
  <li><i class="icon-ok"></i> Soups</li>
  <li><i class="icon-ok"></i> Entrees</li>
  <li><i class="icon-ok"></i> Adult Delights</li>
  </ul>
  
  <h5>Share</h5>
  <i class="icon-twitter-sign icon-4x"></i> 
  <i class="icon-facebook-sign icon-4x"></i>
  <i class="icon-linkedin-sign icon-4x"></i>
  <i class="icon-github-sign icon-4x"></i>
  
  <span class="icon social x-large darkgray" data-icon="1"></span>
  <span class="icon social x-large black" data-icon="w"></span>
  <span class="icon x-large pink" data-icon="*"></span>
  <span class="icon social x-large green" data-icon="v"></span>
  
  <h5>RSS Feed</h5>
  <a class="button orange small" href="#"><i class="icon-rss"></i> RSS</a>
  </div>
  @show
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
</div>

</body></html> 
