<?php
class moviedal {
		function selectAllMovieList($offset = 0, $rpage = 0) {
			$query = "SELECT title,MAX(sequence_no) AS sequence_no, DATE_FORMAT(MAX(release_date), '%d %b')AS releasedate,series,max(release_date) AS release_date, ". 
			" MAX(pic_path) AS pic_path FROM movie_main WHERE series IN(1,3) GROUP BY title,series ORDER BY release_date DESC,title ASC";
			if ($rpage != 0)
				$query .= " LIMIT $offset, $rpage";;
			$result = mysql_query($query);
			if ($result)
				return $result; else
				die ( "Select all of movie data fail.");
		}
		
		function selectSeriesTypes() {
			$query = "SELECT DISTINCT(series) AS serie,
						  CASE series
						  WHEN 1 THEN 'Drama'
						  WHEN 2 THEN 'Variety shows'
						  WHEN 3 THEN 'Entertainment'
						  ELSE 'Unknown'
						  END AS serietype
					  FROM movie_main WHERE series IN(1,3) ORDER BY series;";
			$result = mysql_query($query);
			if ($result)
				return $result; else
				die ("Select episode data fail.");
		}
		
		function selectEpisodeByTitle($title) {
			$title = '%'.$title.'%';
			$query = "SELECT title,description,sequence_no,pic_path,
					  CONCAT(
						  CASE origin 
						  WHEN 'kr' THEN 'Korea '
						  WHEN 'in' THEN 'India '
						  WHEN 'mm' THEN 'Myanmar '
						  WHEN 'th' THEN 'Thailand '
						  WHEN 'jp' THEN 'Japan '
						  WHEN 'eng' THEN 'English '
						  ELSE 'Unknown '
						  END,
						  CASE series
						  WHEN 1 THEN 'Drama'
						  WHEN 2 THEN 'Variety shows'
						  WHEN 3 THEN 'Entertainment'
						  ELSE 'Unknown'
						  END
					  )AS origin
					  FROM movie_main WHERE title LIKE N'$title' ORDER BY sequence_no DESC;";
			$result = mysql_query($query);
			if ($result)
				return $result; else
				die ("Select episode data fail.");
		}
	}
?>