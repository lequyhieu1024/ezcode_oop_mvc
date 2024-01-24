<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

    <table class="table">

        <thead>

            <tr>

                <th scope="col">Mã Bình Luận</th>
                <th scope="col">Tên Tài Khoản</th>
                <th scope="col">Tên Khóa Học</th>
                <th scope="col">Nội Dung</th>
                <th scope="col">Ngày Bình Luận</th>
                <th scope="col">Thao tác</th>
            </tr>

        </thead>

        <tbody>

            <?php
            foreach ($comment as $row) :
                extract($row); ?>
                <tr>
                    <th scope="row"><?= $id_binh_luan ?></th>
                    <td><?= $ten_tai_khoan ?></td>
                    <td><?= $ten_khoa_hoc ?></td>
                    <td><?= $noi_dung_binh_luan ?></td>
                    <td><?= $ngay_binh_luan ?></td>
                    <td><a href="index.php?url=delete-comment&id=<?= $id_binh_luan; ?>"><button class="btn btn-danger">Xóa</button></a></td>
                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</body>

</html>