@extends('layouts.content')
@section('title')
	{{ isset($recipe) ? $recipe->title : 'Recipe not found.' }}
@endsection

@section('content')
  {{ HTML::script('/js/jquery.raty.js'); }}
	
	@if( isset($recipe) )
		<h3> {{ $recipe -> title}} </h3><br>
		<!--if there is a rating for this recipe by this user, don't enable rating -->

        <img src="{{$recipe -> image_url}}" width="200" height="200">

		@if(isset($rated) & $rated>0 )
			<?php $hasRated = 1; ?>
			
		@else
			<?php $hasRated = 0; ?>
		@endif
		
		@if( $rating == 0)
			<?php $rating = 0; ?>
		@endif
		<div class="star"></div>
		<h4> By: <a href="{{URL::to('user/'.$user->id)}}">{{$user -> username}}</a></h4>
		<h4> Description: </h4>
		<p> {{ $recipe -> description }} </p>

		<h4> Ingredients: </h4>
		<p> {{ $recipe -> ingredients }} </p>
		<h4> Instructions: </h4>
		<p> {{ $recipe -> instructions }} </p>

		<hr class="alt1" />

		<div class="grid flex">

			<div class="col_3" style="font-size: 20px">Comments</div>
			
			@if(Auth::check())
				<div id="add_comment" class="col_9">
						<button id="add_button" class="small"> Add a Comment</button>
				</div>
			@else
				<div class="col_9">You must be logged in to comment!</div>
			@endif	
			
			<div id="comment_form" class="col_12" style="display: none">
			

				{{ Form::open(array('url'=> URL::to('recipe/'.$recipe->id.'/post/'),'class'=>'vertical', 'method'=>'post')); }}

					<!– about me field –>
					<p>{{ Form::label('content', 'Post *'); }}</p>
					<p>{{ Form::textarea('content',null,array('placeholder'=>'Write your comment here.')); }}</p>

					<!- tags 			->
					<p>{{ Form::label('tags', 'Tags'); }}</p>
					<p>{{ Form::text('tags',null,array('placeholder'=>'tag your comment')); }}</p>
					<p>Fields marked with * are required.</p>
					<!– submit button –>
					<p>{{ Form::submit('Create Post', array('class' => 'btn-large')); }}</p>
					{{ Form::close(); }}

			</div>

			<!--jquery for comment box-->
			<script type="text/javascript">

				$(document).ready(function(){
					var err = {{$errors}};
					console.log(err);

					if(err.length == 0){
						console.log("successful comment! ");
					}
					else{
						console.log("There was an error!")
						$('#add_comment').append("<div class='notice error'><i class='icon-remove-sign icon-small'></i> Error posting comment. <a href='#close' class='icon-remove'></a></div>");
					}

					$('#add_comment').click(function(){
						
						$('#comment_form').toggle();
						
					}),
					$('form').submit(function(){
						$('#comment_form').toggle();
						console.log("submit button clicked");
					});
				});

			</script>

			@foreach(DB::table('posts')->where('parent_id', '=', $recipe->id)->get() as $post)
				
				<div class="col_12">
				<div class="col_3">
					<a href="{{URL::to('user/'.$post->author_id)}}">{{User::find($post->author_id)->username}}</a>
				</div>
				<div class="col_6">{{$post->content}}</div>

				
				<!--must be logged in and not flagged the comment before-->
				@if(Auth::check() && !DB::table('flags')->where('post_id','=',$post->id)->where('user_id','=',Auth::user()->id)->get())
					<div class="col_3"> <button id={{$post->id}} class="small flag" onclick="">Flag</button>
				@else
					<div class="col_3"> 
				@endif
				</div>
				<!--jquery to handle flagging content-->
				<!--console logs are for debugging purposes-->
				<script type="text/javascript">
		
					$(document).ready(function(){
						$('#{{$post->id}}').click(function(){

							console.log("You clicked the button to flag comment: "+{{$post->id}}+".");

							var post = {{$post->id}};
							console.log(post);

							@if(Auth::check()) 
								var user = {{Auth::user()->id}};
								console.log(user);
							@endif
							

							$.ajax({
								url: '{{URL::to('flag')}}',
								type: 'POST',
								data: {
									'id':post,
									'user_id':user
								},
								success: function(data){
									console.log("request returned:");
									console.log(data);
									$('#{{$post->id}}').replaceWith("<div class='notice success'><i class='icon-ok icon-small'></i> Flagged! <a href='#close' class='icon-remove'></a></div>");
								},
								error: function(xhr,ajaxOptions,thrownError){
									alert(xhr.status);
									alert(xhr.responseText);
									alert(thrownError);
								}
							});

							
						});
					});
				</script>
				</div>
				<hr class="alt2" />
			@endforeach

		</div>



		
	@else
		<p> Recipe not found. </p>
	@endif
	<script type="text/javascript">
	//set the rating
	var rating = {{ $rating }};
	//set the recipe id
	var recipe_id = {{ $recipe->id }};
	//set whether it should be rateable or not
	var readOnly = {{ $hasRated }};
	//if readOnly is set, only display the rating
	if(readOnly > 0)
	{
		$('.star').raty(
		{score: rating,
		readOnly:true        
         });

	}
	//otherwise, display the rateable version
	else
	{	
		$('.star').raty(
		{score: rating,
		//on click, send a post request with the data
		 click: function(score, evt) {
			$.ajax({
				type: 'POST',
				url: '../rate',
				data: {'rating':score, 'recipe_id': recipe_id},
				success: function(data){ location.reload(); }         
				});

			}	
		}); 
	}
	
	</script>
@endsection