<?php
if (isset($_GET["search"])) {
header("Location: http://www.covervidz.com/searchpage.php?search=".$_GET["search"]);
}
// Start the session
session_start();

//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("mysql.hostinger.co.uk","u368238327_user2","nBJ4BkUwsq","u368238327_vidz2");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 $sql = "SELECT *
      FROM covers, genre, songs, artists
      WHERE URL = '". htmlspecialchars($_GET["v"])."'
      AND genre_id = g_id
	  AND songid = songs.id
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
		OR coverArtist = '".$data[0]->coverArtist."'OR (genreName = '".$data[0]->genreName."' AND youtubeViews > 10000000))
        AND genre_id = g_id AND songid = songs.id
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
?>
<!doctype html>
<html>
<head>
<title><?php echo $data[0]->name." - ".$data[0]->coverArtist." - COVERVIDZ.COM " ?></title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script data-require="bootstrap@*" data-semver="3.0.2" src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="content-script-type" content="text/javascript">
<meta name="description" content="The best covers from youtube, all in one place. Watch, share, comment, and upload">
<link rel="icon" type="image/png" href="../images/favicon-32x32.png" sizes="32x32">
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/styles-responsive.css" />

</head>
<body>

<div class="mynav">

<form id="form" style="width:100%" class="navbar-form navbar-left" role="search">
<div class="nav-col-0">
</div>

<div class="dropdown nav-col-1">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars nav-bars" aria-hidden="true"></i></span></a>
              <ul class="dropdown-menu">
			   <li id="but1"><a href="aboutPage.html">About Covervidz</a></li>
	         <li id="but2"><a href="uploadPage.html">Upload</a></li>
                <li><a  href="http://www.covervidz.com/searchpage.php?search= ">All Videos</a></li>
                <li><a  href="#">Most recent</a></li>
                <li><a  href="#">Most viewed</a></li>
                <li role="separator" class="divider"></li>
		        <li class="dropdown-header">Genres</li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=pop">Pop</a></li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=R%26B">R&B </a></li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=rap/hip-hop">Rap/Hip-hop</a></li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=rock">Rock</a></li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=dance">Dance</a></li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=choreography">Choreography</a></li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=Gospel/Christian">Gospel/Christian</a></li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=reggae">Reggae</a></li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=instrument/instrumental">Instrumental/Instrument</a></li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=metal">Metal</a></li>
		        <li><a  href="http://www.covervidz.com/genre.php?genre=soul/motown">Soul/Motown</a></li>
              </ul>
			  </div>
        <div class="nav-col-2"><a href="http://www.covervidz.com" class="pull-left"><img class="logo-writing" src="../images/covervidz-type.png"/></a></div>
		
		
		<div class="input-group nav-col-3" action="searchpage.php" method="get" >
		  <div id="my-input" style="float:left;">
		   <input class="input" id="filterInput" type="text" name="search" placeholder="search">
		  </div>
		  <div style="float:left;display:inline-block;width:10%;margin-top:2px">
		   <button id="search-button" style="float:right;display:inline-block" class="btn btn-success search-button"  type='submit'>
           <i class='fa fa-search'></i>
           </button>
          </div>
        <a href="http://www.covervidz.com"><img id="logo-button" src="../images/covervidz-logo-shadow.png"></a>
		  
        </div>
   
      </form>
	  
</div>
<div class="container results">

<div style="margin-top:60px" class="row">
<div class="col-md-8">
<div id="player"></div>


    
<div id="dom-target" style="display:none" >
<?php



	
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
          height: '440',
          width: '740',
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

var disqus_config = function () {
//this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = myData; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

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
 echo '<a href="../video.php/?v='.$d->URL.'"><li class="related"><div class="row"><div class="col-md-5 col-xs-12"><img class="myThumb" src="..&#47;'.$d->thumbnail.'"/></div><div class="col-md-7 col-xs-12"><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</div></div></li></a>';
}
echo '</ul>';
?>
</div>
</div>
</div>

<div class="jumbotron lander">
<div class="container">

<!--<img style="height:350px" src="images/covervidz-type.png" alt="covervidz logo">-->
<br>
<br>
<br>
<br>
<br>
<a href="aboutPage.html">About Covervidz</a>
<a style="margin-left:20px" href="uploadPage.html">Contact us</a>
<a style="margin-left:20px" href="">Sitemap</a>
<a style="margin-left:20px" href="https://www.facebook.com/covervidz" ><i class="fa fa-facebook"></i></a>

</div>




</div>

<script src="../js/scripts.js"></script>	
</body>