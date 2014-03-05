@extends('layouts.standard')

@section('content')
     <h2>DigiDiet</h2>
     <hr style="border-color: #216268; width: 75%"/>
     <body>
     Just another reason to love cooking.
     Coming soon.
     <hr style="border-color: #216268; width: 75%"/>
     Sign up for updates: {{ Form::email($name, $value = null, $attributes = array()); }}
     </body>
@stop