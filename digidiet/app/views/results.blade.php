@extends('layouts.standard')

@section('content')

<!-- Display search box at the top of the search results page
	 Re-search if new query submitted.
	 TODO Get this search box on every page of the site
-->
	{{ Form::open(array('url'=>'search', 'method'=>'post')); }}

     <!- search box field ->
     <p>{{ Form::label('Recipe', 'Search for recipes'); }}</p>
     <p>{{ Form::text('search') }}</p>

     <!-- Search button -->
     <p>{{ Form::submit('Search', array('class' => 'btn-large')); }}</p>
     {{ Form::close(); }}

<!--<form action="" method="get">
	Search for recipes: <input type="text" name="search_query">
	<input type="submit" value="Search">
</form>
-->

<!--
<?php
	if(isset($_POST['search_query'])) {
		$search = $_POST['search_query'];
		// TODO FIGURE OUT HOW TO REFRESH PAGE WITH NEW SEARCH RESULTS
	}
?>
-->

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
				$result = mysqli_query($dblink, "SELECT * FROM recipes WHERE name LIKE'%" . mysqli_real_escape_string($dblink, $search) . "%' ORDER BY created_at DESC", MYSQLI_USE_RESULT);
				break;
			case "lowest rating":
//				echo "User wishes to sort by lowest rating.";
				$result = mysqli_query($dblink, "SELECT * FROM recipes WHERE name LIKE'%" . mysqli_real_escape_string($dblink, $search) . "%' ORDER BY created_at DESC", MYSQLI_USE_RESULT);
				break;
			case "more recent":
//				echo "User wishes to sort by more recent.";
				$result = mysqli_query($dblink, "SELECT * FROM recipes WHERE name LIKE'%" . mysqli_real_escape_string($dblink, $search) . "%' ORDER BY created_at DESC", MYSQLI_USE_RESULT);
				break;
			case "less recent":
//				echo "User wishes to sort by less recent.";
				$result = mysqli_query($dblink, "SELECT * FROM recipes WHERE name LIKE'%" . mysqli_real_escape_string($dblink, $search) . "%' ORDER BY created_at", MYSQLI_USE_RESULT);
				break;
			default:
//				echo "User wishes to sort by {$sortby_option}, but that is not a sort option.";
		}
	} else {
		$result = mysqli_query($dblink, "SELECT * FROM recipes WHERE name LIKE'%" . mysqli_real_escape_string($dblink, $search) . "%'", MYSQLI_USE_RESULT);
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
	while($row = mysqli_fetch_assoc($result))
    {
    	$results[] = $row;
    	echo "<tr>";
    	echo "<td>" . $row['name'] . "</td>";
    	//echo "<td>" . $row['rating'] . "</td>";
    	echo "</tr>";
    }
    echo "</table>";
//  print_r($results);		// TESTING PURPOSES ONLY
    mysqli_free_result($result);	// Free result set

   	/* TODO Call preg_match to match on regular expressions */
?>
<?php
	$results_count = count($results);
	echo "<br>{$results_count}";
	if($results_count== 1) { echo ' result'; } else { echo ' results';} 
	echo " displayed."
?>

<form action="" method="post">
    <br>Sort by: <br />
    <select multiple name="sortby[]">
        <option value="highest rating" name="sort_option">Highest Rating</option>
        <option value="lowest rating" name="sort_option">Lowest Rating</option>
        <option value="most comments" name="sort_option">Most Comments</option>
        <option value="least comments" name="sort_option">Least Comments</option>
        <option value="more recent" name="sort_option">More Recent</option>
        <option value="less recent" name="sort_option">Less Recent</option>
    </select><br />
    <br />
    <input type="submit" value="Sort"/>
</form>

@stop
@endsection
