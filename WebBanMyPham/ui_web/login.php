<?php
session_start();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Đăng nhập </title>
    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
</head>
<script>
    function checkLogin() {
        if (document.frmLogin.txtusername.value == "") {
            alert("Xin vui lòng nhập tài khoản");
            document.frmLogin.txtusername.focus();
            return;
        }
        if (document.frmLogin.txtpassword.value == "") {
            alert("Xin vui lòng nhập mật khẩu");
            document.frmLogin.txtpassword.focus();
            return;
        }
        document.frmLogin.submit();
    }
</script>
<?php
if (isset($_POST["txtusername"])) {
    include("./include/connect.inc");
    $username    =    $_POST["txtusername"];
    $password    =    ($_POST["txtpassword"]);

    $sql    =    "select *from tblcustomer where TaiKhoan='$username' and MatKhau='$password'";
    $rs        =    mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        while ($row = mysqli_fetch_array($rs)){
            $_SESSION["ID_User"]    =    $row["ID"];
        }
        header("location:index1.php");
    } else
        echo "<script>alert('Tài khoản hoặc mật khẩu không tồn tại!')</script>";
}
?>

<body>
    <center>
        <form name="frmLogin" method="post">
            <div class="panel panel-primary" style="width: 30%; margin-top: 100px;">
                <div class="panel-heading">
                    Đăng nhập
                </div>
                <!-- /.panel-heading -->
                <div>
                    <div>
                        <table class="table table-hover">

                            <tbody>
                                <tr>
                                    <td>Tài khoản</td>
                                    <td><input type="text" class="form-control" id="inputSuccess" name="txtusername"></td>

                                </tr>
                                <tr>
                                    <td>Mật khẩu</td>
                                    <td><input type="password" class="form-control" id="inputSuccess" name="txtpassword"></td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="button" class="btn btn-primary" onClick="checkLogin()">Đăng nhập</button>&nbsp;&nbsp;<button type="reset" class="btn btn-warning">Làm lại</button></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
</body>
</form>
</center>

</html>