  <?php
require_once('includes/header_admin.php');
require_once('../includes/executeSQL.php');
?> 
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">THÊM MỚI BÀI VIẾT</h3>
            <h5 style="color:red"><?= $_GET['mess'] ?? ""?></h5>
            <form action="process_add_article.php" method="post" enctyle="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName" style="width: 120px;">Tiêu đề </span>
                    <input type="text" class="form-control" name="tieude">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName1" style="width: 120px;">Tên bài hát</span>
                    <input type="text" class="form-control" name="ten_bhat">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId1" style="width: 120px;">Tên thể loại</span>
                    <select name="ten_tloai" id="cars" class="form-control" >
                    <?php
                        $categorys=executeResult(" select * from theloai");
                        foreach($categorys as $category){
                        ?>
                        <option value="<?= $category['ten_tloai']?>"><?=$category['ten_tloai']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId1" style="width: 120px;">Tên tác giả</span>
                    <select name="ten_tgia" id="cars" class="form-control" >
                    <?php
                        $authors=executeResult(" select * from tacgia");
                        foreach($authors as $author){
                        ?>
                        <option value="<?= $author['ten_tgia']?>"><?=$author['ten_tgia']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="input-group mt-3 mb-3">
                <span class="input-group-text" id="lblCatId1" style="width: 120px;">Tóm tắt</span>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tomtat"></textarea>
                </div>
                <div class="input-group mt-3 mb-3">
                <span class="input-group-text" id="lblCatId1" style="width: 120px;">Nội dung</span>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="noidung"></textarea>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId1" style="width: 120px;">Thêm hình ảnh</span>
                    <!-- <label for="image"><b>Upload file:</b></label> -->
                    <input type="file" class="form-control m-3" name="hinhanh" accept="image/*" id="image"><br> 
                    <input type="submit" class="form-control m-3" value="upload">
                
                </div>

                <?php
                $message = '';                            
                $moved   = false; 

                if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                    if ($_FILES['image']['error'] === 0) {  
                        $temp = $_FILES['image']['tmp_name'];
                        $path = 'uploads/' . $_FILES['image']['name'];
                        
                        $moved = move_uploaded_file($temp, $path);
                    }

                    if ($moved === true) { 
                        $message = '<img src="' . $path . '">';
                    } else {               
                        $message = 'The file could not be saved.';
                    }
                }
                ?>
                <div class="form-group  float-end ">
                    <input name="btn" type="submit" value="thêm" class="btn btn-success">
                    <a href="article.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require_once('../includes/footer.php');
?>