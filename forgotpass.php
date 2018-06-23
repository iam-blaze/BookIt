<?php
if(isset($_POST['forgot'])) {
	$id = $_POST['user'];
	$Ph_no = $_POST['ph_no'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	
	$con = mysqli_connect("localhost","root","","BookMe") or die (mysql_error());	
	$result = mysqli_query($con,"select * from user_table where id='$id' and Ph_no = '$Ph_no'") or die("unable to login please try again".mysql_error());
	$row = mysqli_fetch_array($result);
	

	if ($password==$password2)
	{	
		if( $row['id']==$id  && $row['Ph_no']==$Ph_no)
		{
			mysqli_query($con,"UPDATE `user_table` SET `password` = '$password' WHERE `user_table`.`id` = '$id'" );
			echo "<script type='text/javascript'>if (confirm('Your password is changed successfully please login') == true) {window.location = \"index.html\"}</script>";
		}
		else
		{
                    echo "<script type='text/javascript'>if (confirm('Please check your id or Ph.no again') == true) {window.location = \"index.html\"}</script>";                      
                }
	}
	else
	{
             echo "<script type='text/javascript'>if (confirm('Password Mismatched') == true) {window.location = 'index.html'}</script>";
	}
        mysqli_close($con);
}

?>
<!DOCTYPE html>
<html>
<head>
<title>BookMe - New User</title>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link type="text/css" rel="stylesheet" href="css/JFFormStyle-1.css" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!-- //js -->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,700,500italic,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //fonts -->	
<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true   // 100% fit in a container
			});
		});
	</script>
<!--pop-up-->
<script src="js/menu_jquery.js"></script>
<!--//pop-up-->	
</head>
<body>
	<!--header-->
	<div class="header">
		<div class="container">
			<div class="container">
			<div class="header-grids">
				<div class="logo">
					<h1><a  href="index.html"><span>BookMe</span></a></h1>
				</div>
				<!--navbar-header-->
				<div class="header-dropdown">
					<div class="emergency-grid">
						<ul>
                                                    <li>	<div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
                                                        <div id="loginBox">                
								<form id="loginForm">
									<div class="login-grids">
										<div class="login-grid-left">
											<fieldset id="body">
												<fieldset>
													<label for="email">Email Address</label>
													<input type="text" name="email" id="email">
												</fieldset>
												<fieldset>
													<label for="password">Password</label>
													<input type="password" name="password" id="password">
												</fieldset>
												<input type="submit" id="login" value="Sign in">
												<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
											</fieldset>
											<span><a href="forgotpass.php">Forgot your password?</a></span>
											<div class="or-grid">
												<p>OR</p>
											</div>
											<div class="social-sits">
												<div class="facebook-button">
													<a href="#">Connect with Facebook</a>
												</div>
												<div class="chrome-button">
													<a href="#">Connect with Google</a>
												</div>
												<div class="button-bottom">
													<p>New account? <a href="signup.html">Signup</a></p>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
                                                    </div></li>							
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			
				<div class="dropdown-grids">
							
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
            </div>
	<!--//header-->
	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="faqs-top-grids">
				<div class="book-grids">
					<div class="col-md-6 book-left">
						<div class="book-left-info">
							<h3>Forgot Your Password..?</h3>
						</div>
						<div class="book-left-form">
                                                    <form action = "#" method="POST">
								<p>ID</p>
                                                                <input type="text" value="" name ="user" required = "required">
								<p>Phone Number</p>
								<input type="text" value="" name ="ph_no" required = "required">							
								<p>Password</p>
								<input type="password" name="password" id="password" required = "required">
								<p>Confirm Password</p>
								<input type="password" name="password2" id="password" required = "required">
								<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
								<input type="submit" id="login" name="forgot" value="Register">
							</form>
						</div>
					</div>
					<div class="col-md-6 book-left book-right">
						<div class="book-left-info">
							<h3>Recommended</h3>
						</div>
						<div class="book-left-bottom">
							<div class="book-left-facebook">
								<a href="#">Connect with Facebook</a>
							</div>
							<div class="book-left-chrome">
								<a href="#">Connect with Google</a>
							</div>
						</div>
						
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
	<!-- footer -->
	
	<!-- //footer -->
	<div class="footer-bottom-grids">
		<!-- container -->
		<div class="container">
				<div class="footer-bottom-top-grids">
					
					<div class="clearfix"> </div>
					<div class="copyright">
						<p>Copyrights © BookMe by Glosys technologies</p>
					</div>
				</div>
		</div>
	</div>
	<script defer src="js/jquery.flexslider.js"></script>
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
		$(function(){
			SyntaxHighlighter.all();
			});
			$(window).load(function(){
			$('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			$('body').removeClass('loading');
			}
			});
		});
	</script>		
</body>
</html>