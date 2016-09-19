/****************main*************************/

(function(w){
	
	$(document).ready(function() {

		
		$('#reg_form').submit(function(event){


			var name = $("#name").val().trim(); //gets the value in name regform..removes leading and trailing whitespaces too
			var email = $("#email").val().trim(); 

			if(!name){ //if no name was entered
				alert('name cannot be empty');
				event.preventDefault();  // prevents the form from being submitted to the server
			}else if(!email){
				alert('email cannot be empty');
				event.preventDefault();
			}
			
		});
		/*setPicHeight();
	   
		$("#menu_btn").click(function(){

			if(menuSwitch == 0){

				//$(".mainmenu nav").css("display","block");
				$(".mainmenu nav").slideDown();
				menuSwitch = 1;
			}else{
				//$(".mainmenu nav").css("display","none");
				$(".mainmenu nav").slideUp();
				menuSwitch = 0;
			}
		});


		$("#search_btn").click(function(){

			var searchVal = $("#search_input").val().trim();

			if(searchSwitch == 0){
				$("#search_input").css("display", "inline-block");
				searchSwitch = 1;
			}else if(searchVal){
				window.location.href = "/search/"+searchVal;
			}else{
				$("#search_input").css("display", "none");
				searchSwitch = 0;
			}
		});*/

		
	
	});
	
	
	/*$(window).scroll(function () {
	      //console.log($(window).scrollTop())
	    if ($(window).scrollTop() > 114) {
	      $('.mainmenu').addClass('fixmenu');
	      $('.mainmenu').css("box-shadow"," 0 2px 4px 0 rgba(0,0,0,0.7),0 2px 10px 0 rgba(0,0,0,0.5)");
	    }
	    if ($(window).scrollTop() < 115) {
	      $('.mainmenu').removeClass('fixmenu');
	      $('.mainmenu').css("box-shadow","0 0px 0px 0 rgba(0,0,0,0.7),0 0px 0px 0 rgba(0,0,0,0.5)");
	    }
	    
	  });
	
	$(w).resize(function(){ //Update dimensions on resize
			
			setPicHeight();
			if(!isMobile()){

				$(".mainmenu nav").css("display","block");
			}

		});


	function setPicHeight(){

		if(!isMobile()){
			var picWidth = $(".picholder").width();
			$(".picholder").css("height",picWidth);
		}else{
			$(".picholder").css("height","13em");
		}
	}


	function isMobile(){
		var windowWidthInEm = document.body.clientWidth/16;
		if(windowWidthInEm > 30){
			return false;
		}
		return true;
	}*/
	
	
	
})(this);	