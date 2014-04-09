@extends('layouts.standard')

@section('content')
{{ HTML::script('/js/jquery.raty.js'); }}

<!-- Display search box at the top of the search results page
	 Re-search if new query submitted.
	 TODO Get this search box on every page of the site
-->
<?php
	if(isset($_POST['sort_search'])) {
		$search = $_POST['sort_search'];
	}
?>
<!--
	{{ Form::open(array('url'=>'search', 'method'=>'post')); }}

     <!- search box field ->
     <p>{{ Form::label('Recipe', 'Search for recipes'); }}</p>
     <p>{{ Form::text('search', $search) }}</p>

     <!-- Search button
     <p>{{ Form::submit('Search', array('class' => 'btn-large')); }}</p>
     {{ Form::close(); }}
     -->

<form action="" method="post" id="sortForm">
    <br>Sort by: <br />
    <select name="sortby[]">
        <option value="highest rating" name="sort_option">Highest Rating</option>
        <option value="lowest rating" name="sort_option">Lowest Rating</option>
        <option value="most recent" name="sort_option">Most Recent</option>
        <option value="least recent" name="sort_option">Least Recent</option>
    </select><br />
    <br />
    <!-- passes the value in $search as input to the page -->
    <input type="hidden" value=<?php echo "{$search}"; ?> name="sort_search">
    <input type="submit" value="Sort"/>
</form>

<?php

/* Function for opening a database connection */
function openDBConn() {
    static $link;
    if (!isset($link)) {
      $link = mysqli_connect('localhost', 'root', 'devdes', 'digidiet');
    }
    return $link; // returns the link
}

	$dblink = openDBConn();
	if (!$dblink) {
		echo( "<P>Unable to connect to the " .
        "database server at this time.</P>" );
	exit();
	}

	/* Select the appropriate database */
	mysqli_select_db($dblink, "digidiet");
	if (!@mysqli_select_db($dblink, "digidiet")) {
		echo( "<P>Unable to locate the digidiet " .
        "database at this time.</P>" );
	exit();
	}

//	print_r($_POST);		// TESTING PURPOSES ONLY

	/* 
	 * Place a result set that matches the search query
	 * stored in $search, and sorted by $sortby_option
	 * if the variable is set, in the variable $result
	 * TODO SEARCH BY HIGHEST RATING AND LOWEST RATING
	 */
	if(isset($_POST['sortby'][0])) {
		$sortby_option = $_POST['sortby'][0];
		switch ($sortby_option) {
			case "highest rating":
//				echo "User wishes to sort by highest rating";
				$result = mysqli_query($dblink, "SELECT * FROM recipes WHERE title LIKE'%" . mysqli_real_escape_string($dblink, $search) . "%' ORDER BY rating", MYSQLI_USE_RESULT);
				break;
			case "lowest rating":
//				echo "User wishes to sort by lowest rating.";
				$result = mysqli_query($dblink, "SELECT * FROM recipes WHERE title LIKE'%" . mysqli_real_escape_string($dblink, $search) . "%' ORDER BY rating DESC", MYSQLI_USE_RESULT);
				break;
			case "most recent":
//				echo "User wishes to sort by more recent.";
				$result = mysqli_query($dblink, "SELECT * FROM recipes WHERE title LIKE'%" . mysqli_real_escape_string($dblink, $search) . "%' ORDER BY created_at DESC", MYSQLI_USE_RESULT);
				break;
			case "least recent":
//				echo "User wishes to sort by less recent.";
				$result = mysqli_query($dblink, "SELECT * FROM recipes WHERE title LIKE'%" . mysqli_real_escape_string($dblink, $search) . "%' ORDER BY created_at", MYSQLI_USE_RESULT);
				break;
			default:
//				echo "User wishes to sort by {$sortby_option}, but that is not a sort option.";
		}
	} else {
		$result = mysqli_query($dblink, "SELECT * FROM recipes WHERE title LIKE'%" . mysqli_real_escape_string($dblink, $search) . "%'", MYSQLI_USE_RESULT);
	}
	if (!$result) {
		echo("<P>Error performing query: " .
    	mysqli_error($dblink) . "</P>");
		exit();
	}

	/* Create an array for storing the result set,
	 * and create a table to hold the results for
	 * display to the user
	 */
	$results = array();
	echo "<table border='0'>
	<tr>
	<th>Recipe Title</th>
	<th>Rating</th>
	</tr>";

	/* Put the result set into an array and fill
	 * a table for results display
	 */
	$rating = 0;
	while($row = mysqli_fetch_assoc($result))
    {
    	$results[] = $row;
		//$rating = new HttpRequest("/rating/".$row['id'], HttpRequest::METH_GET);
		//$rating = http_get("/rating/".$row['id'], $info);
		//use curl to send a get request to get the rating for each
		// $curl = curl_init();
		// curl_setopt($curl, CURLOPT_URL, "http://localhost/rating/".$row['id']);
		// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// $rating = curl_exec($curl);
		// if ( $error = curl_error($curl) ) 
			// {echo 'ERROR: ',$error;}
		
		// curl_close($curl);
		// $rating = Request::path(
		$rating = $row['rating'];
    	echo "<tr>";
    	echo "<td><a href='/recipe/" . $row['id'] . "\'>". $row['title'] . "</a></td>";
		echo "<td> <div class=\"star\" data-score=\"" . $row['rating'] . "\"></div></td>";
    	echo "</tr>";
    }
    echo "</table>";
//  print_r($results);		// TESTING PURPOSES ONLY
    mysqli_free_result($result);	// Free result set

	$results_count = count($results);
	echo "<br>{$results_count}";
	if($results_count== 1) { echo ' result'; } else { echo ' results';} 
	echo " displayed."
?>
<script>
var rating = {{ $rating }};
$('.star').raty({
  score: function() {
    return $(this).attr('data-score');
  },
  readOnly: true
});
</script>
@stop
@endsection