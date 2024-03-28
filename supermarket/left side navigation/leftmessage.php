<?php 
	include_once("lefthead.php");
	$page = $_REQUEST["page"]?$_REQUEST["page"]:"1";
	$list = db_get_page("select * from message order by addtime desc", $page,9);
	if ($page*1>$list["page"]*1){
		$page = $list["page"];
	}
	$Page = new PageWeb($list["total"],$list["page_size"], "", $page);
	$page_show = $Page->show(); 
?>
<div class="container">
	<div class="row">
		<div class="col-md-9" style="margin-left: 250px;">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="leftindex.php">Homepage</a></li>
				<li>Online Message</li>
			</ul>
			<div class="list-group">
			<?php
			
			foreach($list["data"] as $row) {
			
			?>
				<div class="list-group-item">
					<h4><?php 
			 echo db_get_val('user',$row['userid'],'nickname');?> Submit Time：<span class="badge"> <?php echo $row['addtime']?></span> </h4>
				</div>
                <div class="alert alert-info">
				<?php echo $row['content']?>
                <?php if(!$row['recontent']==""){?><p><strong>Manage Answer：</strong><?php echo $row['recontent'];?></p><?php } ?>
				</div>
            <?php
			}
			?>
			</div>
			<div class="pages">
				<ul class="pagination">
					<?php echo $page_show;?>
				</ul>
			</div>
            
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1" action="?act=add">
                <input name="teacherid" type="hidden" value="<?php echo $_SESSION['teacherid'];?>" />
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Post Message</label>
                        <div class="col-sm-10">
                          <textarea name="content" rows="4" class="form-control" placeholder="Enter Content" required="required"></textarea>
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
<?php 
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'add')
	{
		if (!$_SESSION["id"]) {
			goBakMsg("Must Login！");
			die;
		}
		$data1 = array();
		$data1["userid"] = "'".$_SESSION["id"]."'";	
		$data1["content"] = "'".$_POST["content"]."'";
		db_add("message",$data1);
		urlMsg("submit successfully", "leftmessage.php");
	}
	include_once("footer.php");
?>