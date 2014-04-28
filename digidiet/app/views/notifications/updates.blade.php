@extends('layouts.content')

@section('title')
	Updates
@stop

@section('content')
	<h1> Updates </h1>

	@if(count($updates) > 0) <!-- IF MESSAGES EXIST, SHOW THEM -->
    <ul>
    <!-- SHOW EACH NOTIFICATION -->
    @foreach($updates as $update)
      <li><a href="{{URL::to($update->link)}}">
      <i class="{{$update->icon}}"></i>
      <!-- SHOW READ NOTIFICATIONS -->
      @if($update->acknowledged)
      {{$update->content}}

      <!-- SHOW UNREAD NOTIFICATIONS IN BOLD -->
      @else 
      <b>{{$update->content}}</b>
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

	</div>
	<div id="navmenu"><p>{{ $updates->links(); }}</p></div>
@endsection