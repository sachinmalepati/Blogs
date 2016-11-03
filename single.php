
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
				
				<!-- End-Header-nav-->
			</div>
			</div>
			<div class="header-nav1">
				<div class="wrap">
					<ul>
						<li ><a href="index.php">Home</a></li>
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

			<div id="singleBlog">
			</div>
			
<div class="clear"> </div>
			<!-- End-content-gallery-->
			<!-- DC Pagination:C9 Start -->
			<div class="wrap">
	
	    		<div class="clear"> </div>

	    		<div id="update">

	    			<form   id="updateblog"  enctype="multipart/form-data">
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
				              <button id="submit" class="btn btn-success btn-block" name="updateblog" >Submit</button>
				             
				              <p id="msg1" style="color:red;" align="center" ></p>
				          </form></br></br>
	    		</div>
	
	<!-- DC Pagination:C9 End -->

		</div>
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
		<script type="text/javascript">
			var blogid = window.location.hash.substring(1);
			var username = <?php echo json_encode($_SESSION['login_user']); ?>;
			var blogtitle;
			var blogdesc;
			var blogcategory;
			$(document).ready(function(){
				$("#update").hide();
				$.ajax({
			        url : "singleBlog.php",
			        type: "POST",
			        data : {blogid:blogid},
			        success: function(blogs)
			        {
			        $.each(JSON.parse(blogs), function(i, blog) {

			        var blogid = blog.blog_id;
		            var bloggerid = blog.blogger_id;
		             blogtitle = blog.blog_title;
		             blogdesc = blog.blog_desc;
		             blogcategory= blog.blog_category;
		            var blogauthor = blog.blog_auther;
		            var blog_isactive = blog.blog_is_active;
		            var creationdate= new Date(blog.creation_date);
		            var updateddate = new Date(blog.updated_date);
		            var image = blog.image;

		            if(username==blogauthor) {
		            	var update = '<li><button type="button" onclick="update()">Update</a></li> ';
		            	var del = '<li><button type="button" onclick="del()">Delete</a></li> ';
		            }
		             else{
						var update = '';
						var del = '';
					}


		                	var row='<div class="wrap">'+
											'<div class="about">'+
											'<div class="bloder-content">'+
											'<div class="blog-box1">'+
												'<div class="blog-box-image">'+
													'<img src="images/'+ image +'"  title="preview" />'+
												'</div>'+
												'<div class="blog-box-content">'+
													'<h5><a href="#">'+blogtitle+'</a></h5>'+
													'<p>'+blogdesc+'</p>'+
													'<ul>'+
														'<li>'+blogauthor+'</li>'+
														'<li>: '+creationdate.toLocaleString()+'</li>'+
														'<li><a href="index.php">Back</a></li>'+
														update+del+
													'</ul>'+
												'</div>'+
												'</div>'+
											'</div>'+
											'</div>'+
									'</div>'+
									'<div class="clear"> </div>';

							$("#singleBlog").append(row);
						});
			        },

			    });
				
				
				$("#submit").click(function(e){

			    	
			    	var title=$('#title').val();
    				var cat=$('#cat').val();
    				var desc = $('#desc').val();

    				if(desc == "" || title == ""){
    					$("#msg1").text("Enter Details!");
    				}else{

			    	    $.ajax({
			    	    	url: "update.php",
					        type: "POST",
					        cache: false,
					        data : {title: title, cat: cat, desc: desc, id: blogid},
					        success: function(data)
					        {
					            var result=trim(data);
					            if(data==" success"){
					            	$("#msg1").text(result);
					            }


					        },

					    });
					}
			    });

				});

			function update(){
				$("#update").show();
				$("#title").val(blogtitle);
				$("#cat").val(blogcategory);
				$("#desc").val(blogdesc);
			}

			function del(){
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

			function trim(str){
					var str=str.replace(/^\s+|\s+$/,'');
					return str;
			}

		</script>
	</body>
</html>

