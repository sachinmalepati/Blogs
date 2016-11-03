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
			</div>
			<div class="header-nav1">
				<div class="wrap">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#">Your Blogs</a></li>
						<li><a href="addblog.php">Write Blog</a></li>
						<li><a href="contact.php">Contact</a></li>
						<?php if(isset($_SESSION['login_user']) &&  $_SESSION['login_user'] == 'admin'){ ?>
				  			<li><a href="reviewBlogs.php">Review Blogs</a></li>
				  			<li><a href="users.php">Users</a></li>
				  			<li class="current"><a href="messages.php">Messages</li>
				  		<?php } ?>
					</ul>

				</div>
				
			<!-- End-Header-->
			<div class="clear"> </div>
			<!-- content-gallery-->
			</div>
			<div id="MsgsBody">
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
			var username = <?php echo json_encode($_SESSION['login_user']); ?>;
			$(document).ready(function(){
				//$("#logout").hide();
				
				//alert(username);
				loadMsgs(10,0);


			});
	
			function trim(str){
					var str=str.replace(/^\s+|\s+$/,'');
					return str;
			}

		    function fillMsgs(msgs) {
		        $("#MsgsBody").empty();
		        $.each(JSON.parse(msgs), function(i, msg) {

		            var name = msg.name;
		            var email = msg.email;
		            var sub = msg.sub;

		                	var row='<div class="well">'+
													'<h>Name: '+name+'</a></h>'+
													'<p>Email: '+email+'</p>'+
													'<p>Sub: '+sub+'</p>'+
									'</div>'+
									'<div class="clear"> </div>';
			
		            $("#MsgsBody").append(row);
		        });
		    };

			function loadMsgs(limit,offset){
						$.ajax({
					        url : "getmsgs.php",
					        type: "POST",
					        context: document.body,
					        data: {limit: limit, offset: offset},
					        success: function(data)
					        {
					        	data=trim(data);
					                $("#pager").hide();
					                $("#previous").hide();
					                $("#next").hide();
					                fillMsgs(data);
					                var len = (JSON.parse(data)).length;
					                if (offset > 0) {
					                    $("#previous > a").unbind("click");
					                    $("#previous > a").click(function () {loadMsgs(limit, offset - limit);});
					                    $("#previous").show();
					                    $("#pager").show();
					                }
					                if (len == limit) {
					                    $("#next > a").unbind("click");
					                    $("#next > a").click(function () {loadMsgs(limit, offset + limit);});
					                    $("#next").show();
					                    $("#pager").show();
					                }
							},

					    });
			}



		</script>


	</body>
</html>