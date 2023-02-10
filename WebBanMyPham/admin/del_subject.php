<?php 
// session_start();
// if(isset($_SESSION["username"]))
// 	$username	=	$_SESSION["username"];
// else
// 	header("location:index.php");
include("./include/connect.inc"); 
$id		=	$_GET["id"];
// Xóa sản phẩm  
$sql	=	"delete from tblsectors where ID=$id";
$rs		=	mysqli_query($conn, $sql);
//Xóa chủ đề
$sql	=	"delete from tblsectors where ID=$id";
$rs		=	mysqli_query($conn, $sql);


if($rs)
	header("location:list_subject.php");

?>
