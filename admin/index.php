<?php
session_start();
if(!isset($_SESSION['login'])) header('location:../login.php');

require_once('includes/header_admin.php');
require_once('../includes/executeSQL.php');

?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Người dùng</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?= executeResult('SELECT COUNT(ma_ndung) as number_user from nguoidung;')[0]['number_user'] ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Thể loại</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?= executeResult('SELECT COUNT(ma_tloai) as number_category from theloai;')[0]['number_category'] ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Tác giả</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?= executeResult('SELECT COUNT(ma_tgia) as number_author from tacgia;')[0]['number_author'] ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Bài viết</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?= executeResult('SELECT COUNT(ma_bviet) as number_article from baiviet;')[0]['number_article'] ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once('../includes/footer.php');
?>