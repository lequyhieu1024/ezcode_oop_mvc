@extends('admin.layout.masterLayout')
@section('content')
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
                <th scope="col">Mã Khóa Học</th>
                <th scope="col">Tên Khóa Học</th>
                <th scope="col">AVT</th>
                <th scope="col">Tiền Học</th>
                <th scope="col">Mô Tả</th>
                <th scope="col">Lượt Xem</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Mã Giảng Viên</th>
                <th scope="col">Danh Mục</th>
                <th scope="col">Slideshow</th>
                <th scope="col">Điểm TB</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($course as $row) :
                extract($row); ?>
                <tr>
                    <th scope="row"><?= $id_khoa_hoc ?></th>
                    <td><?= $ten_khoa_hoc ?></td>
                    <td><img style="width:100px;height:80px" src="<?= PATH_IMG. $avt ?>" alt=""></td>
                    <td><?= $tien_hoc ?></td>
                    <td>
                        <p style="height: 100px; overflow: auto;"><?php echo nl2br($mo_ta) ?></p>
                    </td>
                    <td><?= $so_luot_xem ?></td>
                    <td><?= $trang_thai ?></td>
                    <td><?= $ma_giang_vien ?></td>
                    <td><?= $ten_danh_muc ?></td>
                    <td><?= $slideshow ?></td>
                    <td><?php if ($avg_rate != "") : echo number_format($avg_rate, 1);
                        else : echo "Chưa có";
                        endif; ?> <i class="fa fa-star" style="color: #f5cd3d;"></i> </td>
                    <td><a href="<?=BASE_URL?>admin/courses/edit-course/<?= $id_khoa_hoc; ?>"><button style="margin-bottom: 10px;" class="btn btn-warning">Sửa</button></a>
                        <a href="<?=BASE_URL?>admin/courses/delete-course/<?= $id_khoa_hoc; ?>"><button style="margin-bottom: 10px;" class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
@endsection