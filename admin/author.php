<?php
require_once('includes/header_admin.php');
require_once('../includes/executeSQL.php');
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="add_author.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên tác giả</th>
                        <th scope="col">Hình ảnh</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $authors = executeResult("SELECT * FROM tacgia"); //mảng 2 chiều
                    $dem = 1;
                    foreach ($authors as $author) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?= $dem++ ?>
                            </th>
                            <td>
                                <?= $author["ten_tgia"] ?>
                            </td>
                            <td><img src="../images/songs/<?= $author["hinh_tgia"] ?>" alt=""
                                    style="width: 100px;"></td>
                            <td>
                                <a href="edit_author.php?id=<?= $author["ma_tgia"] ?>"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="process_author.php?btn=xoa&id=<?= $author["ma_tgia"] ?>"><i
                                        class="fa-solid fa-trash"></i></a>
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