





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



function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

var myData = getParameterByName('v');
console.log(myData);


	/*  var div = document.getElementById("dom-target");
    var myData = div.textContent;*/

	
	
      // 2. This code loads the IFrame Player API code asynchronously.
      //var tag = document.createElement('script');

      //tag.src = "https://www.youtube.com/iframe_api";
      //var firstScriptTag = document.getElementsByTagName('script')[0];
      //firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '440',
          width: '740',
          videoId: myData,
		   playerVars: {rel: 0},
		   
          
        });
      }
	  
	  console.log(onYouTubeIframeAPIReady);

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        
        
      }
      function stopVideo() {
        player.stopVideo();
      }
	  
 

