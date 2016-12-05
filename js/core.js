
$(document).ready(function(){
 $('.search-clear-box').show();


    $('.search-clear-input-box').keydown(function(){
        $('.search-clear-box').show();
    });
    $('.search-clear-box').click(function() {
      $('.search-clear-box').show();
    });

  $('.searchresult-text').click(function () { 
    $('.searchresult-player').show();  
    $('.searchresult-warning').hide();
    $("html, body").animate({ scrollTop: 0 }, "slow");    
     });


  // $('.scrollToTop').click(function(){
  //   $('.searchresult-player').scrollTop();
    
  // });

  $('.search-slider-text').click(function () { 
    $('.searchresult-warning').hide();
    $('.searchresult-player').slideDown(200);
     // $('.scrollTop').scrollTop();
  });
  
  // movie detail set episode-id	
	$(document).on('click', '.mv-detail', function(){
		var movieid = $(this).attr('id');
		showEpisodeNo($(this).text());
		$('#myplayer').attr("data-video",movieid);
	});

	// call ajax return dobj with id
	$(document).on('click', '#myplayer', function(){
		var title = $('p.mv-title').text();
		var epsno = $('#episodeno').val();
		play($(this).data('video'));
		GetMovieDetail(title,epsno);
		showEpisodeNo(epsno);
	});
	
	
  $('#myplayer').click(function () { 
	  play($(this).data('video'));
	});

  $('.playicon-wrapper').click(function () { 
    play($(this).data('videoid'));
  });
  
  // get movie detail page
  $(document).on('click', '.mv-go-detail', function(){
		var title = $(this).attr('id');
		GetMovieDetail(title,'');
	});
	
  function showEpisodeNo(epsNo) {
	$('#eps-no').html('အပိုင္း ' + epsNo);  
	$('#episodeno').val(epsNo);  
  }
  
  function GetMovieDetail(title,episodeno) {
	  
		$.ajax({
        url: 'movieDetail.php',
        type: 'GET',
        data: {"title": title, "episodeno": episodeno},
			beforeSend: function() {
				$(".ajaxLoading").show();
			},
			success: function(data) {
				$(".ajaxLoading").hide();
				$(".records_content").html(data);
			}
		});
	}
	
	document.getElementById("mySidenav").style.display = "none";
	
	$('.closebtn').click(function () { 
		document.getElementById("mySidenav").style.display = "none";
	});
	
	$('.nav-open').click(function () {
		document.getElementById("mySidenav").style.width = "10%";
		document.getElementById("mySidenav").style.display = "block";
	});
	
	$(document).on('click', '.nv-type', function(){
		var className = $(this).attr("id");
		if (className == 'mvt-all'){
			getallnav();
		}
		
		if (className != 'mvt-none' && className != 'mvt-all') {
			showHideMovieDiv(className);
		}
		document.getElementById("mySidenav").style.display = "none";
	});
	
	function getallnav(){
		$("#mySidenav li").each(function(){
			var name = $(this).attr("id");
			if (name != null && name !='')  {
				$("."+ name).css('display', 'block');
			}
			
		});
	}
	
	function showHideMovieDiv(id){
		$("#mySidenav li").each(function(){
			var listName = $(this).attr("id");
			if (listName == id){
				$("."+ id).css('display', 'block');
			}
			
			if (listName != id && listName != 'mvt-none' && listName != 'mvt-all'){
				$("."+ listName).css('display', 'none');
			}
		
		});
    }
  // $('.playicon-text').click(function () { 
  //   play($(this).parent().find('div.playicon-wrapper').data('videoid'));
  // });
	
	function play(id) {
	  if (window.JSX) { 
		try { 
		  window.JSX.play(id);
		} catch (e) { 
		  //
		} 
	  }
	}
	
	/* validation of log in */
	$("#login-form").validate({
		rules: {
			username: "required",
			password: {
				required: true,
				minlength: 8
			}
		},
		messages: {
			username: "Please enter your username.",
			password: {
				required: "Please enter password.",
				minlength: "Password at least have 8 characters."
			}
		},
		submitHandler: function(form) {
			form.submit();
		}
	});  
	
	
	
	/* validation of user registeration */
	$("#userreg-form").validate({
		rules: {
			username: "required",
			password: {
				required: true,
				minlength: 8
			},
			cfmPassword: {
				required:true,
				equalTo: "#password"
			}
		},
		messages: {
			username: "Please enter your username.",
			password: {
				required: "Please enter password.",
				minlength: "Password at least have 8 characters."
			},
			cfmPassword: {
				required: "Please enter confirm password.",
				equalTo: "Confirm password must be same with password."
			}
		},
		submitHandler: function(form) {
			form.submit();
		}
	});  
  
    /* validation */

  $('.playicon-wrapper').click(function () { 
    var videoid = $(this).data('videoid');
    var videotitle = $(this).data('videotitle');
    var videodesc = $(this).data('videodesc');
    $('#myplayer.video').attr('data-video', videoid);
    $('#myplayer.video img').attr('src', '/kmovie/img/movie-pic/'+videoid+'.jpeg');
    $('h1.player-video-title').text(videotitle);
    $('.player-video-desc').text(videodesc);
  });

  $('.playicon-text').click(function () { 
    var videoid = $(this).parent().find('div.playicon-wrapper').data('videoid');
    var videotitle = $(this).parent().find('div.playicon-wrapper').data('videotitle');
    var videodesc = $(this).parent().find('div.playicon-wrapper').data('videodesc');
    $('#myplayer.video').attr('data-video', videoid);
    $('#myplayer.video img').attr('src', '/kmovie/img/movie-pic/'+videoid+'.jpeg');
    $('h1.player-video-title').text(videotitle);
    $('.player-video-desc').text(videodesc);
  });



});

 
  // $(function() {
  //   var availableTags = [
  //     "ေနမင္းမွဆင္းသက္လာသူ (ကိုရီးယားဇာတ္လမ္း)",
  //     "သင့္နွလံုးသားကိုဖြင့္လိုက္ပါ (ကိုရီးယားဇာတ္လမ္း)",
  //     "အရည္အခ်င္းမရွိေသာ သူရဲေကာင္း (ကိုရီးယားဇာတ္လမ္း)",
  //     "The Baby and Me (ကိုရီးယားဇာတ္လမ္း)",
  //     "Phantom (အိနၵိယဇာတ္လမ္း)",
  //     "Yeh Jawaani Hai Deewani (အိနၵိယဇာတ္လမ္း)",
  //     "Bajrangi Bhaijaan (အိနၵိယဇာတ္လမ္း)",
  //     "Piku (အိနၵိယဇာတ္လမ္း)",
  //     "ပဲ့တင္သည့္ကံ (ျမန္မာဇာတ္လမ္း)",
  //     "ပဲေစ့မ (ျမန္မာဇာတ္လမ္း)",
  //     "သက္တံသစ္ (ျမန္မာဇာတ္လမ္း)",
  //     " ေပြလီမ (ျမန္မာဇာတ္လမ္း)"
      
  //   ];
  //   $( "#tags" ).autocomplete({
  //     source: availableTags
  //   });
  // });/* 


//$('#myCarousel').carousel({
  //interval: 40000
//}); 

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  if (next.next().length>0) {
 
      next.next().children(':first-child').clone().appendTo($(this)).addClass('rightest');
      
  }
  else {
      $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
     
  }
});

// Add by ZZ (2.8.2016)

    $(document).ready(function() {  
       $("#myCarousel").swiperight(function() {  
          $("#myCarousel").carousel('prev');  
        });  
       $("#myCarousel").swipeleft(function() {  
          $("#myCarousel").carousel('next');  
       });  
    });  
    

 $(document).ready(function() {  
       $("#myCarouselOld").swiperight(function() {  
          $("#myCarouselOld").carousel('prev');  
        });  
       $("#myCarouselOld").swipeleft(function() {  
          $("#myCarouselOld").carousel('next');  
       });  
    });  

function goBack() {
    window.history.back();
  }