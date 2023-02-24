<?php
require_once('../includes/executeSQL.php');

    if(isset($_POST['btn']) || isset($_GET['btn'])){
        if(isset($_POST['btn'])) $btn = $_POST['btn'];
        else $btn = $_GET['btn'];

        switch($btn){
            case 'Thêm':
                if(isset($_POST['ten_tloai']) && $_POST['ten_tloai'] != ""){
                    $ten = $_POST['ten_tloai'];
                    execute("INSERT INTO theloai (ten_tloai) VALUES('$ten')");
                    header("location:category.php");
                }
                else{
                    $mess = "tên thể loại không được bỏ trống";
                    header("location:add_category.php?mess=$mess");
                }
                break;
            case 'Lưu':

                break;
            case 'xóa':

                break;
            
        };
    }


 ?>