<?php 
// session_start();
// if(isset($_SESSION["username"]))
// 	$username	=	$_SESSION["username"];
// else
// 	header("location:index.php");
include("./include/connect.inc"); 
$id		=	$_GET["id"];
$sql	=	"delete from tblproduct where ID=$id";
$rs		=	mysqli_query($conn, $sql);
if($rs)
	header("location:list_books.php");

?>