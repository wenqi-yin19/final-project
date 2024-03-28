<?php
include_once("header.php");
check_loginuser();
$row = db_get_row("select * from user where id=".$_SESSION["id"]);
?>
<script language="javascript">
function check(){
	if(document.getElementById("email").value==""){
		alert("Please enter email");
		return false;}
	if(document.getElementById("receiver").value==""){
		alert("Please enter receiver");
		return false;}
	if(document.getElementById("address").value==""){
		alert("Please enter address");
		return false;}
	var mobile=document.getElementById("tel").value;
		if(mobile.length==0) 
       { 
          alert('Please enter telephone number！'); 
          return false; 
       }     
       if(mobile.length!=11) 
       { 
           alert('Please enter a vaild number！');
           return false; 
       } 
}
</script>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php">Homepage</a></li>
				<li>Shipping Address</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				
                <center><h3>Shipping Address</h3></center>
                
                <form class="form-horizontal" method="post" role="form" name="form1"  action="savedd.php" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Receiver</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="receiver" id="receiver" placeholder="Receiver" value="<?php echo $row['nickname'];?>">
                        </div>
                    </div>
					<div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-10">
                            <select name="sex" class="form-control">
                              <option selected value="male">male</option>
                              <option value="female">female</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="Please enter telephone number" value="<?php echo $row['tel'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Please enter E-mail" value="<?php echo $row['email'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Please enter address" value="<?php echo $row['address'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Shipping Method</label>
                        <div class="col-sm-10">
                            <select name="shff" class="form-control">
                              <option selected value="Classical">Classical</option>
                              <option value="Express">Express</option>
                              <option selected value="Collect">Collect</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Add comment</label>
                        <div class="col-sm-10">
                            <textarea name="ly" cols="70" rows="5" class="form-control"></textarea>
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

<?php
$dingdanhao = !empty($_GET['dingdanhao']) ? trim($_GET['dingdanhao']) : '';
if ($dingdanhao != "" && !isset($_GET['show_success_alert'])) {
    $dd = $dingdanhao;
    echo "<script>alert('Buy Successfully！');location.href='ordershow.php?dd='+'" . $dd . "&show_success_alert=true';</script>";
}

?>
                    