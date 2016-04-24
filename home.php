
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
<link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/styles-responsive.css" />
<style>
 img.myThumb{
	height:164px;
		
}
</style>
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
	   <a href="http://localhost/covervidzRepo/home.php" class="pull-left"><img style="height:60px"src="images/covervidz-type.png"></a>
	  
    </div>
	   <div id="myNavbar" >
        <ul class="nav navbar-nav">
             <li><form class="navbar-form navbar-left" role="search">
        <div class="form-group" >
		<div class="input-group" action="searchpage.php" method="get" >
		   <input id="filterInput" style="width:550px;line-height:30px;padding-left:10px" type="text" name="search" placeholder="search"><button class="btn btn-success search-button"  type='submit'>
  <i class='fa fa-search'></i>
</button>


		  </div>
        </div>
   
      </form></li>
	         
			 
			 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></span></a>
              <ul class="dropdown-menu">
			  <li id="but1"><a href="aboutPage.html">About Covervidz</a></li>
	         <li id="but2"><a href="uploadPage.html">Upload</a></li>
                <li><a  href="#">All Videos</a></li>
                <li><a  href="#">Most recent</a></li>
                <li><a  href="#">Most viewed</a></li>
                <li role="separator" class="divider"></li>
		        <li class="dropdown-header">Genres</li>
		        <li><a  href="#">Pop</a></li>
		        <li><a  href="#">R&B </a></li>
		        <li><a  href="#">Rap/Hip-hop</a></li>
		        <li><a  href="#">Rock</a></li>
		        <li><a  href="#">Dance</a></li>
		        <li><a  href="#">Choreography</a></li>
		        <li><a  href="#">Gospel/Christian</a></li>
		        <li><a  href="#">Reggae</a></li>
		        <li><a  href="#">Instrumental/Instrument</a></li>
		        <li><a  href="#">Metal</a></li>
		        <li><a  href="#">Soul/Motown</a></li>
              </ul>
			  </li>
	         
	         
	     </ul>
		 
		<ul class="nav navbar-nav navbar-right">
		      <li><a href="https://www.facebook.com/covervidz" ><i class="fa fa-facebook"></i></a></li>
	          
			  
		    
		    
		</ul>
		</div>
	


    </div>
</nav>

<div class="container">
<div class="jumbotron">
<div class="row">
<div class="col-md-6">
<img style="height:250px"src="images/covervidz-type.png">
</div>
<div class="col-md-6">
<h2>The best covers from YouTube, all in one place</h2>
</div>

</div>


</div>
<div style="margin-top:60px" class="row">
<div class="col-md-12">

<?php 
if (isset($_GET["search"])) {
header("Location: http://localhost/covervidzRepo/searchpage.php?search=".$_GET["search"]);
}
   ?>
    
<div>
<a href="http://localhost/covervidzRepo/genre.php?search=R%26B"><h3>R&B Videos</h3></a>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("localhost","root","","CoverChart2");
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
echo '<ul >';
foreach($data2 as $d){
 echo '<a href="index2.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="'.$d->thumbnail.'"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
?>
</div>
<a href="http://localhost/covervidzRepo/genre.php?search=pop"><h3>Pop Videos</h3></p>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("localhost","root","","CoverChart2");
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
echo '<ul >';
foreach($data2 as $d){
 echo '<a href="index2.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="'.$d->thumbnail.'"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
?>
<a href="http://localhost/covervidzRepo/genre.php?search=choreography"><h3>Choreography</h3></a>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("localhost","root","","CoverChart2");
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
echo '<ul >';
foreach($data2 as $d){
 echo '<a href="index2.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="'.$d->thumbnail.'"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
?>
<a href="http://localhost/covervidzRepo/genre.php?search=gospel/christian"><h3>Gospel/Christian Videos</h3></a>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("localhost","root","","CoverChart2");
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
echo '<ul >';
foreach($data2 as $d){
 echo '<a href="index2.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="'.$d->thumbnail.'"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
?>
<a href="http://localhost/covervidzRepo/genre.php?search=rap/hip-hop"><h3>Rap Videos</h3>
<?php



//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("localhost","root","","CoverChart2");
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
echo '<ul >';
foreach($data2 as $d){
 echo '<a href="index2.php/?v='.$d->URL.'"><li class="related" style="width:300px;"class="related"><img class="myThumb" src="'.$d->thumbnail.'"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
}
   else{
	   echo "0 results";
   }
?>





</body>