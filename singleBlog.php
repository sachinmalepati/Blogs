<?php
	 session_start();
	$conn = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
	$db = mysql_select_db("blogdb", $conn); // Selecting Database from Server
	if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }else{
				$blogid = $_POST['blogid'];

					$query = mysql_query("select * from blog_master where blog_id = '$blogid' ") or die(mysql_error());
 

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