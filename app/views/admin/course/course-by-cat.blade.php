@extends('admin.layout.masterLayout')
@section('content')
     <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã Khóa Học</th>
                <th scope="col">Tên Khóa Học</th>
                <th scope="col">AVT</th>
                <th scope="col">Tiền Học</th>
                <th scope="col">Mô Tả</th>
                <th scope="col">Số Lượt Xem</th>
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
                    <td><a href=""><button class="btn btn-warning">Sửa</button></a>
                        <a href="index.php?act=delete&id_danh_muc=<?= $id_danh_muc; ?>"><button class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
@endsection
   