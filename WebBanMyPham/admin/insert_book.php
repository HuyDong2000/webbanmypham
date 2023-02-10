<!-- <?php
        // session_start();
        // if(isset($_SESSION["username"]))
        // 	$username	=	$_SESSION["username"];
        // else
        // 	header("location:index.php");
        ?>  -->
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
    <script src="ckeditor/ckeditor.js"></script>
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
                    <!-- <div class="col-lg-12">

                        <button type="button" class="btn btn-success" style="margin-bottom: 20px" onClick="javascript:window.location.href='insert_book.php'">Thêm sản phẩm </button>

                    </div> -->

                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center">Thêm Sản Phẩm </h1>

                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <?php
                include "./include/connect.inc";
                if (isset($_POST["cbosubject"])) {
                    $id_subject        =    $_POST["cbosubject"];
                    $title            =    $_POST["txttitle"];
                    $price            =    $_POST["txtprice"];
                    $image            =    $_FILES["txtimages"]["name"];
                    $name_tmp        =    $_FILES["txtimages"]["tmp_name"];
                    $sql                =    "insert into tblproduct(TenSP, DonGia,  HinhMinhHoa, MaLoai)";
                    $sql                .=    " values('$title', $price, '$image', '$id_subject')";
                    $rs                 =    mysqli_query($conn, $sql);
                    if ($rs) {
                        move_uploaded_file($name_tmp, "./uploads/" . $image);
                        echo "<script>window.location.href='list_books.php'</script>";
                    } else
                        echo "<script>alert('Thêm sản phẩm không thành công')</script>";
                } else {
                    $sql            =    "select * from tblsectors";
                    $rs                =    mysqli_query($conn, $sql);
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <table class="table table-striped table-bordered table-hover" style="width:90%" align="center">
                        <tbody>
                            <tr>

                                <td>Tên loại hàng (*):</td>
                                <td><select class="form-control" name="cbosubject">
                                        <?php
                                        while ($row = mysqli_fetch_array($rs))
                                            echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                                        ?>

                                    </select></td>
                            </tr>
                            <tr>

                                <td>Tên sản phẩm :</td>
                                <td><input class="form-control" name="txttitle"></td>
                            </tr>
                            <tr>
                                <td>Giá:</td>
                                <td><input class="form-control" name="txtprice"></td>
                            </tr>
                            <tr>
                                <td>Hình :</td>
                                <td><input type="file" class="form-control" name="txtimages" id="fileField"></td>
                            </tr>
                            <tr>
                                <td>Mô tả  :</td>
                                <td><textarea name="txtaddtree" cols="50" rows="8"></textarea></td>
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
        <!-- /#page-wrapper -->
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            //CKEDITOR.replace('txtdes');
        </script>

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