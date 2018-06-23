<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$id = $_SESSION['id'];
$_SESSION['id']=$id;
$con = mysqli_connect("localhost","root","","BookMe");
$result = mysqli_query($con,"select * from user_table where id='$id'") or die("unable to login please try again".mysql_error());
$row = mysqli_fetch_array($result);

if($id=="administrator" && $row['status']==1){   

?>
  
<!DOCTYPE html>
<html>
<head>
<title>BookMe - Lets Book Something</title>
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
			<div class="header-grids">
				<div class="logo">
					<h1><a  href="index.html"><span>BookMe</span></a></h1>
				</div>
				<!--navbar-header-->
				<div class="header-dropdown">
					<div class="emergency-grid">
						<ul>
							 <li class="button-bottom">
							<div class="date_btn" style="margin-top: 0px">
                                                            	<form action="logout.php" method="POST">
                                                                <input type="submit" value="Logout">
								</form>
                                                            </div>
                                                        </li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="nav-top">
				<div class="top-nav">
					<span class="menu"><img src="images/menu.png" alt="" /></span>
					<ul class="nav1">						
						<li><a href="newRide.php">New Ride</a></li>
                                                <li><a href="historyAdmin.php">History</a></li>						
						<li><a href="editAdmin.php">Edit Buses</a></li>
                                                <li class="active"><a href="newBusAdmin.php">New Buses</a></li>
					</ul>
					<div class="clearfix"> </div>
					<!-- script-for-menu -->
							 <script> 
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							
							</script>
						<!-- /script-for-menu -->
				</div>
				</div>
		</div>
	</div>
	<!--//header-->
	<!-- banner -->
         
	<div class="banner bus-banner">
            <form action="newBusAdminsingle.php" method="POST">
		<!-- container -->
		<div class="container">
                    <div class="col-md-8 banner-right" style="width: 100%;">
				<div class="sap_tabs">	
					<div class="booking-info about-booking-info">
						<h2>Create New Buses Here</h2>
					</div>
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">	
						  <!---->		  	 
									<div class="facts about-facts">
										<div class="booking-form">
										<link rel="stylesheet" href="css/jquery-ui.css" />
											<!---strat-date-piker---->
											<script>
												$(function() {
													$( "#datepicker,#datepicker1" ).datepicker();
												});
											</script>
											<!---/End-date-piker---->
											<!-- Set here the key for your domain in order to hide the watermark on the web server -->
											
											<div class="online_reservation">
												<div class="b_room">
															<div class="booking_room">
																<div class="reservation">
																	<ul>		
																		<li class="span1_of_1 desti">
																			 <h5>From</h5>
																			 <div class="book_date">
																				
																					<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
																					<div class="section_room">
                                                                                                                                                                        <select id="country" name="from_table" placeholder="Type Destination City" class="typeahead1 input-md form-control tt-input" required="required">
                                                                                                                                                                                                <option selected="selected">chennai</option>
                                                                                                                                                                                                <option>coimbatore</option>
                                                                                                                                                                                                <option>cuddalore</option>
                                                                                                                                                                                                <option>trichy</option>
                                                                                                                                                                                                <option>salem</option>
                                                                                                                                                                                                <option>thoothukodi</option>
                                                                                                                                                                                                <option>dindigul</option>
                                                                                                                                                                                                <option>erode</option>
                                                                                                                                                                                                <option>kanchipuram</option>
																				  </select>
																			 </div>	
																				
																			 </div>	
                                                                                                                                                         
																		 </li>                                                                                                                                                
																	
																		 <div class="clearfix"></div>
                                                                                                                                                 
																	</ul>
																</div>
																
																<div class="reservation">
																	<ul>	
																		 <li class="span1_of_3">
																				<div class="date_btn">
                                                                                                                                                                 
                                                                                                                                                                    <input type="submit" id="Search" name="book" value="Create Bus">
																					
																				</div>
																		 </li>
																		 <div class="clearfix"></div>
																	</ul>
																</div>
															</div>
															<div class="clearfix"></div>
												</div>
											</div>
											<!---->
										</div>	
									</div>
					</div>	
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
                </form>
		<!-- //container -->
	</div>
              
	<!-- //banner -->
	
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
<?php
mysqli_close($con);
}


?>