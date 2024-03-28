<?php 
	include_once("header.php");
	$row = db_get_row("select * from content1 where id=".$_REQUEST["id"]);
	db_query("update content1 set apv=apv+1 where id=".$_REQUEST["id"]);
	
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php"> Homepage</a></li>
				<li><?php echo $cat_title;?></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
					<h2 class="title"><?php echo $row['title'];?></h2>
					<p><span class="glyphicon glyphicon-time"></span> <span><?php echo $row['addtime']?></span> </p>
					<div style="border:1px dotted #ddd; margin-bottom:10px;"></div>
                    <p><?php echo $row['content']?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	include_once("footer.php");
?>