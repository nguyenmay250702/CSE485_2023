<?php
require_once('../includes/executeSQL.php');

$extensions = ['png', 'jpg'];

$ten_tgia = $_POST['ten_tgia'] ?? ""; //nếu $_POST['ten_tgia'] tồn tại thì $ten_tgia = $_POST['ten_tgia'] nếu không $ten_tgia = ""

$hinh_tgia = $_FILES['hinh_tgia']['name'] ?? ""; //lấy ra tên file, vd: picachu.png
$ext = pathinfo($hinh_tgia, PATHINFO_EXTENSION); // Get extension (lấy ra đuôi file), vd: .png, .jpg

if (isset($_POST['btn']) || isset($_GET['btn'])) {
    if (isset($_POST['btn']))
        $btn = $_POST['btn'];
    else
        $btn = $_GET['btn'];

    switch ($btn) {
        case 'thêm':
            if (!empty(trim($ten_tgia))) {
                if (!empty($hinh_tgia)) {
                    if (in_array($ext, $extensions)) {
                        move_uploaded_file($_FILES['hinh_tgia']['tmp_name'], '../images/songs/' . $hinh_tgia);
                        execute("INSERT INTO `tacgia` (`ten_tgia`, `hinh_tgia`) VALUES ('$ten_tgia', '$hinh_tgia')");
                        header("location:author.php");
                    } else {
                        $mess = "Hình ảnh chỉ nhận file: .png, .jpg";
                        header("location:add_author.php?mess=$mess");
                    }
                } else {
                    execute("INSERT INTO `tacgia` (`ten_tgia`, `hinh_tgia`) VALUES ('$ten_tgia', '$hinh_tgia')");
                    header("location:author.php");
                }
            } else {
                $mess = "Vui lòng kiểm tra lại thông tin. Tên tác giả không được bỏ trống.";
                header("location:add_author.php?mess=$mess");
            }
            break;
        case 'lưu':
            $ma_tgia = $_POST['ma_tgia']; //ở from sửa gửi sang
            if (!empty(trim($ten_tgia))) {
                if (!empty($hinh_tgia)) {
                    if (in_array($ext, $extensions)) {
                        move_uploaded_file($_FILES['hinh_tgia']['tmp_name'], '../images/songs/' . $hinh_tgia);
                        execute("UPDATE `tacgia` SET `ten_tgia`='$ten_tgia',`hinh_tgia`='$hinh_tgia' WHERE ma_tgia=$ma_tgia");
                        header("location:author.php");
                    } else {
                        $mess = "Hình ảnh chỉ nhận file: .png, .jpg";
                        header("location:edit_author.php?id=$ma_tgia&mess=$mess");
                    }
                } else {
                    execute("UPDATE `tacgia` SET `ten_tgia`='$ten_tgia' WHERE ma_tgia=$ma_tgia");
                    header("location:author.php");
                }
            } else {
                $mess = "Vui lòng kiểm tra lại thông tin. Tên tác giả không được bỏ trống.";
                header("location:edit_author.php?id=$ma_tgia&mess=$mess");
            }
            break;
        case 'xoa':
            $ma_tgia = $_GET['id'];
            $baiviet = executeResult("select * from baiviet where ma_tgia = '$ma_tgia'");
            if (count($baiviet) == 0) {
                execute("DELETE FROM `tacgia` WHERE `ma_tgia`='$ma_tgia'");
                header("location:author.php");
            } else {
                echo '<div>Bạn cần xóa bài viết có <br>';
                foreach ($baiviet as $bv) {
                    echo 'id=' . $bv['ma_bviet'] . '</div><br>';
                }
                echo 'Trước khi xóa tác giả có mã='.$baiviet[0]['ma_tgia'].';<br>
                <a href="article.php"style="display: inline-block; background: darkkhaki; text-decoration: none; border-radius: 6px; padding: 5px;" >OK</a>';
            }
            break;
    }
    ;
}
?>