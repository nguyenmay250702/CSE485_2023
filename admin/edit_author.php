<?php
require_once('includes/header_admin.php');
require_once('../includes/executeSQL.php');
if (isset($_GET['id']))
    $authors = executeResult("SELECT * FROM tacgia where ma_tgia = " . $_GET['id']);
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
            <form action="process_author.php" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                    <input type="text" class="form-control" name="ma_tgia" readonly
                        value="<?= $authors[0]['ma_tgia'] ?? '' ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                    <input type="text" class="form-control" name="ten_tgia" value="<?= $authors[0]['ten_tgia'] ?? '' ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName" style="width: 100px">Hình ảnh</span>
                    <input type="file" class="form-control" name="hinh_tgia">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" name="btn" value="lưu" class="btn btn-success">
                    <a href="author.php" class="btn btn-warning ">Quay lại</a>
                </div>
                <div class="form-group" style="color:red">
                    <?= $_GET['mess'] ?? "" ?>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require_once('../includes/footer.php');
?>