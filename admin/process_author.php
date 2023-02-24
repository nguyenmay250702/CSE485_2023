<?php
require_once('../includes/executeSQL.php');
// $ten_tgia = $_POST['ten_tgia'];
// $hinh_tgia = $_POST['hinh_tgia'];
// $ma_tgia = $_POST['ma_tgia'];
    if(isset($_POST['btn']) || isset($_GET['btn'])){
        if(isset($_POST['btn'])) $btn = $_POST['btn'];
        else $btn = $_GET['btn'];
        // $ten_tgia = $_POST['ten_tgia'];
        // $hinh_tgia = $_POST['hinh_tgia'];
        // $ma_tgia = $_POST['ma_tgia'];

        switch($btn){
            case 'thêm':
                $ten_tgia = $_POST['ten_tgia'];
                $hinh_tgia = $_FILES['hinh_tgia']['name'];
                $hinh_tgia_tmp = $_FILES['hinh_tgia']['tmp_name'];
                // if((isset($ten_tgia, $hinh_tgia) && !empty($ten_tgia))){
                if( !empty($ten_tgia)){
                    //execute("INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES('$ten_tgia', '$hinh_tgia')");
                    execute("INSERT INTO `tacgia` (`ten_tgia`, `hinh_tgia`) VALUES ('$ten_tgia', '$hinh_tgia')");
                    move_uploaded_file($hinh_tgia_tmp,'../images/songs/'.$hinh_tgia);
                    header("location:author.php");
                }
                else{
                    $mess = "tên tác giả không được bỏ trống";
                    header("location:add_author.php?mess=$mess");
                }
                break;
            case 'lưu':
                $ten_tgia = $_POST['ten_tgia'];
                $hinh_tgia = $_FILES['hinh_tgia']['name'];
                $hinh_tgia_tmp = $_FILES['hinh_tgia']['tmp_name'];
                $ma_tgia = $_POST['ma_tgia'];
                if( !empty($ten_tgia)){
                    //execute("UPDATE tacgia SET ten_tgia = '$ten_tgia', hinh_tgia = '$hinh_tgia' where ma_tgia=$ma_tgia");
                    execute("UPDATE `tacgia` SET `ten_tgia`='$ten_tgia',`hinh_tgia`='$hinh_tgia' WHERE ma_tgia=$ma_tgia");
                    move_uploaded_file($hinh_tgia_tmp, '../images/songs/'.$hinh_tgia);
                    header("location:author.php");
                }
                else{
                    $mess = "Bạn chưa nhập đầy đủ thông tin";
                    header("location:edit_author.php?mess=$mess");
                }
                break;
            case 'xóa':                      
                 $ma_tgia = $_GET['id'];   
                execute("DELETE FROM `tacgia` WHERE `ma_tgia`='$ma_tgia'");
                header("location:author.php");
                break;
            
        };
    }


 ?>