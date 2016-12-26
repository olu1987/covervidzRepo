<?php $con = mysqli_connect("mysql.hostinger.co.uk","u368238327_user2","nBJ4BkUwsq","u368238327_vidz2");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
$sql = 'SELECT *
      FROM covers, songs, artists,genre
      WHERE songid = songs.id
      AND artist_id = a_id
	  AND genre_id = g_id';

$result = $con->query($sql);


   $data = array();
  while($row = $result->fetch_assoc()) {
        $data[] = $row;
		
		}
	 $json = json_encode( $data,JSON_NUMERIC_CHECK );

     echo $json;
  

?>