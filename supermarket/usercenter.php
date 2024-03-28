<?php 
	include_once("common/init.php");
	check_loginuser();
	include_once("header.php");
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php"> Homepage</a></li>
				<li>User Center</li>
			</ul>
			<div class="panel panel-default">
				
                <?php if(isset($_SESSION['id']))
				{
				?>
				<div class="list-group">
					<a href="userEdit.php" class="list-group-item">Personal Information</a>
                    <a href="userEditp.php" class="list-group-item">Modify Password</a>
                    <a href="order.php" class="list-group-item">My Order</a>
					<a href="cart.php" class="list-group-item">My Cart</a>
                    <a href="login.php?type=logout" class="list-group-item">Log Out</a>
                    
				</div>
                <?php
				}
				else
				{
				?>
                <div class="panel-body">
                <div class="height1"></div>
                <form class="form-horizontal" method="post" role="form" name="form2" action="login.php">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="account" placeholder="Please enter user name" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" placeholder="Please enter password" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Login</button> <a href="register.php"><button type="button" class="btn btn-link">Register</button></a>
                        </div>
                    </div>
                </form></div>
                <?php } ?>
			</div>
		</div>
		</div>
	</div>
</div>
<?php
	include_once("footer.php");
?>

		