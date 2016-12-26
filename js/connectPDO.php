<?php

		
$con = mysqli_connect("mysql.hostinger.co.uk","u368238327_vidz","","u368238327_vidz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 
$sql = "SELECT *
      FROM covers, songs, artists,genre
      WHERE songid = songs.id
      AND artist = a_id
	  AND genre_id = g_id";

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
		
	 $json = json_encode( $data,JSON_NUMERIC_CHECK );

     echo $json;
  


?>