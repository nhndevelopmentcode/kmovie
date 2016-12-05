<?php
require_once ('header.php');
	$moviebol = new moviebol();
	$result = $moviebol->selectAllMovieList(0,0);
?>

<!-- index section -->
<section class="dark-black-bg" id="portfolio">                
            <div class="container-fluid">
                <div class="row">
					<div class="col-sm-12 col-xs-12 text-center content-block xs-no-padding-lr">
						<?php
							if ($result){
									while($row = mysql_fetch_array($result)){
											echo '<div class="col-md-4 col-sm-6 col-xs-12 shs-border mvt-'. $row['series'] .'">';
													$file_name =  $row['pic_path'].'.jpeg';
													echo '<a href="#portfolioModal1" class="portfolio-link mv-go-detail" id="'.$row['title'].'" data-toggle="modal">';
													if (is_file(GW_UPLOADPATH . $file_name)) {
														
														echo '<div class="playicon-overlay">';
														echo '<img alt="'.$row['title'].'" class="left-img" src="' . GW_UPLOADPATH . $file_name . '">';
														echo '</div>';
														
													}
													echo '<p class="title text-success list-title"><nobr><span>'.$row['title'].'</span></nobr></p>';
													echo '<div class="episode-title">';
													echo '<p class="release-date mm-font"> အပိုင္း &nbsp;'.$row['sequence_no'].' ပိုင္း|</p>';
													echo '<p class="release-date rd-color"> &nbsp;Updated : '.$row['releasedate'].'</p>';
													echo '</div>';
													echo '</a>';
											echo '</div>';
									}
							}
						?>
					</div>
				</div>
			</div>
</section>

<!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <img src="img/btn-back.png">
            </div>
            <div class="container">
			<div class="records_content"></div>
            </div>
        </div>
    </div>

</body>