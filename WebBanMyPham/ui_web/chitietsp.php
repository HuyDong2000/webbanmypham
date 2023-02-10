<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mỹ Phẩm Xách Tay Cao Cấp</title>
    <link href="./CSDL.css" rel="stylesheet" type="text/css" />
    <style>
        .lh {
            font-weight: bold;
        }

        .lh2 {
            color: #551aa8;
        }

        .lh3 {
            color: #808080;
        }

        .lh1 {
            color: #ff0000;
        }

        article ul li {
            margin-left: 40px;
            margin-bottom: 15px;
            color: #F00;
        }

        h2 {
            color: #808080;
            text-align: center;
            font-style: italic;
        }
        P{
            font-size: 20px;
        }
    </style>
</head>

<body>
<div id="menu">
    <header>
        <img src="./image/Logo.png" width="972px" height="250px" />
        <div class="menu">
            <a href="dangki.html">Đăng Kí</a>
            <a href="dangnhap.html">Đăng Nhập</a>
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
        <br />
        <div class="main">
            <?php
            include "./include/connect.inc";
            //$id_subject	=	$_GET["id_subject"];
            $sql        =    "select * from tblproduct where ID =" . $_GET["id"];
            $rs         =    mysqli_query($conn, $sql);
            $count        =    mysqli_num_rows($rs);
            if ($count > 0)
                while ($row = mysqli_fetch_array($rs)) {
            ?>
                <form action="giohang.php?action=add" method="POST">
                    <div align="center">

                        <table align="center">
                            <tr>
                                <td>
                                    <p class="tensach"><?= $row["TenSP"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td> <img class="hinhsach" width="200" height="250" src="../admin/uploads/<?= $row["HinhMinhHoa"] ?> "></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="dongia">Đơn giá:<span class="gia"><?= $row["DonGia"] ?> VNĐ</span></p>
                                    <input type="text" name="quantity[<?= $row['ID'] ?>]" value="1" size="2" />
                                </td>
                            </tr>
                            <tr>
                                <td> <input type="submit" name="submit" value="Chọn Mua" /></td>
                            </tr>
                        </table>

                    </div>
                    <br />
                    <br />
                    <div class="article1">
                        <div align="center" class="lh">
                            <a class="lh1">Xin liên hệ ngay với</a> <a class="lh2">Mỹ Phẩm Xách Tay Cao Cấp</a> <a class="lh1"> để biết thêm thông tin về giá cả sản phẩm:</a><br />
                            <a class="lh3">Điện thoại:</a><a class="lh1"> 0868 017117 ~ 0904 245355;</a><br />
                            <a class="lh3">Facebook:</a><a class="lh1"> Phạm Thị Minh Thi</a>
                        </div><br />
                        <ul style="list-style:circle">
                            <li> Quý khách nhận hàng mới thanh toán tiền; </li>
                            <li> Giao hàng trực tiếp với Khách hàng tại Hà Nội;</li>
                            <li> Khách hàng ở tỉnh khác chúng tôi sẽ chuyển phát nhanh theo đường bưu điện;</li>
                            <li>Miễn phí toàn bộ cước vận chuyển đối với khách hàng mua lẻ trên toàn quốc.</li>
                        </ul>
                        <h2>***Trân trọng cảm ơn sự quan tâm của quý khách hàng***</h2>
                    </div>

                </form>
            <?php }
            else
                echo "<center><h1 style='margin-top:30px; font-size:30px; color:red'>Hiện tại không có sản phẩm trong danh mục này!</h1></center>";
            ?>
        </div>

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
 </div>

</body>

</html>