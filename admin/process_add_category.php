<?php
require_once('../includes/executeSQL.php');

    if(isset($_POST['btn']) || isset($_GET['btn'])){
        if(isset($_POST['btn'])) $btn = $_POST['btn'];
        else $btn = $_GET['btn'];

        switch($btn){
            case 'Thêm':
                if(isset($_POST['ten_tloai']) && $_POST['ten_tloai'] != ""){
                    $ten_tloai = $_POST['ten_tloai'];
                    execute("INSERT INTO theloai (ten_tloai) VALUES('$ten_tloai')");
                    header("location:category.php");
                }
                else{
                    $mess = "Bạn chưa nhập đầy đủ thông tin";
                    header("location:add_category.php?mess=$mess");
                }
                break;
            case 'Lưu':
                if(isset($_POST['ten_tloai']) && $_POST['ten_tloai'] != ""){
                    $ten_tloai = $_POST['ten_tloai'];
                    $ma_tloai = $_POST['ma_tloai'];
                    execute("UPDATE theloai SET ten_tloai = '$ten_tloai' where ma_tloai=$ma_tloai");
                    header("location:category.php");
                }
                else{
                    $mess = "Bạn chưa nhập đầy đủ thông tin";
                    header("location:edit_category.php?mess=$mess");
                }

                break;
            case 'xóa':
                execute("DELETE FROM theloai WHERE ma_tloai='".$_GET['id']."'");
                 header("location:category.php");
                break;
            
        };
    }


 ?>