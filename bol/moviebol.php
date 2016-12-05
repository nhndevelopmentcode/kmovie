<?php
class moviebol{
	
	
	
	// Get all movie title and image link
	function selectAllMovieList($offset = 0, $rpage = 0) {
		$moviedal = new moviedal( );
		$result = $moviedal->selectAllMovieList($offset, $rpage);
		if ($result) {
			return $result;
		} else {
			die ( "Error in Business Logic of select all movie." );
		}
	}
	
	// Get all movie title and image link
	function selectSeriesTypes() {
		$moviedal = new moviedal( );
		$result = $moviedal->selectSeriesTypes();
		if ($result) {
			return $result;
		} else {
			die ( "Error in Business Logic of select all series Type." );
		}
	}
	
	// Get episodes by specific title.
	function selectEpisodeByTitle($title) {
		$moviedal = new moviedal();
		$result = $moviedal->selectEpisodeByTitle($title);
		if ($result){
			return $result;
		} else {
			die ("Error in Business Logic.");
		}
	}
 }
?>