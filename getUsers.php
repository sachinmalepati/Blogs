<?php
	 session_start();
	$conn = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
	$db = mysql_select_db("blogdb", $conn); // Selecting Database from Server
	if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }else{

					if( isset($_POST['userid'])  ){
						$userid = $_POST['userid'];

							$query = mysql_query("update blogger_info set blogger_isactive = !blogger_isactive where blogger_id = $userid ") or die(mysql_error());
						

					}
					else if(isset($_SESSION['login_user']) &&  $_SESSION['login_user'] == 'admin' ){

						
						$limit = $_POST['limit'];
						$offset = $_POST['offset'];

						$query = mysql_query("select * from blogger_info order by blogger_creationdate desc limit $limit offset $offset") or 
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