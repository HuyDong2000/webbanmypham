<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mỹ Phẩm Xách Tay Cao Cấp</title>
    <link href="./CSDL.css" rel="stylesheet" type="text/css" />
    <style>
        .box1 {
            width: 225px;
            height: 200px;
            float: left;
            border: 1px solid #333;
            margin: 0px 3px;
            margin-top: 30px;
        }

        a {
            display: block;
            color: #000000;
            text-decoration: none;
            padding: 10px 10px;
        }
        
    </style>
</head>

<body>

    <div id="menu">
        <header>
            <img src="./image/Logo.png" width="972px" height="250px" />
            <div class="menu">
                <a href="dangki.html">Đăng Kí</a>
                <a href="login.php">Đăng Nhập</a>
                <a href="logout.php">Log out</a>
            </div>
        </header>
        <br />
        <nav>
            <ul class="bang">
                <li><a href="index.html"> TRANG CHỦ</a></li>
                <li><a href="gioithieu.html">GIỚI THIỆU</a></li>
                <li><a href="lienhe.html">LIÊN HỆ</a></li>
            </ul>
        </nav>

        <article>
            <br />
            <?php
            include "./include/connect.inc";
            //$id_subject	=	$_GET["id_subject"];
            $sql        =    "select * from tblproduct";
            $rs         =    mysqli_query($conn, $sql);
            $count        =    mysqli_num_rows($rs);
            if ($count > 0)
                while ($row = mysqli_fetch_array($rs)) {
            ?>
                <form action="giohang.php?action=add" method="POST">
                    <div class="box1">
                        <div align="center">
                            <p class="tensach"><a href="chitietsp.php?id=<?php echo $row["ID"] ?>"><?= $row["TenSP"] ?></a></p>
                            <img class="hinhsach" width="100" height="100" src="../admin/uploads/<?= $row["HinhMinhHoa"] ?> ">
                            <p class="dongia">Đơn giá:<span class="gia"><?= $row["DonGia"] ?> VNĐ</span></p>
                            <input type="text" name="quantity[<?= $row['ID'] ?>]" value="1" size="2" />
                            <input type="submit" name="submit" value="Chọn Mua" />
                        </div>
                    </div>
                </form>
            <?php }
            ?>
        </article>
        <aside>
            <div class="menu1">
                <h3>DANH MỤC SẢN PHẨM</h3>

                <div align="justify">
                    <ul style="list-style-image:url(./image/1.png)">
                        <?php
                        include("./include/connect.inc");
                        $sql        =    "select * from tblsectors";
                        $rs         =    mysqli_query($conn, $sql);
                        $count        =    mysqli_num_rows($rs);
                        // Hiển thị
                        while ($row = mysqli_fetch_array($rs)) {
                            echo " <tr >
                            <td><a href='chitietsanpham.php?id=" . $row["ID"] . "'>" . $row["TenLoai"] . "</a> <br/></td>
                            </tr>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <br />
            <div class="menu2" align="center">
                <h3>HỖ TRỢ TRỤC TUYẾN</h3>

                <p> Tư vấn 1</p>
                <a href="https://www.facebook.com/minhthi.phamthi.3"><img src="./image/Anh1.jpg" width="110px" height="150px" /></a>
                <p> Điện Thoại : 0982410285</p>
                <hr />
                <p> Tư vấn 2</p>
                <a href="https://www.facebook.com/thuykoy228"><img src="./image/Anh2.jpg" width="110px" height="150px" /></a>
                <p> Điện Thoại : 01245575485</p>
            </div>
            <div class="menu2" align="center">
                <h3>ĐỊA CHỈ SHOP</h3>
                <img src="Picture/icon2.png" />
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.1912367804384!2d105.83895221438584!3d20.984969986022055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac42a97e2edd%3A0x87d1ffa7c1a07403!2zODE3IEdp4bqjaSBQaMOzbmcsIEdpw6FwIELDoXQsIFRoYW5oIFh1w6JuLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1490108667149" width="260" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
                <br /><br /><br />
                <img src="Picture/log.png" width="260px" />
            </div>
        </aside>
        <footer align="center">
            <br />

            <marquee class="chuchay1">Nerver too late to be young</marquee>
            <div class="ketthuc"><a href="index.html">Mỹ Phẩm Xách Tay Uy Tín</a></div>
            <br />
            <b>Địa chỉ: Số 817 Giải Phóng, Hà Nội</b>
            <br />
            <br />
            <p>Hotline của shop: 0868 017117 ~ 0904 245355</p>
        </footer>
    </div>

</body>

</html>