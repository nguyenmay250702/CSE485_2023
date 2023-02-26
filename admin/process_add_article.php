<?php 

    require_once('../includes/executeSQL.php'); 
   $tieude=$_POST["tieude"] ?? '' ;
   $ten_bhat=$_POST["ten_bhat"] ?? '';
   $ten_tloai=$_POST["ten_tloai"] ?? '';
   $ten_tgia=$_POST["ten_tgia"] ?? '';
   $tomtat=$_POST["tomtat"] ?? '';
   $noidung=$_POST["noidung"] ?? '';
   $hinhanh=$_POST["hinhanh"]["name"] ?? "";
   $ma_bviet=$_POST["ma_bviet"] ?? '';
   if(isset($_POST['btn']) || isset($_GET['btn'])){
        if(isset($_POST['btn'])) 
            $btn = $_POST['btn'];
        else 
            $btn = $_GET['btn'];
    
        switch($btn){
                case 'thêm':
                    if((!empty($tieude)&&!empty($ten_bhat)&&!empty($ten_tloai)&&!empty($ten_tgia)&&!empty($tomtat))){
                            $ma_tloai = executeResult("select * from theloai where ten_tloai = '$ten_tloai'")[0]['ma_tloai'];
                            $ma_tgia = executeResult("select * from tacgia where ten_tgia = '$ten_tgia'")[0]['ma_tgia'];

                            
                            execute("INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, hinhanh) VALUES
                            ('$tieude','$ten_bhat','$ma_tloai','$tomtat','$noidung','$ma_tgia','$hinhanh')
                            ");
                            move_uploaded_file($_FILES['hinhanh']['tmp_name'],'../images/songs.$hinhanh');
                            header("location:article.php");

                    }else{
                        $mess = "Bạn vui lòng nhập đầy đủ thông tin";
                        header("location:add_article.php?mess=$mess");
                        }
                    break;
                    case 'lưu':
                        if (!empty($tieude) && !empty($ten_bhat) && !empty($ten_tloai) && !empty($ten_tgia) && !empty($tomtat)) {
                            $ma_tloai = executeResult("select * from theloai where ten_tloai = '$ten_tloai'")[0]['ma_tloai'];
                            $ma_tgia = executeResult("select * from tacgia where ten_tgia = '$ten_tgia'")[0]['ma_tgia'];
                            execute("UPDATE baiviet SET tieude='$tieude',ten_bhat='$ten_bhat',
                            ma_tloai='$ma_tloai',tomtat='$tomtat', noidung='$noidung',
                            ma_tgia='$ma_tgia',hinhanh='$hinhanh' WHERE baiviet.ma_bviet = '$ma_bviet';");
                            
                            //upload ảnh vào trong thư mục
                            move_uploaded_file($_FILES['hinhanh']['tmp_name'],'../images/songs/'.$hinhanh);
            
                            header("location:article.php");
                        } else {
                            $mess = "Bạn vui lòng nhập đầy đủ thông tin";
                            header("location:add_article.php?mess=$mess");
                        }
                        break;
                case 'xoa':
                    $ma_bviet=$_GET['id'];
                    // if((isset($tieude,$ten_bhat,$ma_tloai,$ma_tgia,$tomtat,$noidung,$hinhanh))){

                            execute("DELETE FROM baiviet WHERE ma_bviet='$ma_bviet' ");
                            header("location:article.php");

                    // }else{
                    //     $mess = "Bạn vui lòng nhập đầy đủ thông tin";
                    //     header("location:edit_article.php?mess=$mess");
                    //     }
    
                    break;

        }


        // if(isset($_POST['btn'])) $btn = $_POST['btn'];
        // else $btn = $_GET['btn'];

        // switch($btn){
        //     case 'thêm':
        //         if(isset($_POST['ten_tloai']) && $_POST['ten_tloai'] != ""){
        //             $ten = $_POST['ten_tloai'];
        //             execute("INSERT INTO theloai (ten_tloai) VALUES('$ten')");
        //             header("location:category.php");
        //         }
        //         else{
        //             $mess = "tên thể loại không được bỏ trống";
        //             header("location:add_category.php?mess=$mess");
        //         }
        //         break;
        //     case 'lưu':

        //         break;
        //     case 'xóa':

        //         break;
}
// if(!empty($tieude)&&!empty($ten_bhat)&&!empty($ma_tloai)&&!empty($tomtat)&&!empty($ma_tgia)){
//     $add_articles = execute("INSERT INTO `baiviet` (`tieude`, `ten_bhat`, `ma_tloai`, `tomtat`, `noidung`, `ma_tgia`, `hinhanh`) VALUES
//     ('$tieude','$ten_bhat','$ma_tloai','$tomtat','$noidung','$ma_tgia','$hinhanh')
//     ");
//     header("location:article.php");

// }else{
// $mess = "Bạn vui lòng nhập đầy đủ thông tin";
// header("location:add_article.php?mess=$mess");
// }

?>