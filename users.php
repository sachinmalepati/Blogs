<?php
	session_start();
	if(!isset($_SESSION['login_user']) &&  $_SESSION['login_user'] != 'admin' ){
		header('Location: index.php?modal=1');
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
			<div class="header-nav1">
				<div class="wrap">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li ><a href="#">Your Blogs</a></li>
						<li><a href="addblog.php">Write Blog</a></li>
						<li><a href="contact.php">Contact</a></li>
						<?php if(isset($_SESSION['login_user']) &&  $_SESSION['login_user'] == 'admin'){ ?>
							<li ><a href="reviewBlogs.php">Review Blogs</a></li>
				  			<li class="current"><a href="users.php">Users</a></li>
				  			<li><a href="messages.php">Messages</li>
				  		<?php } ?>
					</ul>

				</div>
				<div class="clear"> </div>
			</div>
				
			<!-- End-Header-->
			
			<!-- content-gallery-->
			
			<!-- End-content-gallery-->
			<!-- DC Pagination:C9 Start -->
			
		    <br/>
		    <div class="container">
		    <div class="row">
	        	<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading"><h3 class="panel-title">Users</h3></div>
						<div class="panel-body">
						<div class="row table-responsive table-condensed">
			                        <table id="usersTable" class="table table-bordered">
			                            <thead>
			                            <tr>
			                                <th>User</th>
			                                <th>Created On</th>
			                                <th>Action</th>
			                            </tr>
			                            </thead>
			                            <tbody id="UsersBody">
			                            </tbody>
			                        </table>
			            </div>
			        </div>
						<div id="pager" class="panel-body">
				                    <nav>
				                        <ul class="pager">
				                            <li id="previous" class="previous"><a href="#"><span aria-hidden="true">&larr;</span>Newer</a></li>
				                            <li id="next" class="next"><a href="#">Older <span aria-hidden="true">&rarr;</span></a></li>
				                        </ul>
				                    </nav>
				        </div>
					</div>
				</div>
			</div>
		</div>
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
				//$("#logout").hide();
				
				//alert(username);
				loadUsers(10,0);


			});
	
			function trim(str){
					var str=str.replace(/^\s+|\s+$/,'');
					return str;
			}

			function toggle(userid){
				$.ajax({
					        url : "getUsers.php",
					        type: "POST",
					        data: {userid: userid},
					        success: function(data)
					        {
					                location.reload();
							},

				});
			}

		    function fillUsers(users) {
		        $("#UsersBody").empty();
		        $.each(JSON.parse(users), function(i, user) {

		        	var userid = user.blogger_id;
		            var username = user.blogger_username;
		            var created = user.blogger_creationdate;
		            var active = user.blogger_isactive;

		            var rowclass;
	                var actionBtn;
	                if (active == "0") {
	                    rowclass = "danger";
	                    actionBtn = '<button type="button" onclick="toggle(\'' + userid + '\')" class="btn ">Enable</a> ';
	                } else {
	                    rowclass = "success";
	                    actionBtn = '<button type="button" onclick="toggle(\'' + userid + '\')" class="btn btn-warning">Disable</a> ';
	                }
	                var row = '<tr class="' + rowclass + '">' +
	                	'<td>' + username + '</td>' +
	                    '<td>' + created.toLocaleString() + '</td>' +
	                    '<td>' + actionBtn + '</td>' +
	                    '</tr>';
			
		            $("#UsersBody").append(row);
		        });
		    };

			function loadUsers(limit,offset){
						$.ajax({
					        url : "getUsers.php",
					        type: "POST",
					        data: {limit: limit, offset: offset},
					        success: function(users)
					        {
					                $("#pager").hide();
					                $("#previous").hide();
					                $("#next").hide();
					                fillUsers(users);
					                var len = (JSON.parse(data)).length;
					                if (offset > 0) {
					                    $("#previous > a").unbind("click");
					                    $("#previous > a").click(function () {loadUsers(limit, offset - limit);});
					                    $("#previous").show();
					                    $("#pager").show();
					                }
					                if (len == limit) {
					                    $("#next > a").unbind("click");
					                    $("#next > a").click(function () {loadUsers(limit, offset + limit);});
					                    $("#next").show();
					                    $("#pager").show();
					                }
							},

					    });
			}



		</script>


	</body>
</html>