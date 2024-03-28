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
<!-- 字体 Fonts 样式-->
<link rel="stylesheet" href="<?php echo __PUBLIC__;?>/fonts/font-slider.css" type="text/css">
<script src="<?php echo __PUBLIC__;?>/js/jquery-2.1.1.js"></script>	 
<script src="<?php echo __PUBLIC__;?>/js/bootstrap.min.js"></script>
</head>
<body>
	<!--Header-->
	<header class="container">
		<div class="row">
			<div class="col-md-4">
				<div id="logo"><h1>Supermarket Shopping System</h1></div>
			</div>
			<div class="col-md-4">
				<form class="form-search" name="form2" action="goods.php" method="get">
					<input type="search" placeholder="Please Enter Name" required  name="keywords" class="input-medium search-query"/>
					<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
				</form>

			</div>
			<div class="col-md-4">
				<div id="cart"><a class="btn btn-1" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>My Cart</a></div>
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
					<li><a href="index.php">Homepage</a></li>
					<li class="dropdown"><a href="goods.php" class="dropdown-toggle" data-toggle="dropdown">Goods Center</a>
                    	<?php //调用商品分类下拉菜单 
						$goodsa = db_get_all("select * from category  where pid=1 order by id asc");
						if($goodsa[0]){?>
						<div class="dropdown-menu">
							<div class="dropdown-inner">
								<ul class="list-unstyled">
									<?php
										foreach($goodsa as $rowg) {
									?>
									<li><a href="goods.php?categoryid=<?php echo $rowg["id"];?>"><?php echo $rowg["title"];?></a></li>
									<?php }?>
								</ul>
							</div>
						</div>
                        <?php }?>
					</li>
               		<li><a href="message.php">Online Message</a></li>
					<?php
                	//判断 是否登录
					if(isset($_SESSION["id"])){?><li><a href="usercenter.php">User Center</a></li><li><a href="login.php?type=logout">Cancel</a><?php } else{?><li><a href="login.php">Login</a></li><li><a href="register.php">Register</a></li>
				<?php }?>
				</ul>
			</div>
		</div>
	</nav>