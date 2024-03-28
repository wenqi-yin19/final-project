<?php 
	include_once("common/init.php");
	if ($_POST){
		$row = db_get_row("select * from user where account='". $_POST["account"] ."' and userask='". $_POST["userask"] ."' and useranswer='". $_POST["useranswer"]."'");
		if ($row["id"]) {
			$_SESSION['forgetname']=$row["account"];
			urlMsg('Successfully, reset password','forgetnew.php');
		}
		else{urlMsg("Wrong, Try Again",'forgetpwd.php');	}
		die;
	}
include_once("header.php");

?>
<script type="text/javascript"> 
function check(){   
    if(document.form1.account.value==""){
		alert("Please enter User Name");
		document.form1.account.focus();
		return false;}
	if(document.form1.useranswer.value==""){
		alert("Please enter answer");
		document.form1.useranswer.focus();
		return false;
	}
	
}
</script>
<div class="container">
	<div class="row">

		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php"> Homeoage</a></li>
				<li>Find Back Password</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                <center><h3>Find Back Password</h3></center>
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Enter User Name</label>
                        <div class="col-sm-10">
                            <input class="form-control"  name="account" type="text" id="account" maxlength="18">
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