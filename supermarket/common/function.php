<?php
	function check_loginuser(){
		if(!$_SESSION['id']) {
	
			echo "<script language='javascript'>alert('请登录');location.href='login.php';</script>";
		}
	}
	
	function check_login(){
		if(!$_SESSION['adminid']) {
			header("Location:".__BASE__."/admin/login.php");
		}
	}
	//js弹出框
	function alertMsg($msg)
	{	
		echo "<script language='javascript'>alert('".$msg."');</script>";
	}
	function goBakMsg($msg)
	{	
		echo "<script language='javascript'>alert('".$msg."');history.go(-1);</script>";
	}
	
	function urlMsg($msg,$url)
	{	
		echo "<script language='javascript'>alert('".$msg."');location.href='$url';</script>";
	}

?>