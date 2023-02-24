<?php
require_once('includes/header_admin.php');
require_once('../includes/executeSQL.php');

$users = executeResult('select * from nguoidung where ma_ndung = '.$_GET['id']);

?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin người dùng</h3>
            <form action="process_user.php" method="post">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Mã người dùng</span>
                    <input type="text" class="form-control" name="id_user" readonly value="<?= $users[0]['ma_ndung'] ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">username</span>
                    <input type="text" class="form-control" name="user" value="<?= $users[0]['username'] ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">password</span>
                    <input type="text" class="form-control" name="pass" value="<?= $users[0]['password'] ?>">
                </div>

                <div class="input-group mt-3 mb-3" style="color: #ab0000; font-size: 15px; margin:10px;font-style: italic;">
                    <?= $_GET['notification'] ?? "" ?>
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" name="btn" value="sửa" class="btn btn-success">
                    <a href="user.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require_once('../includes/footer.php');
?>