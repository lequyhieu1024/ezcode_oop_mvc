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
                <th scope="col">ID Giảng Viên</th>
                <th scope="col">Mã Giảng Viên</th>
                <th scope="col">Tên Giảng Viên</th>
                <th scope="col">Email</th>
                <th scope="col">AVT</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Mô Tả</th>
                <th scope="col">Năm sinh</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($teachers as $row) :
                extract($row); ?>
                <tr>
                    <th scope="row"><?= $id_giang_vien ?></th>
                    <th scope="row"><?= $ma_giang_vien ?></th>
                    <td><?= $ten_giang_vien ?></td>
                    <td><?= $email ?></td>
                    <td><img style="width:100px;height:80px" src="../../../public/images/<?= $avt ?>" alt=""></td>
                    <td><?= $so_dien_thoai ?></td>
                    <td><?= $mo_ta ?></td>
                    <td><?= $nam_sinh ?></td>
                    <td><a href="index.php?url=edit-teacher&id=<?= $id_giang_vien; ?>"><button style="margin-bottom: 10px;" class="btn btn-warning">Sửa</button></a>
                        <a href="index.php?url=delete-teacher&id=<?= $id_giang_vien; ?>"><button style="margin-bottom: 10px;" class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>