<?php
session_start();
if ($_SESSION["ID_User"] != null)
    $ID_User    =    $_SESSION["ID_User"];
else
    header("location:login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mỹ Phẩm Xách Tay Cao Cấp</title>
    <style>
        body {
            font-family: arial;
        }

        .container {
            width: 1200px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 15px;

        }

        .container1 {
            width: 750px;
            margin: 0 auto;

            padding: 15px;
        }

        h1 {
            text-align: center;
        }

        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 15px;
        }
    </style>
</head>

<body>
    <?php
    include '../admin/include/connect.inc';
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    $error = false;
    if (isset($_GET['action'])) {
        function update_cart($add = false)
        {
            foreach ($_POST['quantity'] as $id => $quantyti) {
                // if ($add) {

                //     $_SESSION["cart"][$id] += $quantyti;
                // } else {
                //     $_SESSION["cart"][$id] = $quantyti;
                // }
                $_SESSION["cart"][$id] = $quantyti;
            }
        }
        switch ($_GET['action']) {
            case "add":
                update_cart(true);
                break;
            case "delete":
                if (isset($_GET['id'])) {
                    unset($_SESSION["cart"][$_GET['id']]);
                }
                //header('Location : ./giohang.php');
                break;
            case "submit":
                if (isset($_POST["update"])) { //cập nhật sản phẩm
                    // 
                    update_cart();
                    //var_dump($_POST);exit;
                } elseif (isset($_POST["order"])) { //đặt hàng 

                    if (empty($_POST['txtname'])) {
                        $error = "Bạn chưa nhập tên người nhận ";
                    } elseif (empty($_POST['txtphone'])) {
                        $error = "Bạn chưa nhập số điện thoại người nhận ";
                    } elseif (empty($_POST['txtaddtree'])) {
                        $error = "Bạn chưa nhập địa chỉ người nhận ";
                    }
                    if ($error == false && !empty($_POST['quantity'])) {
                        $products = mysqli_query($conn, "select * from tblproduct where ID in (" . implode(",", array_keys($_POST['quantity'])) . ")");
                        $total = 0;
                        $oderProduct = array();
                        while ($row = mysqli_fetch_array($products)) {
                            $oderProduct[] = $row;
                            $total += $row['DonGia'] * $_POST['quantity'][$row['ID']];
                        }
                        // INSERT INTO `tbloder` (`ID`, `HoTen`, `SoDienThoai`, `DiaChi`, `TongTien`, `created_time`, `last_updated`) VALUES (NULL, 'Nguyễn Văn A', '036123456789', 'Thủ Dầu một ', '800000', '111111', '1111');
                        $insertOder = mysqli_query($conn, "INSERT INTO `tbloder` (`ID`, `HoTen`, `SoDienThoai`, `DiaChi`, `TongTien`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['txtname'] . "', '" . $_POST['txtphone'] . "', '" . $_POST['txtaddtree'] . "', '" . $total . "', '" . time() . "', '" . time() . "');");
                        // var_dump($conn->insert_id);exit;
                        $oderID = $conn->insert_id;
                        $insertString = "";


                        foreach ($oderProduct as $key => $product) {
                            $insertString .=  "(NULL, '" . $oderID . "', '" . $product['ID'] . "', '" . $_POST['quantity'][$product['ID']] . "', '" . $product['DonGia'] . "', '" . time() . "', '" . time() . "')";
                            if ($key != count($oderProduct) - 1) {
                                $insertString .= ",";
                            }
                        }
                        // $insertString = "(NULL, '4', '3', '2', '1800000', '111111', '1111'),
                        // (NULL, '3', '4', '2', '2000000', '222222', '222222');";
                        //var_dump($insertString);exit;
                        //INSERT INTO `tbloder_detail` (`ID`, `id_oder`, `id_product`, `quantity`, `price`, `created_time`, `last_updated`) VALUES (NULL, '4', '3', '2', '1800000', '111111', '1111'), (NULL, '3', '4', '2', '2000000', '222222', '222222');
                        $insertOder = mysqli_query($conn, "INSERT INTO `tbloder_detail` (`ID`, `id_oder`, `id_product`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
                        $success = "Mua hàng thành công !";
                    }
                }
                break;
        }
    }
    if (!empty($_SESSION["cart"])) {
        // var_dump($_SESSION["cart"]);
        // exit;
        // var_dump(implode(",",array_keys($_SESSION["cart"])))
        $result = mysqli_query($conn, "select * from tblproduct where ID in (" . implode(",", array_keys($_SESSION["cart"])) . ")");
        // var_dump($result);exit;
    }
    ?>
    <div class="container" align="center">
        <?php if (!empty($error)) { ?> . <a href="giohang.php">Quay lại </a>
            <div><?= $error ?></div>
        <?php } elseif (!empty($success)) { ?> . <a href="index1.php">Tiếp tục mua </a>
            <div><?= $success ?></div>
        <?php } else { ?>
            <h1>Giỏ Hàng</h1>
            <form action="giohang.php?action=submit" method="POST">
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm </th>
                        <th>Hình minh họa </th>
                        <th>Số lượng </th>
                        <th>Thành tiền </th>
                        <th>Gía </th>
                        <th>Xóa</th>
                    </tr>
                    <?php
                    if (!empty($result)) {
                        $Sum = 0;
                        $num = 1;
                        while ($row = mysqli_fetch_array($result)) {

                    ?>
                            <tr>
                                <td><?= $num++; ?></td>
                                <td><?= $row["TenSP"]; ?> </td>
                                <td><img class="hinhsach" width="100" height="100" src="../admin/uploads/<?= $row["HinhMinhHoa"] ?> "></td>
                                <td><input type="text" value="<?= $_SESSION["cart"][$row["ID"]] ?>" name="quantity[<?= $row["ID"] ?>]" /> </td>
                                <td><?= $row["DonGia"] ?></td>
                                <td><?= $_SESSION["cart"][$row["ID"]] * $row["DonGia"] ?></td>
                                <td><a href="giohang.php?action=delete&id=<?= $row["ID"] ?>">Xóa</a></td>
                            </tr>
                        <?php
                            $num++;
                            $Sum += $_SESSION["cart"][$row["ID"]] * $row["DonGia"];
                        } ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>Tổng Tiền </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><?= $Sum ?></td>

                        </tr>
                    <?php

                    }

                    ?>

                </table>
                <div class="container1">
                    <input type="submit" name="update" value="Cập nhật" />

                </div>
                <div>
                    <table>
                        <tr>
                            <td>Tên Người nhận :</td>
                            <td><input class="form-control" name="txtname"></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại :</td>
                            <td><input class="form-control" name="txtphone"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ :</td>

                            <td> <textarea name="txtaddtree" cols="50" rows="8"></textarea></td>
                        </tr>
                    </table>
                </div>
                <div class="container1">
                    <input type="submit" name="order" value="Đặt hàng" />
                </div>
            </form>
        <?php } ?>


    </div>
</body>

</html>