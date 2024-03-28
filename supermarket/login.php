<?php 
	include_once("common/init.php");
	
	if($_REQUEST["type"]=="logout"){
		session_destroy();
		session_start();
		urlMsg("Exit Successfully", __BASE__."/login.php");
		die;
	}
	
	if ($_POST) {
			$rsRow = db_get_row("select * from user where status=0 and account='". $_POST["account"] ."'");
			if ($rsRow['password'] == $_POST["password"]){
				$_SESSION["id"]=$rsRow['id'];
				$_SESSION['account']=$rsRow['account'];
				$_SESSION['nickname']=$rsRow['nickname'];
				$_SESSION['type']=$rsRow['type'];
				urlMsg("Login Successfully", __BASE__."/usercenter.php");
				die;
			} else {
				goBakMsg("Account does not exist or password is wrong");
			}
	}
include_once("header.php");

?>
<script type="text/javascript"> 
function check(){   
    if(document.form1.account.value==""){
		alert("Please enter user name");
		document.form1.account.focus();
		return false;}
	if(document.form1.password.value==""){
		alert("Please enter password");
		document.form1.password.focus();
		return false;
	}
	
}
</script>
<div class="container">
	<div class="row">

		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php"> Homepage</a></li>
				<li>Member Login</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                <center><h3>Member Login</h3></center>
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Account</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="account" placeholder="Please enter user name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" placeholder="Please enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button> <a href="forgetpwd.php"><button type="button" class="btn btn-default">Forget password</button></a>
                        </div>
                    </div>
                </form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include_once("footer.php");
?>