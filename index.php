
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
 	session_start();
?>


<!DOCTYPE HTML>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<title>Problog Website</title>
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
				  <div align="right">
				  	<?php if(!isset($_SESSION['login_user'])){ ?>
				  		<button type="button" class="btn btn-default btn-lg" id="login">Login</button>
				  		<button type="button" class="btn btn-default btn-lg" id="signup">SignUp</button>
				  	<?php } ?>
				  		<?php if(isset($_SESSION['login_user'])){ ?>
				  			<button type="button" class="btn btn-default btn-lg" id="logout" >LogOut</button>
				  		<?php } ?>
				  		
				  		
				  </div>

				<div class="modal fade" id="myModal" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header" style="padding:35px 50px;">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
				        </div>
				        <div class="modal-body" style="padding:40px 50px;">
				          <form role="form" method="POST"  >
				            <div class="form-group">
				              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
				              <input type="text" class="form-control" id="username1" placeholder="Enter email">
				            </div>
				            <div class="form-group">
				              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
				              <input type="password" class="form-control" id="psw1" placeholder="Enter password">
				            </div>
				              <button  name ="login" id="loginform" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
				              <p id="msg1" style="color:red;" align="center" ></p>
				          </form>
				        </div>
				      </div>
				      
				    </div>
				  </div>

				 <div class="modal fade" id="myModal1" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header" style="padding:35px 50px;">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4><span class="glyphicon glyphicon-lock"></span> SignUp</h4>
				        </div>
				        <div class="modal-body" style="padding:40px 50px;">
				          <form role="form" name="sinupform" id="signupform" method="post" action="#">
				            <div class="form-group">
				              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
				              <input type="text" class="form-control" id="username2" name="username2" placeholder="Enter email">
				            </div>
				            <div class="form-group">
				              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
				              <input type="password" class="form-control" id="psw2" name="psw2" placeholder="Enter password"></br>
				              <input type="password" class="form-control" id="cnf_psw2" name="cnf_psw2" placeholder="Confirm password">
				            </div>
				              <button name="signup" type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off">
				           </span> SignUp</button>
				           <p id="msg2" style="color:red;" align="center" ></p>
				          </form>
				        </div>
				      </div>
				      
				    </div>
				  </div>

				<!-- End-Header-nav-->
			</div>
			</div>
			<div class="header-nav1">
				<div class="wrap">
					<ul>
						<li class="current"><a href="index.php">Home</a></li>
						<li><a href="yourblogs.php">Your Blogs</a></li>
						<li><a href="addblog.php">Write Blog</a></li>
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
			<div id="BlogsBody">

			
			<div class="clear"> </div>
		</div>
			<!-- End-content-gallery-->
			<!-- DC Pagination:C9 Start -->
		<div id="pager" class="panel-body">
                    <nav>
                        <ul class="pager">
                            <li id="previous" class="previous"><a href="#"><span aria-hidden="true">&larr;</span>Newer</a></li>
                            <li id="next" class="next"><a href="#">Older <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                    </nav>
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
		var username = <?php if(isset($_SESSION['login_user'])) echo json_encode($_SESSION['login_user']); else  echo json_encode(""); ?>;
			$(document).ready(function(){
				//$("#logout").hide();
				loadBlogs(10,0);

			    $("#login").click(function(){
			        $("#myModal").modal();
			    });
			    $("#signup").click(function(){
			        $("#myModal1").modal({'backdrop': 'static'});
			    });
			    $("#signupform").submit(function(e){

			    	e.preventDefault();
			    	var username=$('#username2').val();
    				var password=$('#psw2').val();
    				var cnf_password=$('#cnf_psw2').val();

    				if(username == ""){
    					$("#msg2").text("Enter Username!");
    				}else if (password != cnf_password) {
    					$("#msg2").text("Passwords doesnt match!");
    				}else{

			    	    $.ajax({
					        url : "signup.php",
					        type: "POST",
					        cache: false,
					        data: {name:username, pwd:password},
					        success: function(data)
					        {
					            //data - response from server
					            var result=trim(data);
					            $("#msg2").text(result);
					        },
					    });
					}
			    });

			    $("#loginform").click(function(e){

			    	e.preventDefault();
			    	var username=$('#username1').val();
    				var password=$('#psw1').val();

    				if(username == ""){
    					$("#msg1").text("Enter Username!");
    				}else{

			    	    $.ajax({
					        url : "login.php",
					        type: "POST",
					        cache: false,
					        data : {username:username, password:password},
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
			    });

			    

				$("#logout").click(function(e){

			    	e.preventDefault();
			    		$.ajax({
					        url : "logout.php",
					        success: function(data)
					        {
					            //data - response from server
					            /*alert(trim(data));*/
					            location.reload();
					        },

					    });

			    });
			});
	
			function trim(str){
					var str=str.replace(/^\s+|\s+$/,'');
					return str;
			}

			function addExtras(){
					$("#login").hide();
					$("#signup").hide();
					$("#logout").show();
					 $("#myModal").modal('toggle');
			}

		    function fillBlogs(blogs) {
		        $("#BlogsBody").empty();
		        $.each(JSON.parse(blogs), function(i, blog) {

		            var blogid = blog.blog_id;
		            var bloggerid = blog.blogger_id;
		            var blogtitle = blog.blog_title;
		            var blogdesc = blog.blog_desc;
		            if(blogdesc.length > 350) blogdesc = blogdesc.substring(0,350) + "...";
		            var blogcategory= blog.blog_category;
		            var blogauthor = blog.blog_auther;
		            var blog_isactive = blog.blog_is_active;
		            var creationdate= new Date(blog.creation_date);
		            var updateddate = new Date(blog.updated_date);
		            var images = blog.image;

		            if(username=="admin") {
		            	var del = '<li><button type="button" onclick="del('+blogid+')" class="btn btn-warning" >Delete</a></li> ';
		            }
		             else{
						var del = '';
					}

		                	var row='<div class="wrap">'+
											'<div class="bloger-grid">'+
												'<div class="blog-img">'+
													'<img src = "images/'+images+' " width="400px" height="200px" />'+
												'</div>'+
												'<div class="bloger-content">'+
													'<h5><a href="single.html">'+blogtitle+'</a></h5>'+
													'<p>'+blogdesc+'</p>'+
													'<ul>'+
														'<li>'+blogauthor+'</li>'+
														'<li>: '+creationdate.toLocaleString()+'</li></br></br></br></br>'+del+
														'<li><a href="single.php#'+blogid+'"><span>Readmore</span></a></li>'+
													'</ul>'+
												'</div>'+
											'</div>'+
									'</div>'+
									'<div class="clear"> </div>';
			
		            $("#BlogsBody").append(row);
		        });
		    };

			function loadBlogs(limit,offset){
						$.ajax({
					        url : "loadblogs.php",
					        type: "POST",
					        context: document.body,
					        data: {limit: limit, offset: offset},
					        success: function(data)
					        {		
					                $("#pager").hide();
					                $("#previous").hide();
					                $("#next").hide();
					                 //console.log(data);
					                fillBlogs(data);
					                var len = (JSON.parse(data)).length;
					                if (offset > 0) {
					                    $("#previous > a").unbind("click");
					                    $("#previous > a").click(function () {loadBlogs(limit, offset - limit);});
					                    $("#previous").show();
					                    $("#pager").show();
					                }
					                if (len == limit) {
					                    $("#next > a").unbind("click");
					                    $("#next > a").click(function () {loadBlogs(limit, offset + limit);});
					                    $("#next").show();
					                    $("#pager").show();
					                }
							},

					    });
			}

			function del(blogid){
				$.ajax({
					        url : "AddOrRemove.php",
					        type: "POST",
					        data: {blogid: blogid, add: 0},
					        success: function(data)
					        {
					                location.reload();
							},

					    });
			}

		</script>


	</body>
</html>

<?php 
	if(isset($_GET['modal']) && $_GET['modal'] == 1 ){ ?>
 	<script type='text/javascript'>

			
			$("#myModal").modal();
			
			</script>
<?php } ?>