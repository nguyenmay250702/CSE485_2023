<?php
$link_css_login = "";
require_once('includes/header.php');
require_once('includes/executeSQL.php');

$articles = executeResult('select baiviet.tieude, baiviet.ten_bhat, baiviet.tomtat, baiviet.noidung, baiviet.hinhanh, theloai.ten_tloai, tacgia.ten_tgia from baiviet, theloai, tacgia where baiviet.ma_bviet ='.$_GET['id_article'].' and baiviet.ma_tloai = theloai.ma_tloai and baiviet.ma_tgia=tacgia.ma_tgia;');

$path_img = ($articles[0]['hinhanh'] == "")? "default.jpg":$articles[0]['hinhanh'];
?>

<main class="container mt-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->

    <div class="row mb-5">
        <div class="col-sm-4">
            <img src="images/songs/<?= $path_img ?>" class="img-fluid" alt="...">
        </div>
        <div class="col-sm-8">
            <h5 class="card-title mb-2">
                <a href="" class="text-decoration-none"><?= $articles[0]['tieude'] ?></a>
            </h5>
            <p class="card-text"><span class=" fw-bold">Bài hát: </span><?= $articles[0]['ten_bhat'] ?></p>
            <p class="card-text"><span class=" fw-bold">Thể loại: </span><?= $articles[0]['ten_tloai'] ?></p>
            <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?= $articles[0]['tomtat'] ?></p>
            <p class="card-text"><span class=" fw-bold">Nội dung: </span><?= $articles[0]['noidung'] ?></p>
            <p class="card-text"><span class=" fw-bold">Tác giả: </span><?= $articles[0]['ten_tgia'] ?></p>

        </div>
    </div>
</main>
<?php
require_once('includes/footer.php');    //../css/style_login.css
?>