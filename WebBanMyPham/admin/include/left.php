<?php
	include "connect.inc";
	$sql	=	"select * from tblsubject ";
	$rs 	=	mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($rs)){
		echo "<li><i><a href=\"show_subject.php?id_subject=".$row['id_subject']."\">".$row["name_subject"]."</a></i>";	
	}
?>

                
              