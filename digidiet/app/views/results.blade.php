@extends('layouts.standard')

@section('content')

<!-- Display search box at the top of the search results page
	 Re-search if new query submitted.
	 TODO Get this search box on every page of the site
-->
<form action="" method="get">
	Search: <input type="text" name="search_query">
	<input type="submit" value="Search">
</form>

<?php
	/* Establish database connection */
	$dbcnx = @mysql_connect("localhost", "root", "devdes");
	if (!$dbcnx) {
		echo( "<P>Unable to connect to the " .
        "database server at this time.</P>" );
	exit();
	}

	/* Select the appropriate database */
	mysql_select_db("digidiet", $dbcnx);
	if (!@mysql_select_db("digidiet") ) {
		echo( "<P>Unable to locate the recipe " .
        "database at this time.</P>" );
	exit();
	}

	/* 
	 * Place a result set containing the text of all the recipe names
	 * stored in the recipes table into the variable $result
	 * TODO Search by fields other than recipe_name
	 */
	$result = mysql_query("SELECT * FROM recipes");
	if (!$result) {
	echo("<P>Error performing query: " .
    	mysql_error() . "</P>");
	exit();
	}

	/* Put the result set into an array */
	$results = array();
	while($row = mysql_fetch_assoc($result))
    {
    	$results[] = $row;
    }
    print_r($results);		// TESTING PURPOSES ONLY

    /* Default search by recipe_name? */
    /* Display results based on recipe_name */
    /*
     * This display algorithm should display the most relevant
     * recipes by name because it forces the recipe names to
     * match a sequence of characters exactly
     * stripos tests if the second parameter is contained in the
     * first parameter, regardess of case
     */
    $count = 0;
    for($i = 0; $i < count($results); $i++) {
    	print_r($results[$i]["recipe_name"]);
    	if(stripos($results[$i]["recipe_name"], $search) !== false) {
    		echo ("<P>" . $results[$i]["recipe_name"] . "</P>");
    		++$count;
    	}
   	}

   	/* Call preg_match to match on regular expressions */
?>
	<p>{{$count}}
	<?php if($count == 1) { echo 'result'; } else { echo 'results';} ?> displayed.</p>

<form action="" method="post">
    Sort by: <br />
    <select multiple name="beer[]">
        <option value="highest_rating">Highest Rating</option>
        <option value="lowest_rating">Lowest Rating</option>
        <option value="most_comments">Most Comments</option>
        <option value="least_comments">Least Comments</option>
        <option value="more_recent">More Recent</option>
        <option value="less_recent">Less Recent</option>
    </select><br />
    <br />
    <input type="submit" value="Sort"/>
</form>

@endsection
