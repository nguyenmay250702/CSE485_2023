<?php
require_once('../includes/executeSQL.php');
$ten_tloai = $_POST['ten_tloai'] ?? "";

if (isset($_POST['btn']) || isset($_GET['btn'])) {
    if (isset($_POST['btn']))
        $btn = $_POST['btn'];
    else
        $btn = $_GET['btn'];

    switch ($btn) {
        case 'Thêm':
            if (!empty(trim($_POST['ten_tloai']))) {
                execute("INSERT INTO theloai (ten_tloai) VALUES('$ten_tloai')");
                header("location:category.php");
            } else {
                $mess = "Bạn chưa nhập đầy đủ thông tin";
                header("location:add_category.php?mess=$mess");
            }
            break;
        case 'Lưu':
            $ma_tloai = $_POST['ma_tloai'];
            if (!empty(trim($_POST['ten_tloai']))) {
                execute("UPDATE theloai SET ten_tloai = '$ten_tloai' where ma_tloai=$ma_tloai");
                header("location:category.php");
            } else {
                $mess = "Bạn chưa nhập đầy đủ thông tin";
                header("location:edit_category.php?id=$ma_tloai&mess=$mess");
            }
            break;
        case 'xóa':
            $ma_tloai = $_GET['id'];
            $baiviet = executeResult("select * from baiviet where ma_tloai = '$ma_tloai'");
            if (count($baiviet) == 0) {
                execute("DELETE FROM theloai WHERE ma_tloai='" . $ma_tloai . "'");
                header("location:category.php");
            } else {
                echo '<div>Bạn cần xóa bài viết có <br>';
                foreach ($baiviet as $bv) {
                    echo 'id=' . $bv['ma_bviet'] . '</div><br>';
                }
                echo 'Trước khi xóa thể loại có mã =' . $baiviet[0]['ma_tloai'] . ';<br>
                <a href="article.php"style="display: inline-block; background: darkkhaki; text-decoration: none; border-radius: 6px; padding: 5px;" >OK</a>';
            }
            break;
    }
    ;
}
?>