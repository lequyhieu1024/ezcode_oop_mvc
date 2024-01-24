<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 class="alert alert-primary">Lộ trình học</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Lộ Trình</th>
                <th scope="col">Thời Gian</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($stdTime as $row) :
                extract($row); ?>
                <tr>
                    <th scope="row"><?= $id_lo_trinh ?></th>
                    <td><?= $thoi_gian ?></td>
                    <td><a href="index.php?url=edit-study-time&id=<?= $id_lo_trinh ?>"><button class="btn btn-warning">Sửa</button></a>
                        <a href="index.php?url=delete-study-time&id=<?= $id_lo_trinh; ?>"><button class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>