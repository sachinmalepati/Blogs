<?php
	 session_start();
	$conn = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
	$db = mysql_select_db("blogdb", $conn); // Selecting Database from Server
	if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }else{
				$limit = $_POST['limit'];
				$offset = $_POST['offset'];

					if(isset($_POST['username'])){
						$username = $_POST['username'];
						$query = mysql_query("select * from blog_master where blog_auther = '$username' order by creation_date desc limit $limit offset $offset") or 
						die(mysql_error());
					}else{
					$query = mysql_query("select * from blog_master where blog_is_active = true order by creation_date desc limit $limit offset $offset") or die(mysql_error());
					
						
					
				}
 ;
					//$array = mysql_fetch_row($query);
					    $emparray = array();
					    while($row =mysql_fetch_assoc($query))
					    {
					        $emparray[] = $row;
					    }
		mysql_close($conn);
		echo json_encode($emparray);
	}
?>