<?php 
	include("connect.inc"); 
	$sql		=	"select * from tblsubject";
	$rs 		=	mysqli_query($conn, $sql);
	echo "<p><b> SÁCH THEO CHỦ ĐỀ </b></p>
              <ul type=\"square\">";
	while($row=mysqli_fetch_array($rs)){
		echo "<li><i><a href=\"list_books.php?idsubject=".$row["id_subject"]."\">".$row["name_subject"]."</a></i>";
	}
	echo"</ul>";
?>
                
                
              