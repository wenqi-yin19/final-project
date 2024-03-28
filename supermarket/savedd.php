<?php
include_once("common/init.php");
$info = db_get_row("select * from user where userid=".$_SESSION["id"]);
$dingdanhao=date("YmjHis").$info['id'];
$spc=$_SESSION['producelist'];
$slc= $_SESSION['quatity'];
$shouhuoren=$_POST['receiver'];
$dizhi=$_POST['address'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$shff=$_POST['shff'];
$zfff=$_POST['zfff'];
$sex=$_POST['sex'];
if(trim($_POST['ly'])==""){
   $leaveword="";
 }
 else{
   $leaveword=$_POST['ly'];
 }
 $xiadanren=$_SESSION['account'];
 $zt="未作任何处理";
 $total=$_SESSION["total"];
 $data = array();
		$data["onumber"] = "'". $dingdanhao ."'";
		$data["spc"] = "'". $spc ."'";
		$data["slc"] = "'". $slc ."'";
		$data["tel"] = "'". $_POST["tel"] ."'";
		$data["receiver"] = "'". $shouhuoren ."'";
		$data["address"] = "'". $dizhi ."'";
		$data["email"] = "'". $email ."'";
		$data["shff"] = "'". $shff ."'";
		$data["zfff"] = "'". $zfff ."'";
		$data["leaveword"] = "'". $leaveword ."'";
		$data["sex"] = "'". $sex ."'";
		$data["xname"] = "'". $xiadanren ."'";
		$data["zt"] = "'". $zt ."'";
		$data["total"] = "'". $total ."'";
		db_add("orders", $data);
		urlMsg("buy successfully","ordershow.php?dd=$dingdanhao");
?>
