<?php
	 session_start();
	$conn = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
	$db = mysql_select_db("blogdb", $conn); // Selecting Database from Server
	if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }else{

					if( isset($_POST['blogid']) && isset($_POST['add']) ){
						$blogid = $_POST['blogid'];
						$add = $_POST['add'];

						if($add ){
							$query = mysql_query("update blog_master set blog_is_active = true where blog_id = $blogid ") or die(mysql_error());
						}else{
						$query = mysql_query("delete from blog_master where blog_id = $blogid ") or die(mysql_error());
						}

					}
					else if(isset($_POST['username'])){

						$username = $_POST['username'];
						$limit = $_POST['limit'];
						$offset = $_POST['offset'];

						$query = mysql_query("select * from blog_master where blog_is_active = false order by creation_date desc limit $limit offset $offset") or 
						die(mysql_error());
						$emparray = array();
					    while($row =mysql_fetch_assoc($query))
					    {
					        $emparray[] = $row;
					    }
					    echo json_encode($emparray);
					}
 
					//$array = mysql_fetch_row($query);
					
		mysql_close($conn);
		
	}
?>