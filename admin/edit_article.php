<?php
require_once('includes/header_admin.php');
require_once('../includes/executeSQL.php');

// $articles = executeResult("select * from baiviet where ma_bviet = ".$_GET['id'] ); //list = article = mảng 2 chiều
if(isset($_GET['id']))
    $articles = executeResult("select * from baiviet where ma_bviet = ".$_GET['id'] ); //list = article = mảng 2 chiều
   
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">SỬA THÔNG TIN BÀI VIẾT</h3>
            <form action="process_add_article.php" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId" style="width:120px;">Mã bài viết</span>
                    <input type="text" class="form-control" name="ma_bviet" readonly value="<?=$articles[0]['ma_bviet'] ?? ''?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName" style="width: 120px;">Tiêu đề </span>
                    <input type="text" class="form-control" name="tieude" value="<?=$articles[0]['tieude']  ?? '' ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName1" style="width: 120px;">Tên bài hát</span>
                    <input type="text" class="form-control" name="ten_bhat" value="<?=$articles[0]['ten_bhat']   ?? ''?> ">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId1" style="width: 120px;">Tên thể loại</span>
                    <select name="ten_tloai" id="cars" class="form-control">
                        <?php
                        $categorys = executeResult(" select * from theloai");
                        foreach ($categorys as $category) {
                            ?>
                            <option value="<?= $category['ten_tloai'] ?>" <?php
                              if ($articles[0]['ma_tloai'] == $category['ma_tloai'])
                                  echo 'selected' ?>><?=
                                  $category['ten_tloai'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId1" style="width: 120px;">Tên tác giả</span>
                    <select name="ten_tgia" id="cars" class="form-control">
                        <?php
                        $authors = executeResult(" select * from tacgia");
                        foreach ($authors as $author) {
                            ?>
                            <option value="<?= $author['ten_tgia'] ?>" <?php if ($articles[0]['ma_tgia'] == $author['ma_tgia'])
                                  echo 'selected' ?>><?= $author['ten_tgia'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>


                <div class="input-group mt-3 mb-3">
                <span class="input-group-text" id="lblCatId1" style="width: 120px;">Sửa thông tin <br> tóm tắt</span>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tomtat"><?=$articles[0]['tomtat'] ?? ''?></textarea>
                </div>
                <div class="input-group mt-3 mb-3">
                <span class="input-group-text" id="lblCatId1" style="width: 120px;">Sửa nội dung</span>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="noidung" ><?=$articles[0]['noidung'] ?? ''?></textarea>
                </div>

                <div style="width:20%; margin:auto;"><img src="../images/songs/<?= $articles[0]['hinhanh'] ?? ''?>"
                        alt="chưa có hình ảnh" style="width: 100%; border: 4px solid #1c16c1;">
                        <span><?= $articles[0]['hinhanh'] ?? "" ?></span>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId1"style="width: 120px;">Sửa hình ảnh</span>
                    <input type="file"class="form-control m-3" name="hinhanh" id="image"
                        value="<?= $articles[0]['hinhanh'] ?? '' ?> "><br>
                </div>
                <div class="form-group float-end ">
                    <input type="submit" name="btn" value="lưu" class="btn btn-success">
                    <a href="article.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require_once('../includes/footer.php');
?>