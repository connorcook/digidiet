@extends('layouts.content')
@section('title')
	{{ isset($recipe) ? $recipe->title : 'Recipe not found.' }}
@endsection

@section('content')
  {{ HTML::script('/js/jquery.raty.js'); }}
	
	@if( isset($recipe) )
		<h3> {{ $recipe -> title}} </h3><br>
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
		<h4> By: {{$user -> username}}</h4>
		<h4> Description: </h4>
		<p> {{ $recipe -> description }} </p>

		<h4> Ingredients: </h4>
		<p> {{ $recipe -> ingredients }} </p>
		<h4> Instructions: </h4>
		<p> {{ $recipe -> instructions }} </p>
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