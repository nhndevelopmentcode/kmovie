<?php
require_once('library/reference.php');
require_once('classloader.php');
 
if (isset($_GET["title"]) && !empty($_GET["title"])){
 
// Get title value.
$title = $_GET["title"];
$episodeno = (isset($_GET["episodeno"])) ? $_GET["episodeno"] : '';

// Get related data by title.
$moviebol = new moviebol();
$result = $moviebol->selectEpisodeByTitle(mysql_escape_string($title));

if (mysql_num_rows($result) > 0 ){
$array = array();
$episodes = '';

	// Create episode buttons
    while($episode = mysql_fetch_array($result)){
				$array[] = $episode;
                $episodes .= '<button type="button" class="btn btn-primary btn-sm mv-detail" id="'. $episode['pic_path'].'">'
                .$episode['sequence_no'].'</button>';
            }
	
	// Assign episode no.
	$episodeno = (empty($episodeno)) ? $array[0]['sequence_no'] : $episodeno;
	
	// Create div data to return.
	$data = '<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
							<div id="myplayer" class="video" data-video="'.$array[0]['pic_path'].'">
								<div class="playicon-detail"></div>
								<div class="thumbnail" id="thumbnail">
									<img class="img-responsive" src="' . GW_UPLOADPATH . $array[0]['pic_path'] . '.jpeg">
									<div class="caption">
										<div class="img-text rd-gold-color carousel-caption-text">' .$array[0]['origin'].' </div>
										<div class="carousel-caption-text" id="eps-no"> အပိုင္း '. $episodeno .'</div>
									</div>
								</div>
							</div>
				</div>
				<div class="col-lg-8 col-lg-offset-2">
					<div class="detail-title"> <p class="mv-title">'.$title.'</p> </div>
					<div class="detail-title"> <p> <span class="mv-title-left rd-gold-color">ဇာတ္လမး္အက်ဥ္း:&nbsp;</span> <span class="mm-font">  '.$array[0]['description'].'</span> </p></div>
					<div class="rd-color div-episode-title">အပိုင္းမ်ား :</div>
					<div class="div-episode-title"> '.trim($episodes).'</div>
				</div>
				
				<input type="hidden" name="episodeno" id="episodeno" value="'. $episodeno.'">
			</div>';
} else {
	$data = '<div class="signin-form">
				<div class="container">
				<form class="shs-login">
				<h4 align="center">Your movie is not exist.</h4>
				<a align="center" href="index.php">Go Back</a>
				</form>
			</div>';
}
echo $data;
}else{
	// Go to index.php
	header("Location: index.php");
}
?>