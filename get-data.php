<?php
if (isset($_GET["search"])) {
header("Location: http://localhost/covervidzRepo/searchpage.php?search=".$_GET["search"]);
}
// Start the session
session_start();

//echo 'Hello world ' . htmlspecialchars($_GET["v"]) . '!';
$con = mysqli_connect("mysql.hostinger.co.uk","u368238327_vidz","","u368238327_vidz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 $sql = "SELECT *
      FROM covers, genre, songs, artists
      WHERE genre_id = g_id
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
		OR coverArtist = '".$data[0]->coverArtist."'OR (genreName = '".$data[0]->genreName."' AND youtubeViews > 10000000))
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
	
	echo json_encode($data); 
?>