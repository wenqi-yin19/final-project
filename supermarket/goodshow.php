<?php 
	include_once("header.php");
	$row = db_get_row("select * from goods where id=".$_REQUEST["id"]);
	db_query("update goods set apv=apv+1 where id=".$_REQUEST["id"]);
	if(!$_REQUEST["categoryid"]){$cat_title = "Goods Center";}else{
	$catA = db_get_row("select * from category where id=".$_REQUEST["categoryid"]);
	$cat_title = $catA["title"];}
	
	
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php"> Homepage</a></li>
				<li><a href="goods.php">Goods Show</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-6"><img class="img-responsive" src="<?php echo __PUBLIC__;?>/Upload/<?php echo $row["img"];?>" /></div>
                        <div  class="col-md-6">
                            <h2><?php echo $row["title"];?></h2>
                            <p>SKU：<?php echo $row["pnumber"];?></p>
                            <p>Number：<?php echo $row["amount"];?></p>
                            <p>Price：<s>￡<?php echo $row["mprice"];?></s>pounds</p>
    						<p>Member Price：<font color="#FF0000">￡<?php echo $row["sprice"];?>pounds</font></p>
                            <div class="details-in">
                            <form action="addcart.php" method="post">
                      			<input type="hidden" value="<?php echo $row["id"];?>" name="id" />
                                <div class="gw_num" style="border: 1px solid #dbdbdb;width: 110px;line-height: 26px;overflow: hidden;">
                                    <em class="jian">-</em>
                                    <input type="text" name="sums" value="1" class="num" readonly="readonly"/>
                                    <em class="add">+</em>
                                </div>
                                 <p></p>
                               <button type="submit" class="btn btn-danger">BUY</button>
                            </form>
                            </div>
                        </div>
				</div>
			</div>
            
			
		</div>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
	//加的效果
	$(".add").click(function(){
	var n=$(this).prev().val();
	var num=parseInt(n)+1;
	if(num==0){ return;}
	$(this).prev().val(num);
	});
	//减的效果
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