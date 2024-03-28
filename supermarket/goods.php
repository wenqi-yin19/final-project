<?php 
	include_once("common/init.php");
	$whereSql = "";
	if ($_REQUEST["categoryid"]){
		$whereSql .= " and categoryid=" . $_REQUEST["categoryid"];
	}
	if ($_REQUEST["keywords"]) {
		$whereSql .= " and title like '%". $_REQUEST["keywords"] ."%' ";
	}
	$page = $_REQUEST["page"]?$_REQUEST["page"]:"1";
	$list = db_get_page("select * from goods where 1=1 $whereSql and status=0 order by addtime desc", $page,8);
	if ($page*1>$list["page"]*1){
		$page = $list["page"];
	}
	$Page = new PageWeb($list["total"],$list["page_size"], "&categoryid=".$_REQUEST["categoryid"]."&keywords=".$_REQUEST["keywords"]."", $page);
	$page_show = $Page->show(); 
	if(!$_REQUEST["categoryid"]){$cat_title = "Goods Center";}else{
	$catA = db_get_row("select * from category where id=".$_REQUEST["categoryid"]);
	$cat_title = $catA["title"];}
	include_once("header.php");
?>
<div class="container">
	<div class="row">
        <div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php"> Homepage</a></li>
				<li><a href="goods.php">Good Center</a></li>
			</ul>
			<div class="panel panel-default">
			  <div class="panel-body">
				<div class="row">

						<div class="col-md-12">
                        <div class="list-group"><table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="abd6fa" style="border:1px solid abd6fa">
                                <form name="form1" method="get" action=""><tr>
                                  <td width="100" align="center">
                                 <select name="categoryid" class="form-control">
			  						<option value="">Option Goods Category</option>
									<?php $categoryA = db_get_all("select * from category where pid=1"); foreach($categoryA as $row) {?>
                            		<option value="<?php echo $row["id"];?>" <?php if($_REQUEST["categoryid"]==$row["id"]){echo ' selected="selected" ';}?>><?php echo $row["title"];?></option>
                        			<?php } ?>
								</select>
                                  </td>
                                  <td width="160" align="center"><input name="keywords" type="text" value="<?php echo $_REQUEST["keywords"];?>" placeholder="Enter Name" style="width:150px;" class="form-control">
                                  </td>
                                  <td align="left">
                                    <input name="Submit" type="submit" class="btn btn-default" value="Search" ></td>
                                  <td width="80" align="right">&nbsp;</td>
                                </tr></form>
                              </table></div>
							<div class="products">
                            <?php foreach($list["data"] as $row) {?>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="product">
                                        <div class="image"><a href="goodshow.php?id=<?php echo $row['id'];?>&categoryid=<?php echo $row['categoryid'];?>">
                                        <?php if (!$row["img"]){?>
                                            <img src="<?php echo __PUBLIC__;?>/Upload/avatar.png"/>
                                        <?php }else{ ?>
                                            <img src="<?php echo __PUBLIC__;?>/Upload/<?php echo $row["img"];?>"/>
                                        <?php } ?></a>
                                        </div>
                                        <div class="caption">
                                            <div class="name"><h3><a href="goodshow.php?id=<?php echo $row['id'];?>&categoryid=<?php echo $row['categoryid'];?>"><?php echo $row['title'];?></a></h3></div>
                                            <div class="price">￡<?php echo $row['sprice'];?><span>￡<?php echo $row['mprice'];?></span></div>
                                            <div class="rating"><div class="buttons">
                                            <a class="btn cart" href="addcart.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                                        </div></div>
                                        </div>
                                    </div>
                                </div>
								<?php }?>
                                <div class="clearfix"></div>
                                <div class="pages">
                                    <ul class="pagination">
                                        <?php echo $page_show;?>
                                    </ul>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	include_once("footer.php");
?>