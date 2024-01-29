@extends('admin.layout.masterLayout')
@section('content')    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Đánh Giá</th>
                <th scope="col">Tên Tài Khoản</th>
                <th scope="col">Tên Khóa Học</th>
                <th scope="col">Đánh Giá</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rate as $row) :
                extract($row); ?>
                <tr>
                    <th scope="row"><?= $id_danh_gia ?></th>
                    <td><?= $ten_tai_khoan ?></td>
                    <td><?= $ten_khoa_hoc ?></td>
                    <td><?= $danh_gia ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
@endsection