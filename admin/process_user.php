<?php
require_once('../includes/executeSQL.php');

if (isset($_GET['btn']) || isset($_POST['btn'])) {
    if (isset($_GET['btn']))
        $btn = $_GET['btn'];
    else
        $btn = $_POST['btn'];

    $id_user = $_POST['id_user'] ?? "";
    $user = $_POST['user'] ?? "";
    $pass = $_POST['pass'] ?? "";

    switch ($btn) {
        case 'thêm':
            if ($user != "" && $pass != "") {
                execute("INSERT INTO `nguoidung`(`ma_ndung`, `username`, `password`) VALUES (null,'$user','$pass')");
                header("location:user.php");
            } else {
                $mess = "username và password không được bỏ trống";
                header("location:add_user.php?u1=$user&p1=$pass&notification=$mess");
            }
            break;
        case 'sửa':
            if ($user != "" && $pass != "") {
                execute("UPDATE nguoidung SET `username` = '$user', `password` = '$pass' where ma_ndung = '$id_user'");
                header("location:user.php");
            } else {
                $mess = "username và password không được bỏ trống";
                header("location:add_user.php?u1=$user&p1=$pass&notification=$mess");
            }
            break;
        case 'xóa':
            execute('delete from nguoidung where ma_ndung = "' . $_GET['id'] . '"');
            header("location:user.php");
            break;
    }
}
?>