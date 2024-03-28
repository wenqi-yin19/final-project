<?php
	include_once("common/init.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Supermarket Shopping System</title>
<link rel="stylesheet" href="<?php echo __PUBLIC__;?>/css/bootstrap.min.css"  type="text/css">
<link rel="stylesheet" href="<?php echo __PUBLIC__;?>/css/style.css">
<!-- Font styles -->
<link rel="stylesheet" href="<?php echo __PUBLIC__;?>/fonts/font-slider.css" type="text/css">
<script src="<?php echo __PUBLIC__;?>/js/jquery-2.1.1.js"></script>	 
<script src="<?php echo __PUBLIC__;?>/js/bootstrap.min.js"></script>
<style>
    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: white; 
        padding-top: 20px;
    }
    
    .sidebar a {
        padding: 10px;
        text-decoration: none;
        display: block;
        color: #333; 
    }
    
    .sidebar a:hover {
        background-color: #e9ecef; 
    }
    
    .main-content {
        margin-left: 250px; 
    }
</style>
</head>
<body>
    <!--Sidebar-->
    <div class="sidebar">
        <div id="logo"><h1>Supermarket Shopping System</h1></div>
        <a href="leftindex.php">Homepage</a>
        <a href="leftgoods.php">Goods Center</a> 
        <a href="leftmessage.php">Online Message</a>
        <?php if(isset($_SESSION["id"])): ?>
            <a href="leftusercenter.php">User Center</a>
            <a href="leftlogin.php?type=logout">Logout</a>
        <?php else: ?>
            <a href="leftlogin.php">Login</a>
            <a href="leftregister.php">Register</a>
        <?php endif; ?>
    </div>

    <!--Main Content-->
    <div class="main-content">
        <!--Header-->
		<div class="col-md-4" style="margin-left:20px;">
				<form class="form-search" name="form2" action="leftgoods.php" method="get">
					<input type="search" placeholder="Please Enter Name" required  name="keywords" class="input-medium search-query"/>
					<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
				</form>

			</div>
        <header class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="cart"><a class="btn btn-1" href="leftcart.php"><span class="glyphicon glyphicon-shopping-cart"></span>My Cart</a></div>
                </div>
            </div>
        </header>

        <!--Navigation-->
        <nav id="menu" class="navbar">
            <div class="container">
                <div class="navbar-header"><span id="heading" class="visible-xs">Navigation</span>
                  <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>
</html>
