<?php 
	include_once("header.php");
	check_loginuser();
	if ($_POST){
		$row = db_get_row("select * from user where id=".$_SESSION["id"]);
		if($_POST["password"] != $_POST["repassword"]) {
			goBakMsg("Two password not same");
		} else if ($_POST["oldpassword"]!=$row["password"]) {
			goBakMsg("Password wrong");
		} else {
			$data = array();
			$data["password"] = "'".$_POST["password"]."'";
			db_mdf("user",$data,$_SESSION["id"]);
			goBakMsg("Modify Successfully");
		}
	}
?>
<script type="text/javascript"> 
function check(){
		if(document.form1.oldpassword.value==""){
		alert("Please enter original password");
		document.form1.oldpassword.focus();
		return false;
	}
	if(document.form1.password.value==""){
		alert("Please enter password");
		document.form1.password.focus();
		return false;
	}
	if(document.form1.repassword.value==""){
		alert("Please confirm password");
		document.form1.repassword.focus();
		return false;
	}
	if(document.form1.password.value!=document.form1.repassword.value){
		alert("Two password not same");
		document.form1.repassword.focus();
		return false;
	}
}
</script>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php">Homepage</a></li>
				<li><a href="usercenter.php">User Center</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				
                <center><h3>User Password Modify</h3></center>
                
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?" onSubmit="return check();">
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Old Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="oldpassword" placeholder="Old Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" placeholder="New Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="repassword" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
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