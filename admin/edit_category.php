<?php
require_once('includes/header_admin.php');
require_once('../includes/executeSQL.php');
if(isset($_GET['id']))
    $categorys = executeResult("SELECT * FROM theloai where ma_tloai = ".$_GET['id']);

?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
            <form action="process_add_category.php" method="post">
        
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                    <input type="text" class="form-control" name="ma_tloai" readonly value="<?=$categorys[0]['ma_tloai'] ?? '' ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                    <input type="text" class="form-control" name="ten_tloai" value="<?=$categorys[0]['ten_tloai'] ?? '' ?>">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" name = "btn" value="Lưu" class="btn btn-success">
                    <a href="category.php" class="btn btn-warning ">Quay lại</a>
                </div>
                <div class="form-group" style="color:red">
                    <?= $_GET['mess'] ?? ""?>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require_once('../includes/footer.php');
?>