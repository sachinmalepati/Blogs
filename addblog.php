<?php
	session_start();
	if(!isset($_SESSION['login_user'])){
		header('Location: index.php?modal=1');
	}
	if(isset($_POST['addblog'])){
		$title = $_POST['title'];
		$cat = $_POST['cat'];
		$desc = $_POST['desc'];
		$username = $_SESSION['login_user'];
		$bloggerid = $_SESSION['blogger_id'];
		
		$image = basename($_FILES['image']['name']);

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
						$query = mysql_query("insert into blog_master(blogger_id,blog_title,blog_desc,blog_category,blog_auther,image) values($bloggerid,'$title','$desc','$cat','$username','$image') ") or die(mysql_error());

						if ($query) {
							?>
								<div class="alert alert-info" role="alert">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Success!</strong> Blog Updated..!!.
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
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<title>Problog Website </title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
				  </div>

				<!-- End-Header-nav-->
			</div>
			</div>
			<div class="header-nav1">
				<div class="wrap">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="yourblogs.php">Your Blogs</a></li>
						<li class="current"><a href="#">Write Blog</a></li>
						<li><a href="contact.php">Contact</a></li>
						<?php if(isset($_SESSION['login_user']) &&  $_SESSION['login_user'] == 'admin'){ ?>
				  			<li><a href="reviewBlogs.php">Review Blogs</a></li>
				  			<li><a href="users.php">Users</a></li>
				  			<li><a href="messages.php">Messages</li>
				  		<?php } ?>
					</ul>

				</div>
				
			<!-- End-Header-->
			<div class="clear"> </div>
			<!-- content-gallery-->
			</div>

							<form role="form" method="post" action="#" id="addblog"  enctype="multipart/form-data">
				            <div class="form-group">
				              <label > Title</label>
				              <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
				            </div>
				            <div class="form-group">
				              <label >Category</label>
				              <input type="text" class="form-control" id="cat" name="cat" placeholder="Enter Category"></br>
				            </div>
				            <div class="form-group">
							  <label >Description</label>
							  <textarea class="form-control" rows="5" id="desc" name="desc"></textarea>
							</div>
							<label>File: </label><input type="file" name="image" /></br></br>

							<?php if($_SESSION['blogger_is_active']){  ?>
				              <button type="submit" class="btn btn-success btn-block" name="addblog" >Submit</button>
				            <?php } else { ?>
				            	<p id="msg1" style="color:red;" align="center" >You dont have permissions to write a blog.Please contact admin !</p>
				            <?php } ?>  
				              <p id="msg1" style="color:red;" align="center" ></p>
				          </form></br></br>
			<div class="clear"> </div>
			<!-- End-content-gallery-->
			<!-- DC Pagination:C9 Start -->


		<div class="footer">
			<div class="wrap">
				<h3>SAY HELLO</h3>
				<p>Lorem ipsum dolor sit amet, consect etur adipiscing elit. Vestibulum ut tortor urnati dunt

						dolor. Nunc vulputate ultrices con sect etur donec semper lacinia ultri dolore cie

						lorem ipsum commete.</p>
			
			
			</div>
		</div>
		<!-- End-wrap -->

		<script>
			var username = <?php echo json_encode($_SESSION['login_user']); ?>;
			$(document).ready(function(){
/*				$("#addblog").click(function(e){

			    	e.preventDefault();
			    	var title=$('#title').val();
    				var cat=$('#cat').val();
    				var desc = $('#desc').val();

    				if(desc == "" || title == ""){
    					$("#msg1").text("Enter Details!");
    				}else{

			    	    $.ajax({
					        url : "addblog.php",
					        type: "POST",
					        cache: false,
					        data : {title: title, cat: cat, desc: desc},
					        success: function(data)
					        {
					            //data - response from server
					            var result=trim(data);
					            $("#msg1").text(result);

					            if(result == "login successful"){
					            	$("#myModal").modal('toggle');
					            	window.location="index.php";
					        	}

					        },

					    });
					}
			    });*/

			});



		</script>


	</body>
</html>
