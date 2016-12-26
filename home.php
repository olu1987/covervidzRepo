<?php 
if (isset($_GET["search"])) {
header("Location: http://localhost/covervidzRepo/searchpage.php?search=".$_GET["search"]);
}
   ?>
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
<meta name="description" content="The best covers from youtube all in one place.">
<link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/styles-responsive.css" />
<script src="js/scripts.js"></script>	

<style>
 img.myThumb{
	height:180px;
		
}
</style>
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
                <li><a  href="http://localhost/covervidzRepo/searchpage.php?search= ">All Videos</a></li>
                <li><a  href="#">Most recent</a></li>
                <li><a  href="#">Most viewed</a></li>
                <li role="separator" class="divider"></li>
		        <li class="dropdown-header">Genres</li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=pop">Pop</a></li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=R%26B">R&B </a></li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=rap/hip-hop">Rap/Hip-hop</a></li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=rock">Rock</a></li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=dance">Dance</a></li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=choreography">Choreography</a></li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=Gospel/Christian">Gospel/Christian</a></li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=reggae">Reggae</a></li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=instrument/instrumental">Instrumental/Instrument</a></li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=metal">Metal</a></li>
		        <li><a  href="http://localhost/covervidzRepo/genre.php?genre=soul/motown">Soul/Motown</a></li>
              </ul>
			  </div>
        <div class="nav-col-2"><a href="http://localhost/covervidzRepo/home.php" class="pull-left"><img class="logo-writing" src="images/covervidz-type.png"/></a></div>
		
		
		<div class="input-group nav-col-3" action="searchpage.php" method="get" >
		  <div id="my-input" style="float:left;">
		   <input class="input" id="filterInput" type="text" name="search" placeholder="search">
		  </div>
		  <div style="float:left;display:inline-block;width:10%;margin-top:2px">
		   <button id="search-button" style="float:right;display:inline-block" class="btn btn-success search-button"  type='submit'>
           <i class='fa fa-search'></i>
           </button>
          </div>
        <a href="http://localhost/covervidzRepo/home.php"><img id="logo-button" src="images/covervidz-logo-shadow.png">
		  
        </div>
   
      </form>
	  
</div>
<div class="jumbotron lander text-center">


<!--<img style="height:350px" src="images/covervidz-type.png" alt="covervidz logo">-->
<br>
<br>
<br>
<br>
<br>
<h1 class="small-text">The best covers from youtube all in one place</h1>






</div>
<div class="container text-center results">

<div style="margin-top:-10px" class="row">
<div class="col-md-12">

<div>
<a href="http://localhost/covervidzRepo/genre.php?genre=R%26B"><h3>New Videos</h3></a>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("mysql.hostinger.co.uk","u368238327_vidz","","u368238327_vidz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
	 
	 
$sql2 = "SELECT *
      FROM covers, songs, artists,genre
      WHERE songid = song_id
      AND artist_id = a_id
	  AND genre_id = g_id
	  ORDER BY -datePosted LIMIT 6
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
if($result2->num_rows > 0){
echo '<ul class="thumb-box" >';
foreach($data2 as $d){
 echo '<a href="video.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="http://img.youtube.com/vi/'.$d->URL .'/0.jpg"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
?>
</div>
    
<div>
<a href="http://localhost/covervidzRepo/genre.php?genre=R%26B"><h3>R&B Videos</h3></a>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("mysql.hostinger.co.uk","u368238327_vidz","","u368238327_vidz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
	 
	 
$sql2 = "SELECT *
      FROM covers, songs, artists,genre
      WHERE genreName = 'r&b'
      AND songid = song_id
      AND artist_id = a_id
	  AND genre_id = g_id
	  ORDER BY RAND() LIMIT 6
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
if($result2->num_rows > 0){
echo '<ul class="thumb-box" >';
foreach($data2 as $d){
 echo '<a href="video.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="http://img.youtube.com/vi/'.$d->URL .'/0.jpg"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
?>
</div>
<a href="http://localhost/covervidzRepo/genre.php?genre=pop"><h3>Pop Videos</h3></p>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("mysql.hostinger.co.uk","u368238327_vidz","","u368238327_vidz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
	 
	 
$sql2 = "SELECT *
      FROM covers, songs, artists,genre
      WHERE genreName = 'pop'
      AND songid = song_id
      AND artist_id = a_id
	  AND genre_id = g_id
	  ORDER BY RAND() LIMIT 6
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
if($result2->num_rows > 0){
echo '<ul class="thumb-box" >';
foreach($data2 as $d){
 echo '<a href="video.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="http://img.youtube.com/vi/'.$d->URL .'/0.jpg"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
?>
<a href="http://localhost/covervidzRepo/genre.php?genre=choreography"><h3>Choreography</h3></a>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("mysql.hostinger.co.uk","u368238327_vidz","","u368238327_vidz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
	 
	 
$sql2 = "SELECT *
      FROM covers, songs, artists,genre
      WHERE genreName = 'choreography'
      AND songid = song_id
      AND artist_id = a_id
	  AND genre_id = g_id
	  ORDER BY RAND() LIMIT 6
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
if($result2->num_rows > 0){
echo '<ul class="thumb-box" >';
foreach($data2 as $d){
 echo '<a href="video.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="http://img.youtube.com/vi/'.$d->URL .'/0.jpg"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
?>
<a href="http://localhost/covervidzRepo/genre.php?genre=gospel/christian"><h3>Gospel/Christian Videos</h3></a>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("mysql.hostinger.co.uk","u368238327_vidz","","u368238327_vidz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
	 
	 
$sql2 = "SELECT *
      FROM covers, songs, artists,genre
      WHERE genreName = 'Gospel/Christian'
      AND songid = song_id
      AND artist_id = a_id
	  AND genre_id = g_id
	  ORDER BY RAND() LIMIT 6
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
if($result2->num_rows > 0){
echo '<ul class="thumb-box" >';
foreach($data2 as $d){
 echo '<a href="video.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="http://img.youtube.com/vi/'.$d->URL .'/0.jpg"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
?>
<a href="http://localhost/covervidzRepo/genre.php?genre=rap/hip-hop"><h3>Rap Videos</h3>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("mysql.hostinger.co.uk","u368238327_vidz","","u368238327_vidz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
	 
	 
$sql2 = "SELECT *
      FROM covers, songs, artists,genre
      WHERE genreName = 'rap/hip-hop'
      AND songid = song_id
      AND artist_id = a_id
	  AND genre_id = g_id
	  ORDER BY RAND() LIMIT 6
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
if($result2->num_rows > 0){
echo '<ul class="thumb-box" >';
foreach($data2 as $d){
 echo '<a href="video.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="http://img.youtube.com/vi/'.$d->URL .'/0.jpg"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
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
</body>