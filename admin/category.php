<?php
require_once('includes/header_admin.php');
require_once('../includes/executeSQL.php');

                // if(isset($_POST['them'])){
                //     echo "<pre>";
                //     print_r($_POST);
                //     $ten_tloai = $_POST['ten_tloai'];
                //     //  nếu k rỗng thì insert dữ liệu

                //     if(!empty($ten_tloai)){
                //         // insert dữ liệu
                //         echo "<pre>";
                //         print_r($_POST);
                //         $add_categorys = execute("INSERT INTO `theloai` (`ten_tloai`) VALUES('$ten_tloai')");
                //         echo "Thêm dữ liệu thành công";

                //     }else{
                //         echo "Bạn cần nhập đầy đủ thông tin";
                //     }
                // }

 ?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <a href="add_category.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên thể loại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $categorys = executeResult("SELECT * FROM theloai");
                        $dem = 1;
                        foreach($categorys as $category){
                            ?>
                             <tr>
                            <th scope="row"><?=$dem++ ?></th>    
                            <td><?= $category["ten_tloai"] ?></td>
                            <td>
                                <a href="edit_category.php?id=<?=$category['ma_tloai']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="process_add_category.php?btn=xoa&id=<?=$category['ma_tloai']?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
require_once('../includes/footer.php');
?>