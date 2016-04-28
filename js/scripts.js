$(document).ready(function(){
	
	$('#form').submit(function(e) {
    if ($.trim($("#filterInput").val()) === "") {
        e.preventDefault();
		if ($(".nav-col-0").css("display") == "none" ){
         $("#filterInput").slideToggle("fast");
          /* $(document).on("scrollstart",function(){
                            alert("Started scrolling!");
                              });*/
    }
    }
});

if ($(".nav-col-0").css("display") == "none" ){
         $("#myinput").slideToggle("fast");
          $(window).scroll(function(){
             $("#filterInput").hide("fast"); 
			 
    });
    }	


	
	
	
	
	
	
	
	
	
	
	
});