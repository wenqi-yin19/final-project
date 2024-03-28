<?php 
	include_once("lefthead.php");
	
	if ($_POST){
		
		$row = db_get_row("select * from user where account='". $_POST["account"] ."'");
		if ($row["id"]) {
			goBakMsg("User has exist");
			die;
		}
		
		$data = array();
		$data["account"] = "'". $_POST["account"] ."'";
		$data["nickname"] = "'". $_POST["nickname"] ."'";
		$data["email"] = "'". $_POST["email"] ."'";
		$data["sex"] = "'". $_POST["sex"] ."'";
		$data["tel"] = "'". $_POST["tel"] ."'";
		$data["password"] = "'". $_POST["password"] ."'";
		$data["address"] = "'".$_POST["address"]."'";
		
		db_add("user", $data);
		urlMsg("Register Successfully", __BASE__."/leftlogin.php");
		die;
	}
?>
<script type="text/javascript"> 
function check(){
	var account = document.form1.account.value;
	var email = document.form1.email.value;
	var reg = /^[a-zA-Z0-9_]{6,}$/;
	if(!reg.test(account)){
		document.form1.account.focus();
		alert("Wrong Form");
		return false;
	}
	
	if(document.form1.password1.value==""){
		alert("Please enter confirm password");
		document.form1.password1.focus();
		return false;
	}
	if(document.form1.password.value!=document.form1.password1.value){
		alert("Password entered twice is inconsistent");
		document.form1.password1.focus();
		return false;
	}
	var emailreg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
	if(!emailreg.test(email)){
		document.form1.email.focus();
		alert("Wrong Form");
		return false;
	}
	if(document.form1.nickname.value==""){
		alert("User name is required");
		document.form1.nickname.focus();
		return false;}
	var mobile=document.form1.tel.value;
		if(mobile.length==0) 
       { 
          alert('Please enter mobile phone number'); 
          document.form1.tel.focus(); 
          return false; 
       }     
       if(mobile.length!=11) 
       { 
           alert('Please enter a vaild mobile phone number'); 
           document.form1.tel.focus(); 
           return false; 
       } 

	if(document.form1.address.value==""){
		alert("Address is required");
		document.form1.address.focus();
		return false;}
}
</script>
<div class="container">
	<div class="row">

		<div class="col-md-9" style="margin-left: 250px;">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="leftindex.php">Homepage</a></li>
				<li><a href="leftreg.php">Member Register</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				
                <center><h3>Member Register</h3></center>
                
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Account</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="account" placeholder="more than 6 digits, numbers or letters">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Enter Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Repeat Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password1" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Telephone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Real Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nickname" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" placeholder="">
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