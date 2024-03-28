<?php
include_once("header.php");
check_loginuser();
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php"> Homepage</a></li>
				<li>My Order</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                      <caption>My Order</caption>
                      <?php
						  $page = $_REQUEST["page"] ? $_REQUEST["page"] : 1;
							$list = db_get_page("select * from orders where xname='".$_SESSION["account"]."' order by id desc", $page, 100);
							if ($page*1 > $list["page"]*1){
								$page = $list["page"];
							}
							$Page = new PageWeb($list["total"], $list["page_size"], "", $page);
							$page_show = $Page->show(); 
					  ?>
                      <thead>
                        <tr bgcolor="#FFEDBF">
                          <th height="35" align="center">Order No</th>
                          <th height="35" align="center">Time</th>
                          <th height="35" align="center">Receiver</th>
                          <th height="35" align="center">Total</th>
                          <th height="35" align="center">Order State</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php foreach($list["data"] as $info) {?>
                      	<tr>
                          <td height="35"><a href="ordershow.php?dd=<?php echo $info['onumber'];?>"><?php echo $info['onumber'];?></a></td>
                          <td height="35"><?php echo $info['addtime'];?></td>
                          <td height="35"><?php echo $info['receiver'];?></td>
                          <td height="35"><?php echo $info['total'];?></td>
                          <td height="35"><?php if($info['zt']=="未作任何处理"){ ?>no paying-<a href="?action=del&id=<?php echo $info['id'];?> ">cancel</a><?php }else{?><?php echo $info['zt'];?><?php }?></td>
                        </tr>
                    <?php } ?>
                      </tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include_once("footer.php");
?>

<?php
$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	db_query("delete from orders where id='".$id."'",$conn);
	echo "<script>alert('Delete Successfully！');location.href='order.php';</script>";
}
?>
