<?php
	 session_start();
	$conn = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
	$db = mysql_select_db("blogdb", $conn); // Selecting Database from Server
	if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

	
				 // Fetching variables of the form which travels in URL
				
					$username = $_POST['username'];
					$password = $_POST['password'];
				
				if($username!='' ||$password!='' ){
					//Insert Query of SQL
					$query = mysql_query("select * from blogger_info where blogger_username='$username' and blogger_password='$password'");
					
					$row = mysql_fetch_row($query);
					$_SESSION['blogger_id'] = $row[0];
					$_SESSION['blogger_is_active'] = $row[4];
					$count = mysql_num_rows($query) ;
					if($count == 1){
         				$_SESSION['login_user'] = $username;
						echo "login successful";
					}else{
						echo "username or password incorrect";
					}

				}
				

	mysql_close($conn);
?>