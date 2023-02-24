<?php
require_once('includes/header_admin.php');
require_once('../includes/executeSQL.php');

?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <a href="add_user.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">username</th>
                        <th scope="col">password</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = executeResult('select * from nguoidung');
                    if (count($users) > 0) {
                        $dem = 1;
                        foreach ($users as $user) {
                            ?>
                            <tr>
                                <th scope="row"><?= $dem++ ?></th>
                                <td>
                                    <?= $user['username'] ?>
                                </td>
                                <td>
                                    <?= $user['password'] ?>
                                </td>
                                <td>
                                    <a href="edit_user.php?id=<?= $user['ma_ndung'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td>
                                    <a href="process_user.php?btn=xóa&id=<?= $user['ma_ndung'] ?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
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