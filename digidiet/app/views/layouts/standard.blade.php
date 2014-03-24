<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Working on a Title</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="" />

  
  {{ HTML::script('/js/jquery.min.js'); }} <!-- JQUERY   -->
  {{ HTML::script('/js/jquery.widget.min.js'); }}
  {{ HTML::script('/js/kickstart.js'); }} <!-- KICKSTART -->
  {{ HTML::style('/css/kickstart.css'); }} <!-- KICKSTART -->
  {{ HTML::style('/style.css'); }} <!-- KICKSTART -->

</head>
<body>
<style>
  background-image: url({{ URL::asset('/images/food.png'); }});

</style>

<!-- Menu Horizontal -->
<ul class="menu">
<li class="current"><a href="">Item 1</a></li>
<li><a href="">Item 2</a></li>
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


        <!-- @if ( Auth::guest())
          
            <a class="btn" href="{{URL::to('login')}}"> Login </a>
            <span class="element-divider"></span>
            <a class="btn" href="{{URL::to('register')}}"> Register </a>

        @else
            {{ HTML::link('admin', Auth::user()->username)}}
            {{ HTML::link('logout', 'Logout')}}
        @endif     -->

<div class="grid">
<div class="col_12">
  <!-- MAIN CONTENT SECTION -->
  <div class="col_9">
    @yield('content')
  </div>
  
  <div class="col_3">
  <h5>Now Serving</h5>
  <ul class="icons">
  <li><i class="icon-ok"></i> Drinks</li>
  <li><i class="icon-ok"></i> Soups</li>
  <li><i class="icon-ok"></i> Entrees</li>
  <li><i class="icon-ok"></i> Festive Adult Delights</li>
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
  
  <hr />
  
  <div class="col_3">
  <h4>Drinks</h4>
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
  magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
  </div>
  
  <div class="col_3">
  <h4>Soups</h4>
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
  magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
  </div>
  
  <div class="col_3">
  <h4>Entrees</h4>
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
  magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
  </div>
  
  <div class="col_3">
  <h4>Festive Adult Delights</h4>
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
  magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
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
