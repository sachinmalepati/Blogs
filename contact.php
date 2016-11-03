<?php
session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$sub = $_POST['sub'];
		

		//echo "$imagedata";
		if($name == "" || $email == "" || $sub=="")
		{
			echo "Enter all the fields!";
		}else{
				$conn = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
				$db = mysql_select_db("blogdb", $conn); // Selecting Database from Server
				if(! $conn ) {
			      die('Could not connect: ' . mysql_error());
			   }else{
						$query = mysql_query("insert into contact_admin(name,email,sub) values('$name','$email','$sub') ") or die(mysql_error());

						if ($query) {
							?>
								<div class="alert alert-info" role="alert">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Success!</strong> Message Sent..!!.
								</div>
							<?php
						}
						else {
							echo mysql_error();
						}
					mysql_close($conn);
				}
		}
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<title>Problog Website Template | contact :: W3layouts</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<!-- Start-wrap -->
		
			<!-- Start-Header-->
			
			<div class="header">
				<div class="wrap">
				<!-- Start-logo-->
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" title="logo" /></a>
				</div>
				
				<!-- End-Logo-->
				<!-- Start-Header-nav-->
				
				<div class="clear"> </div>
				
				<!-- End-Header-nav-->
			</div>
			</div>
			<div class="header-nav1">
				<div class="wrap">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li ><a href="#">Your Blogs</a></li>
						<li><a href="addblog.php">Write Blog</a></li>
						<li class="current"><a href="contact.php">Contact</a></li>
						<?php if(isset($_SESSION['login_user']) &&  $_SESSION['login_user'] == 'admin'){ ?>
							<li ><a href="reviewBlogs.php">Review Blogs</a></li>
				  			<li><a href="users.php">Users</a></li>
				  			<li><a href="messages.php">Messages</li>
				  		<?php } ?>
					</ul>

				</div>
				
			<!-- End-Header-->
			<div class="clear"> </div>
			<!-- content-gallery-->
			</div>
			<div class="wrap">
				<div style="border:none;" class="about">
					<div class="contact-form">
						<h4>Contact</h4>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<div>
								<span><label>Name</label></span>
						 		<span><input type="text" id="name" name="name" /></span>
							</div>
							<div>
								<span><label>Email</label></span>
								<span><input type="text" id="email" name="email" /></span>
							</div>
							<div>
								<span><label>Subject</label></span>
								 <span><textarea id="sub" name="sub">  </textarea></span>
							 </div>
							<div>
							<span><input type="submit"  name="submit" value="Submit"></span>
							</div>
			            </form>
						
					</div>
				</div>
			</div>
			
<div class="clear"> </div>
			<!-- End-content-gallery-->
			<!-- DC Pagination:C9 Start -->
			<div class="wrap">
	
		</div><br><br>
	<div class="clear"> </div>
		<div class="footer">
				<div class="wrap">
				<h3>SAY HELLO</h3>
				<p>Lorem ipsum dolor sit amet, consect etur adipiscing elit. Vestibulum ut tortor urnati dunt

						dolor. Nunc vulputate ultrices con sect etur donec semper lacinia ultri dolore cie

						lorem ipsum commete.</p>
			
			</div>
			</div>
		<!-- End-wrap -->
		
	</body>
</html>

