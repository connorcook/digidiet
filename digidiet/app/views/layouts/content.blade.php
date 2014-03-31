@extends('layouts.standard')

<!-- Menu Horizontal -->
@section('navigation')
  @parent
@stop
<!-- END NAVIGATION BAR -->


<div class="grid">
<div class="col_12">
  <!-- MAIN CONTENT SECTION -->
  <div class="col_12">
    @yield('content')
  </div>
  
  <hr />

  <!-- SUBCONTENT SECTION --> 
  @section('subcontent1')
    
  @stop
  
  @section('subcontent2')
    
  @stop
  
  @section('subcontent3')
    
  @stop
  
  @section('subcontent4')
    
  @stop
</div>

</div><!-- END GRID -->
