<?php
require_once('executeSQL.php');
session_start();

if (isset($_POST['btn'])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    switch ($_POST['btn']) {
        case 'login':
            $result = executeResult('select * from nguoidung where username ="' . $user . '" and password = "' . $pass . '"');

            if (count($result) > 0) {
                if (isset($_POST['save_pass'])) {
                    setcookie('tennguoidung', $user, time() + 3600, '/', '', 0, 0);
                    setcookie('matkhau', $pass, time() + 3600, '/', '', 0, 0);
                }
                $_SESSION['login']=$user;
                header("location:../admin/index.php");
            } else {
                $mess = "tài khoản không tồn tại. Vui lòng kiểm tra lại thông tin đăng nhập";
                header("location:../login.php?notification=".$mess);
            }
            break;
        case 'register':
            if (trim($user) != "" and trim($pass) != "") {
                execute("INSERT INTO `nguoidung`(`ma_ndung`, `username`, `password`) VALUES (null,'$user','$pass')");
                header("location:../login.php");
            } else {
                $mess = "không được bỏ trống username và password";
                header("location:../register.php?notification=$mess");
            }
            break;
    }
}
?>