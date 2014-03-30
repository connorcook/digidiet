<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Working on a Title</title>

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

<!-- Menu Horizontal -->
@section('navigation')
<ul class="menu">
<li class="current">

<li><a href="{{URL::to('/')}}"><span class="icon" data-icon="G"></span>Home</a></li>
<li><a href=""><span class="icon" data-icon="R"></span>Account</a>
    <ul>
        @if ( Auth::guest())
          <li><a href="{{URL::to('login')}}"><span class="icon" data-icon="G"></span>Login</a></li>
          <li><a href="{{URL::to('register')}}"><span class="icon" data-icon="G"></span>Register</a></li>
        @else
          {{ HTML::link('admin', Auth::user()->username)}}
          {{ HTML::link('logout', 'Logout')}}
          <li><a href="{{HTML::link('admin', Auth::user()->username)}}"><span class="icon" data-icon="G"></span>Settings</a></li>
          <li><a href="{{URL::to('logout')}}"><span class="icon" data-icon="G"></span>Logout</a></li>
        @endif
    </ul>
</li>
   
<li><a href=""><span class="icon" data-icon="R"></span>Item 3</a>
  <ul>
  <li><a href=""><span class="icon" data-icon="G"></span>Sub Item</a></li>
  <li><a href=""><span class="icon" data-icon="A"></span>Sub Item</a>
    <ul>
    <li><a href=""><span class="icon" data-icon="Z"></span>Sub Item</a></li>
    <li><a href=""><span class="icon" data-icon="k"></span>Sub Item</a></li>
    <li><a href=""><span class="icon" data-icon="J"></span>Sub Item</a></li>
    <li><a href=""><span class="icon" data-icon="="></span>Sub Item</a></li>
    </ul>
  </li>
  <li class="divider"><a href=""><span class="icon" data-icon="T"></span>li.divider</a></li>
  </ul>
</li>
<li><a href="">Item 4</a></li>
</ul>
@show
<!-- END NAVIGATION BAR -->


<div class="grid">
<div class="col_12">
  <!-- MAIN CONTENT SECTION -->
  <div class="col_12">
    @yield('content')
  </div>
  
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

</body>
</html>
