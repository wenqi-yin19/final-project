<?php 
	include_once("common/init.php");
	if ($_POST){
		db_query("update user set password='".$_POST["password"]."' where account='".$_SESSION['forgetname']."'");
		$_SESSION['forgetname']="";
		urlMsg('Change successfully, please use the new password login','login.php');
	}
include_once("header.php");

?>
 <script type="text/javascript"> 
function check(){
	if(document.login.password.value==""){
		alert("Please enter password");
		document.login.password.focus();
		return false;
	}
	if(document.login.password2.value==""){
		alert("Please enter confirmation password");
		document.login.password2.focus();
		return false;
	}
	if(document.login.password.value!=document.login.password2.value){
		alert("Wrong password");
		document.login.password2.focus();
		return false;
	}
}</script>
<div class="container">
	<div class="row">

		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php"> Homepage</a></li>
				<li>Set new password</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                <center><h3>Set new password</h3></center>
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">User Name</label>
                        <div class="col-sm-10">
                            <?php echo $_SESSION['forgetname'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">New password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" placeholder="Please enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Repeat password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password2" placeholder="Please enter password">
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