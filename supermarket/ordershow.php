<?php
include_once("header.php");
check_loginuser();
?>
<?php

  $act = !empty($_GET['act']) ? trim($_GET['act']) : '';
  if($act == 'shouhuo')
	{
		$dingdanhao=!empty($_GET['dingdanhao']) ? trim($_GET['dingdanhao']) : '';
		db_query("update orders set zt='Update' where onumber='".$dingdanhao."'");
		echo "<script>alert('Delivery！');location.href='order.php';</script>";
	}
	
  $dingdanhao=$_GET['dd'];
  $info2=db_get_row("select * from orders where onumber='".$dingdanhao."'");
  $spc=$info2['spc'];
  $slc=$info2['slc'];
  $arraysp=explode("@",$spc);
  $arraysl=explode("@",$slc);
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php"> Homepage</a></li>
				<li>Show Order</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                      <caption><?php echo $_SESSION['account'];?>，Your order no is：<font color="#FF0000"><?php echo $dingdanhao;?></font> Info:</caption>
                      <thead>
                        <tr bgcolor="#FFEDBF">
                          <th height="35" align="center">Title</th>
                          <th height="35" align="center">Number</th>
                          <th height="35" align="center">Price</th>
                          <th height="35" align="center">Member Price</th>
                          <th height="35" align="center">Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php
					  $total=0;
					  for($i=0;$i<count($arraysp)-1;$i++){
						 if($arraysp[$i]!=""){
						 $info1=db_get_row("select * from goods where id='".$arraysp[$i]."'");
						 $total=$total+=$arraysl[$i]*$info1['sprice'];
					  ?>
                      	<tr>
                          <td height="35"><a href="goodshow.php?id=<?php echo $info1['id'];?>&categoryid=<?php echo $info1['categoryid'];?>"><?php echo $info1['title'];?></a></td>
                          <td height="35"><?php echo $arraysl[$i];?></td>
                          <td height="35"><?php echo $info1['mprice'];?>pounds</td>
                          <td height="35"><?php echo $info1['sprice'];?>pounds</td>
                          <td height="35"><?php echo $arraysl[$i]*$info1['sprice'];?>pounds</td>
                        </tr>
                     <?php
						  }
						 }
					 ?>
                      </tbody>
                     <tbody>
                      	<tr>
                          <td align="center" colspan="5">Total：<?php echo $total;?>pounds</td>
                        </td>
                       </tr>
                      </tbody>
                    </table>
                    <div class="height1"></div>
                    <table class="table table-bordered">
                      <tbody>
                      	<tr>
                          <td height="35">Xname:</td>
                          <td height="35"><?php echo $_SESSION['account'];?></td>
                        </tr>
                        <tr>
                          <td height="35">Receiver:</td>
                          <td height="35"><?php echo $info2['receiver'];?></td>
                        </tr>
                        <tr>
                          <td height="35">Address:</td>
                          <td height="35"><?php echo $info2['address'];?></td>
                        </tr>
                        <tr>
                          <td height="35">Tel:</td>
                          <td height="35"><?php echo $info2['tel'];?></td>
                        </tr>
                        <tr>
                          <td height="35">E-mail:</td>
                          <td height="35"><?php echo $info2['email'];?></td>
                        </tr>
                      	<tr>
                          <td align="center" colspan="5">Order Date：<?php echo $info2['addtime'];?></td>
                        </td>
                       </tr>

                       <tr>
                          <td align="center" colspan="5">Order State：<?php echo $info2['zt'];?> <?php if($info2['zt']=="Shipping" )
							{?>
                            <a href="?act=shouhuo&dingdanhao=<?=$dingdanhao?>" class="details"><button type="button" class="btn btn-default">Confirm</button></a>
                       </tr>
                      </tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$_SESSION['producelist']="";
$_SESSION['quatity']=""; 
include_once("footer.php");
?>