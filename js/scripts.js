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


          
          $(window).scroll(function(){
			  if ($(".nav-col-0").css("display") == "none" ){
             if ($("input#filterInput").css("display") == "block"){
			    $("#filterInput").hide("fast"); 
		}
			  }		
    });
    
		


	
	/*if($.trim($("#filterInput").val()) !== "" && $("#filterInput").css("display")=== "none"){
				alert("letters in the hole");
				}*/
	
	$("#search-button").click(function(e){
	
	if($("#filterInput").val() !== "" && $("input#filterInput").css("display") == "none"){
		      e.preventDefault();
				$("#filterInput").slideDown("fast"); 
				}
	
	});
	
	
	
});