<?php
require_once('includes/header_admin.php');
require_once('../includes/executeSQL.php');

?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <a href="add_article.php?" class="btn btn-success">THÊM MỚI BÀI VIẾT</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">TÊN BÀI VIẾT(Tiêu đề)</th>
                        <th>SỬA</th>
                        <th>XÓA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $count = 1;
                        $articles = executeResult("select * from baiviet" ); //list = article = mảng 2 chiều
                        foreach($articles as $article){
                            ?>
                        <tr>
                        <th scope="row">
                            <?= $count++ ?>
                        </th>
                        <td><?= $article['tieude'] ?></td>
                        <td>
                            <a href="edit_article.php?id=<?=$article['ma_bviet']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                        <a href="process_add_article.php?btn=xoa&id=<?=$article['ma_bviet']?>"><i class="fa-solid fa-trash"></i></a>
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