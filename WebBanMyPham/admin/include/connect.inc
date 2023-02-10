<?php
	$servername	=	"localhost";
	$username	=	"root";
	$pass		=	"";
	$dbname		=	"banmypham";
	$conn		=	@mysqli_connect($servername, $username, $pass, $dbname);
	if(!$conn)
		echo "Kết nối thất bại".mysqli_connect_error();
?>