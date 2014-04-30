@extends('layouts.content')
@section('title')
	{{ isset($recipe) ? $recipe->title : 'Recipe not found.' }}
@endsection

@section('content')
  {{ HTML::script('/js/jquery.raty.js'); }}
	
	@if( isset($recipe) )
		<h3> {{ $recipe -> title}} </h3><br>
		
		<!--if there is a picture for this recipe, display it-->
		@if($recipe->image_url)
        	{{HTML::image($recipe->image_url, null, array('width' => '250', 'height'=>250))}}
        @endif

		<!--if there is a rating for this recipe by this user, don't enable rating -->
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

		<!--flag recipe button here-->
		<!--user must be logged in, not flagged before, and not flagging their own recipe-->
		@if(Auth::check() && !DB::table('flags')->where('post_id','=',$recipe->id)->where('user_id','=',Auth::user()->id)->where('post_type', '=','recipe')->get()
					 && $recipe->author_id != Auth::user()->id)
			<button id="flag_recipe" class="small red"> Flag Recipe </button>
		@else
			<button id="flag_recipe" class="small " disabled="disabled"> Flag Recipe </button>
		@endif

		<!--jquery/ajax for flagging recipe-->
		<script type="text/javascript">
		$(document).ready(function(){
			$('#flag_recipe').click(function(){
				var recipe = {{$recipe->id}};

				@if(Auth::check())
				var user = {{Auth::user()->id}};
				@endif

				$.ajax({
							url: '{{URL::to('flag')}}',
							type: 'POST',
							data: {
								'id':recipe,
								'user_id':user,
								'post_type':'recipe'
							},
							success: function(data){
								$('#flag_recipe').replaceWith("<div class='notice success'><i class='icon-ok icon-small'></i> Recipe flagged! <a href='#close' class='icon-remove'></a></div>");
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
		<hr class="alt1" />

		<div class="grid flex">

			<div class="col_3" style="font-size: 20px">Comments</div>
			
			@if(Auth::check())
				<div id="add_comment" class="col_9">
						<button id="add_button" class="small blue"> Add a Comment</button>
				</div>
			@else
				<div class="col_9">You must be logged in to comment!</div>
			@endif	
			
			<div id="comment_form" class="col_6" style="display: none">
			

				{{ Form::open(array('url'=> URL::to('recipe/'.$recipe->id.'/post/'),'class'=>'vertical', 'method'=>'post')); }}

					<!– about me field –>
					<p>{{ Form::label('content', 'Post *'); }}</p>
					<p>{{ Form::textarea('content',null,array('placeholder'=>'Write your comment here.')); }}</p>

					<!– submit button –>
					<p>{{ Form::submit('Create Post', array('class' => 'btn-large blue')); }}</p>
					{{ Form::close(); }}

			</div>

			<!--jquery for comment box-->
			<script type="text/javascript">

				$(document).ready(function(){
					var err = {{$errors}};
		
					if(err.length == 0){
						//comment was successfull
					}
					else{
						$('#add_comment').append("<div class='notice error'><i class='icon-remove-sign icon-small'></i> Error posting comment. <a href='#close' class='icon-remove'></a></div>");
					}

					$('#add_comment').click(function(){
						
						$('#comment_form').toggle();
						
					}),
					$('form').submit(function(){
						$('#comment_form').toggle();
					});
				});

			</script>

			@foreach(DB::table('posts')->where('parent_id', '=', $recipe->id)->get() as $post)
				
				<div class="col_12">
				<div class="col_3">
					<p style="font-size: 20px">{{User::find($post->author_id)->username}}</p>
					
					<a href="{{URL::to('user/'.$post->author_id)}}">
					<img src="{{URL::to(User::find($post->author_id)->avatar)}}"> </a>
					<br>at: {{$post->created_at}}
					@if(Auth::check() && !DB::table('flags')->where('post_id','=',$post->id)->where('user_id','=',Auth::user()->id)->where('post_type', '=','comment')->get()
					 && $post->author_id != Auth::user()->id)
					 <button id={{$post->id}} class="small flag red">Flag Comment</button>
				@else
					<button id={{$post->id}} class="small flag" disabled="disabled">Flag Comment</button>
				@endif
				

					
				</div>
				<div class="col_9">{{$post->content}}</div>

				
				<!--must be logged in and not flagged the comment before-->
				
				<!--jquery to handle flagging content-->
				<!--console logs are for debugging purposes-->
				<script type="text/javascript">
		
					$(document).ready(function(){
						$('#{{$post->id}}').click(function(){

							var post = {{$post->id}};

							@if(Auth::check()) 
								var user = {{Auth::user()->id}};
							@endif
							

							$.ajax({
								url: '{{URL::to('flag')}}',
								type: 'POST',
								data: {
									'id':post,
									'user_id':user,
									'post_type':'comment'
								},
								success: function(data){
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

	@if(isset($recipe))
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
	@endif
@endsection