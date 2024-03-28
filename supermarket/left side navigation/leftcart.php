<?php
 include_once("lefthead.php");
?>
<div class="container">
	<div class="row">
		<div class="col-md-9" style="margin-left: 250px;">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="leftindex.php"> Homepage</a></li>
				<li>My Cart</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                    <form name="form1" method="post" action="?">
                      <caption>My Cart</caption>
                      <?php
					  $_SESSION['total'] = null;
					  $qk = !empty($_GET['qk']) ? trim($_GET['qk']) : '';
					  if($qk=="yes"){
						 $_SESSION['producelist']="";
						 $_SESSION['quatity']=""; 
					  }
					  $sessionproducelist = !empty($_SESSION['producelist']) ? trim($_SESSION['producelist']) : '';
					  if(!isset($_SESSION['producelist'])){
					echo "<tr>";
						   echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>Your Cart is Empty!</td>";
						   echo"</tr>";
					
					}else{
					   $arraygwc=explode("@",$_SESSION['producelist']);
					   $s=0;
					   for($i=0;$i<count($arraygwc);$i++){
						   $s+=intval($arraygwc[$i]);
					   }
					  if($s==0 ){
						   echo "<tr>";
						   echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>Your Cart is Empty!</td>";
						   echo"</tr>";
						}
					  else{ 
					?>
                      <thead>
                        <tr bgcolor="#FFEDBF">
                          <th height="35" align="center">Title</th>
                          <th height="35" align="center">Number</th>
                          <th height="35" align="center">Price</th>
                          <th height="35" align="center">Member Price</th>
                          <th height="35" align="center">Discount</th>
                          <th height="35" align="center">Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php
						$total=0;
						$array=explode("@",$_SESSION['producelist']);
						$arrayquatity=explode("@",$_SESSION['quatity']); 
						
						 while(list($name,$value)=each($_POST)){ 
							  for($i=0;$i<count($array)-1;$i++){
								if(($array[$i])==$name){
								$info1 = db_get_row("select * from goods where id='".$array[$i]."'");
								if($value>$info1['amount']){
									
								echo "<script language='javascript'>alert('no！');location.href='leftcart.php';</script>";
								die;
							   }
							   
							   
							   
								  $arrayquatity[$i]=$value;  
								}
							}
						}
						
						$_SESSION['quatity']=implode("@",$arrayquatity);
						
						for($i=0;$i<count($array)-1;$i++){ 
						   $id=$array[$i];
						   $num=$arrayquatity[$i]; 
						  
						   if($id!=""){
						   $info = db_get_row("select * from goods where id=".$id);
						   $total1=$num*$info['sprice'];
						   $total+=$total1;
						   $_SESSION["total"]=$total;
					?>
                      	<tr>
                          <td height="35"><a href="leftgoodshow.php?id=<?php echo $info['id'];?>&categoryid=<?php echo $info['categoryid'];?>" target="_blank"><?php echo $info["title"];?></a></td>
                          <td height="35"><div class="gw_num" style="border: 1px solid #dbdbdb;width: 110px;line-height: 26px;overflow: hidden;">
                            <em class="jian">-</em>
                            <input type="text" name="<?php echo $info['id'];?>" value="<?php echo $num;?>" class="num"/>
                            <em class="add">+</em>
                        </div></td>
                          <td height="35"><?php echo $info['mprice'];?>pounds</td>
                          <td height="35"><?php echo $info['sprice'];?>pounds</td>
                          <td height="35"><?php echo @(ceil(($info['sprice']/$info['mprice'])*100))."%";?></td>
                          <td height="35"><?php echo $info['sprice']*$num."pounds";?></td>
                          <td height="35"><a href="leftremovecart.php?id=<?php echo $info['id']?>">Remove</a></td>
                        </tr>
                     <?php
						  }
						 }
					 ?>
                      </tbody>
                     <tbody>
                      	<tr>
                      	  <td colspan="7" align="center">
                        <table class="table" style="margin-bottom: 0px;" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center"><button name="submit2" type="submit" class="btn btn-default">Change Number</button></td>
                          <td align="center"><a href="leftcart2.php"><button type="button" class="btn btn-default">Pay</button></a></td>
                          <td align="center"><a href="leftcart.php?qk=yes"><button type="button" class="btn btn-default">Clear Cart</button></a></td>
                          <td align="center"><a href="leftgoods.php"><button type="button" class="btn btn-default">Keep Shopping</button></a></td>
                          <td align="center">Total：<?php echo $total;?>pounds</td>
                        </tr>
                      </table>
                        </td>
                       </tr>
                      </tbody>
                     <?php
						 }}
						?></form>
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
	
	$(".add").click(function(){
	var n=$(this).prev().val();
	var num=parseInt(n)+1;
	if(num==0){ return;}
	$(this).prev().val(num);
	});
	
	$(".jian").click(function(){
	var n=$(this).next().val();
	var num=parseInt(n)-1;
	if(num==0){ return}
	$(this).next().val(num);
	});
	})
</script>
<?php
	include_once("footer.php");
?>