<?php
	 session_start();
	$conn = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
	$db = mysql_select_db("blogdb", $conn); // Selecting Database from Server
	if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

	
				 // Fetching variables of the form which travels in URL
				
					$username = $_POST['name'];
					$password = $_POST['pwd'];
				
				if($username!='' ||$password!='' ){
					//Insert Query of SQL
					$query = mysql_query("insert into blogger_info(blogger_username, blogger_password) values ('$username','$password')");
					if(!$query){
					echo "User already exists";
					}else{
						echo "User Created Successfully";
					}
				}
	mysql_close($conn);
?>