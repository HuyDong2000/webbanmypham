<!-- <?php
        // session_start();
        // if(isset($_SESSION["username"]))
        // 	$username	=	$_SESSION["username"];
        // else
        // 	header("location:index.php");
        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startmin - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <?php
            include "menuleft.php";
            ?>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm sách</h1>

                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <?php
                include "./include/connect.inc";
                if (isset($_POST["cbosubject"])) {
                    $id_book            =    $_POST["txtidbook"];
                    $id_subject        =    $_POST["cbosubject"];
                    $title            =    $_POST["txttitle"];
                    $price            =    $_POST["txtprice"];
                    $image            =    $_FILES["txtimages"]["name"];
                    $name_tmp        =    $_FILES["txtimages"]["tmp_name"];
                    if ($image != "")
                        $sql                =    "update  tblproduct set  TenSP='$title', DonGia=$price,  HinhMinhHoa ='$image', MaLoai='$des' where ID=$id_book";
                    else
                        $sql        =    "update  tblproduct set  TenSP='$title', DonGia=$price,   MaLoai='$des' where ID=$id_book";

                    $rs                 =    mysqli_query($conn, $sql);
                    if ($rs) {
                        if ($image != "") {
                            unlink("./uploads/" . $_POST["txtimage"]);
                            move_uploaded_file($name_tmp, "./uploads/" . $image);
                        }
                        echo "<script>window.location.href='list_books.php'</script>";
                    } else
                        echo "<script>alert('Thêm sách không thành công')</script>";
                } else {
                    $sql            =    "select * from tblproduct where ID= " . $_GET["id"];
                    $rs                =    mysqli_query($conn, $sql);
                    $row            =    mysqli_fetch_array($rs);
                    $name_book        =     $row["TenSP"];
                    $price            =    $row["DonGia"];
                    $des            =    $row["MaLoai"];
                    $image            =    $row["HinhMinhHoa"];
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <table class="table table-striped table-bordered table-hover" style="width:90%" align="center">

                        <tbody>
                            <tr>
                                <input type="text" name="txtidbook" value='<?= $_GET["id"] ?>'>
                                <input type="text" name="txtimage" value="<?= $image ?>">
                                <td>Tên chủ đề(*):</td>
                                <td><select class="form-control" name="cbosubject">
                                        <?php
                                        $sql =    "select * from tblsectors";
                                        $rs    =    mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($rs))
                                            if ($_GET["idsubject"] == $row[0])
                                                echo "<option value=" . $row[0] . " selected>" . $row[1] . "</option>";
                                            else
                                                echo "<option value=" . $row[0] . " >" . $row[1] . "</option>";
                                        ?>

                                    </select></td>
                            </tr>
                            <tr>

                                <td>Tên sản phẩm :</td>
                                <td><input class="form-control" name="txttitle" value="<?= $name_book ?>"></td>
                            </tr>
                            <tr>
                                <td>Giá:</td>
                                <td><input class="form-control" name="txtprice" value="<?= $price ?>"></td>
                            </tr>
                            <tr>
                                <td>Hình :</td>
                                <td><input type="file" class="form-control" name="txtimages" id="fileField"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><button type="submit" class="btn btn-primary">Thêm</button><button type="reset" class="btn btn-warning" style="margin-left: 10px">Làm lại</button></td>
                            </tr>

                    </table>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

</body>

</html>


<!-- <td><a href='edit_book.php?id=".$row["id_book"]."&idsubject=".$row["id_subject"]."'>Sửa</a></td>
<td><a href='javascript:del_confirm(\"del_book.php?id=".$row["id_book"]."\")'>Xóa</a></td>
<td><img src='./uploads/".$row["images"]."' width=100 height=100></td> -->