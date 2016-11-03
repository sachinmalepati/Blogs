<?php
	session_start();
	$conn = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
	$db = mysql_select_db("blogdb", $conn); // Selecting Database from Server
	if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }else{
						
						
						$limit = $_POST['limit'];
						$offset = $_POST['offset'];

						$query = mysql_query("select * from contact_admin order by creation_date desc limit $limit offset $offset") or 
						die(mysql_error());
						$emparray = array();
					    while($row =mysql_fetch_assoc($query))
					    {
					        $emparray[] = $row;
					    }
					    echo json_encode($emparray);
			
					
		mysql_close($conn);
		
	}
?>
