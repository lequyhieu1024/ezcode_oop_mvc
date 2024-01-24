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
                <th scope="col">ID Khuyến Mãi</th>
                <th scope="col">Tên Khuyến Mãi</th>
                <th scope="col">Ngày bắt đầu</th>
                <th scope="col">Ngày kết thúc</th>
                <th scope="col">Nội dung khuyến mãi</th>
                <th scope="col">Ảnh</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($promotional as $row) :
                extract($row); ?>
                <tr>
                    <th scope="row"><?= $id_khuyen_mai ?></th>
                    <td><?= $ten_khuyen_mai ?></td>
                    <td><?= $ngay_bat_dau ?></td>
                    <td><?= $ngay_ket_thuc ?></td>
                    <td><?= $noi_dung ?>%</td>
                    <td><img style="width:100px" src="../../../public/images/<?= $avt ?>" alt=""></td>
                    <td><a href="index.php?url=edit-promotional&id=<?= $id_khuyen_mai; ?>"><button class="btn btn-warning">Sửa</button></a>
                        <a href="index.php?url=delete-promotional&id=<?= $id_khuyen_mai; ?>"><button class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>