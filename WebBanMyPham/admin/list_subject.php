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
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách loại sản phẩm </h1>
                        <button type="button" class="btn btn-success" style="margin-bottom: 20px" onClick="javascript:window.location.href='insert_subject.php'">Thêm chủ đề</button>

                    </div>

                    <!-- /.col-lg-12 -->
                </div>

                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên loại sản phẩm </th>
                                <th>Sửa</th>
                                <th>Xóa </th>
                            </tr>
                        </thead>
                        <script>
                            function del_confirm(strlink) {
                                ok = confirm("Bạn có muốn xóa không?");
                                if (ok != 0)
                                    window.location.href = strlink;
                            }
                        </script>
                        <tbody <?php
                                include("./include/connect.inc");
                                $sql        =    "select * from tblsectors";
                                $rs         =    mysqli_query($conn, $sql);
                                $count        =    mysqli_num_rows($rs);
                                // Hiển thị
                                $pageSize = 5;
                                $pos         =    (!isset($_GET["page"])) ? 0 : ($_GET["page"] - 1) * $pageSize;
                                $sql        =    "select * from tblsectors limit $pos, $pageSize";
                                $rs         =    mysqli_query($conn, $sql);
                                $i            =    1;
                                while ($row = mysqli_fetch_array($rs)) {
                                    echo " <tr>
														<td>$i</td>
														<td>" . $row["TenLoai"] . "</td>
														<td><a href='edit_subject.php?id=" . $row["ID"] . "'>Sửa</a></td>
														<td><a href='javascript:del_confirm(\"del_subject.php?id=" . $row["ID"] . "\")'>Xóa</a></td>
														</tr>";
                                    $i++;
                                }
                                ?> <tr>
                            <th colspan="4">
                                <?php

                                for ($i = 1; $i <= ceil($count / $pageSize); $i++)
                                    echo "<a href='list_subjects.php?page=$i'>" . $i . "</a>&nbsp&nbsp";
                                ?>
                            </th>

                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
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
<!-- danh sách loại sản phẩm   -->