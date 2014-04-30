@extends('layouts.content')

@section('content')

<div class="col_12 center"> <p>
Here at Digidiet we strive to give you the best experience possible.<br>
If you have any questions, or need to get in contact with us for any reason <br>
please do no hesitate to reach out to us using the email below. <br>

-Staff @ Digidiet <br><br>
{{HTML::mailto('digidietdevs@gmail.com',null,array('style'=>'font-size: 20px'))}}

</p></div>

@stop