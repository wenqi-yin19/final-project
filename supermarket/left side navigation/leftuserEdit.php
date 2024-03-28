<?php 
	include_once("common/init.php");
	check_loginuser();
	$row = db_get_row("select * from user where id=".$_SESSION["id"]);
	if ($_POST){
		$data = array();
		$data["nickname"] = "'".$_POST["nickname"]."'";
		$data["tel"] = "'".$_POST["tel"]."'";
		$data["sex"] = "'".$_POST["sex"]."'";	
		$data["email"] = "'".$_POST["email"]."'";
		$data["address"] = "'".$_POST["address"]."'";
		if(!empty($_FILES['img']['name'])){
			$file = $_FILES['img'];
			$name = $file['name'];
			$type = strtolower(substr($name,strrpos($name,'.')+1)); 
			$allow_type = array('jpg','jpeg','gif','png'); 
			
			if(!in_array($type, $allow_type)){
				
			}
			
			$upload_path = ROOT_PATH.'/Public/Upload/'; 
			
			
			$mu=mt_rand(1,10000000);
			if(move_uploaded_file($file['tmp_name'],$upload_path.$mu.".".$type)){
			  $fileName =$mu.".".$type;
			}else{
			  
			}
			$data["img"] = "'".$fileName."'";	
		}	

		db_mdf("user",$data,$_SESSION["id"]);
		urlMsg("Modify Successfukky", __BASE__."/leftuserEdit.php");
	}
	include_once("lefthead.php");
?>
<script type="text/javascript"> 
function check(){
	var email = document.form1.email.value;
	var emailreg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
	if(!emailreg.test(email)){
		document.form1.email.focus();
		alert("E-mail form is wrong");
		return false;
	}
	if(document.form1.nickname.value==""){
		alert("Name is required");
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
		return false;
}
</script>
<div class="container">
	<div class="row">
		<div class="col-md-9" style="margin-left: 250px;">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="leftindex.php">Homepage</a></li>
				<li><a href="leftusercenter.php">User Center</a></li>
				
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				
                <center><h3>User Information Modify</h3></center>
                
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?" onSubmit="return check();">
                	<div class="form-group">
                        <center>
                            <?php
								if ($row["img"]){
							?>
								<img src="<?php echo __PUBLIC__;?>/Upload/<?php echo $row["img"];?>" style="width:160px; height:125px;"/>
							<?php }?>
                        </center>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Modify Avatar</label>
                        <div class="col-sm-10">
                            <input type="file" name="img" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Fill in Account</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="account" placeholder="Account cannot be modified" value="<?php echo $row['account'];?>"  readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" placeholder="Please enter E-mail" value="<?php echo $row['email'];?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Telephone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" placeholder="Please enter telephone number" value="<?php echo $row['tel'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Real Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nickname" placeholder="Please enter name" value="<?php echo $row['nickname'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-10">
                            <select name="sex" class="form-control">
                                <option value="unknown" <?php if($row["sex"]=="unknown"){echo "selected";}?>>unknown</option>
                                <option value="male" <?php if($row["sex"]=="male"){echo "selected";}?>>male</option>
                                <option value="female" <?php if($row["sex"]=="female"){echo "selected";}?>>female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" placeholder="Please enter address" value="<?php echo $row['address'];?>">
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