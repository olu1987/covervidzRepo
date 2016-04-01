<!doctype html>
<html>
<head>
<title>COVERVIDZ</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script data-require="bootstrap@*" data-semver="3.0.2" src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="content-script-type" content="text/javascript">
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
	   <a href="#" style=""class="pull-left"><img style="height:50px;margin:0px 10px">COVERVIDZ</a>
	  
    </div>
	   <div class="collapse navbar-collapse" id="myNavbar" >
        <ul class="nav navbar-nav">
             <li id="butHome" class="active"><a  href="#">Home</a></li>
	         <li id="but1"><a href="aboutPage.html">About Covervidz</a></li>
	         <li id="but2"><a href="uploadPage.html">Upload a cover</a></li>
	         <li id="but2"><a href="popPage.html">Pop</a></li>
	         <li id="but2"><a href="r&bPage.html">R&B</a></li>
	         <li id="but2"><a href="uploadPage.html">Rap/Hip-hop</a></li>
	         
	     </ul>
		 <form class="navbar-form navbar-left" ng-submit="processForm()" role="search">
        <div class="form-group" >
		<div class="input-group" >
		   <input type="text" style="width:350px;border-radius:30px" class="form-control" ng-model="formData.search" placeholder="Search">
		  </div>
        </div>
        <button type="submit" ng-click="gotoResults()" class="btn btn-success">Search</button>
      </form>
		<ul class="nav navbar-nav navbar-right">
		      <li><a href="https://www.facebook.com/covervidz" ><i class="fa fa-facebook"></i></a></li>
	          
			  
		    
		    
		</ul>
		</div>
	


    </div>
</nav>
<div class="container">
<div class="text-center">
<h1 class="header" style="margin-top:60px">COVERVIDZ</h1>
</div>
<div class="row">
<div class="col-md-8">
<div id="player"></div>


    
<div id="dom-target" style="display:none" >
<?php

//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("localhost","root","","CoverChart2");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 $sql = "SELECT *
      FROM covers, genre, songs, artists
      WHERE URL = '". htmlspecialchars($_GET["v"])."'
      AND genre_id = g_id
	  AND songid = song_id
	  AND Artist_id = a_id
	 ";

$result = $con->query($sql);


   $data = array();
  if($result->num_rows > 0){
  while($row = $result->fetch_object()) {
        $data[] = $row;
		}
  }
	else{
		$data[] = null;
	}
	 
	 
$sql2 = "SELECT * FROM covers, genre, songs, artists 
        WHERE (artist = '".$data[0]->artist."'
		OR coverArtist = '".$data[0]->coverArtist."'OR (genreName = '".$data[0]->genreName."' AND youtubeViews > 5000000))
        AND genre_id = g_id AND songid = song_id 
		AND Artist_id = a_id		
		AND URL !='".$data[0]->URL."'
		ORDER BY RAND()
		";
	
	$result2 = $con->query($sql2);



   $data2 = array();
  if($result2->num_rows > 0){
  while($row2 = $result2->fetch_object()) {
        $data2[] = $row2;
		}
  }
	else{
		$data2[] = null;
	}
	
$output = $data[0]->URL;
echo htmlspecialchars($output);
?>
</div>
<script>
	  var div = document.getElementById("dom-target");
    var myData = div.textContent;
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: myData,
		   playerVars: {rel: 0},
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

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
    </script>

<?php 
echo "<h1>".$data[0]->name." - ".$data[0]->artist."</h1><p>".number_format($data[0]->youtubeViews)."</p><h3>".$data[0]->coverArtist."</h3>";
?>

<div class="col-md-12" id="disqus_thread"></div>
<script>

/**
* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//covervidz.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//covervidz.disqus.com/count.js" async></script>

</div>
<div class="col-md-4">
<?php


echo '<ul >';
foreach($data2 as $d){
 echo '<a href="../index2.php/?v='.$d->URL.'"><li class="related"><div class="row"><div class="col-md-6"><img class="myThumb" src="'.$d->thumbnail.'"/></div><div class="col-md-6"><b>'.$d->name.'</b><br>'.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</div></div></li></a>';
}
echo '</ul>';
?>
</div>
</div>
</body>