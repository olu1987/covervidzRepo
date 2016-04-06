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
<link rel="stylesheet" type="text/css" href="style.css" />
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
             <li><form class="navbar-form navbar-left" role="search">
        <div class="form-group" >
		<div class="input-group" method="get" >
		   <input id="filterInput" style="width:550px;line-height:30px;padding-left:10px" type="text" name="search" placeholder="search"><input type="submit" value=" " style="line-height:30px;width:50px"><i style="margin-left:-22px" class="glyphicon glyphicon-search"></i>

		  </div>
        </div>
   
      </form></li>
	         <li id="but1"><a href="aboutPage.html">About Covervidz</a></li>
	         <li id="but2"><a href="uploadPage.html">Upload</a></li>
			 
			 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
              <ul class="dropdown-menu">
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

<div style="margin-top:60px" class="row">
<div class="col-md-12">

<?php $search = array("","","","","","","","","","","",); 
$searchitems = explode(" ", $_GET["search"]); 
if (isset($searchitems[0])) {
	array_unshift($search, $searchitems[0]);
}
if (isset($searchitems[1])) {
	array_unshift($search, $searchitems[0]);
}
if (isset($searchitems[2])) {
	array_unshift($search, $searchitems[0]);
}
if (isset($searchitems[3])) {
	array_unshift($search, $searchitems[0]);
}
if (isset($searchitems[4])) {
	array_unshift($search, $searchitems[0]);
}
if (isset($searchitems[5])) {
	array_unshift($search, $searchitems[0]);
}
      echo $search[0];  ?>
    
<div id="dom-target">
<?php

//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("localhost","root","","CoverChart2");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
	 
	 
$sql2 = "SELECT * FROM covers, genre, songs, artists 
        WHERE (artist LIKE '%".$search[0]."%' AND artist LIKE '%".$search[1]."%'AND artist LIKE '%".$search[2]."%'AND artist LIKE '%".$search[3]."%'
		OR coverArtist LIKE '%".$search[0]."%' AND coverArtist LIKE '%".$search[1]."%'AND coverArtist LIKE '%".$search[2]."%'AND coverArtist LIKE '%".$search[3]."%' )
        AND genre_id = g_id AND songid = song_id 
		AND Artist_id = a_id		
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

echo '<ul >';
foreach($data2 as $d){
 echo '<a href="index2.php/?v='.$d->URL.'"><li class="related" style="width:300px"class="related"><img class="myThumb" src="'.$d->thumbnail.'"/><br><b>'.$d->name.'</b> - '.$d->artist.'<br><em>'.$d->coverArtist.'</em><br>'.number_format($d->youtubeViews).'</li></a>';
}
echo '</ul>';	
?>
</div>
<script>
	  var div = document.getElementById("dom-target");
    var myData = div.textContent;
      
    </script>


<?php



?>

</body>