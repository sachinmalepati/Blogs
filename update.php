 <?php
 	session_start();
		$title = $_POST['title'];
		$cat = $_POST['cat'];
		$desc = $_POST['desc'];
		$id = $_POST['id'];
		$username = $_SESSION['login_user'];
		$bloggerid = $_SESSION['blogger_id'];
		

		//echo "$imagedata";
		if($title == "" || $cat == "" || $desc=="")
		{
			echo "Enter all the fields!";
		}else{
				$conn = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
				$db = mysql_select_db("blogdb", $conn); // Selecting Database from Server
				if(! $conn ) {
			      die('Could not connect: ' . mysql_error());
			   }else{
						$query = mysql_query("update blog_master set blog_title='$title', blog_desc='$desc', blog_category='$cat' where blog_id=$id ") or die(mysql_error());

						if ($query) {
							echo "success";
						}
						else {
							echo mysql_error();
						}
					mysql_close($conn);
				}
		}
?>