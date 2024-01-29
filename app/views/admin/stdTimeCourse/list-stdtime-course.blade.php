@extends('admin.layout.masterLayout')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Lộ Trình Khóa Học</th>
                <th scope="col">ID Khóa Học</th>
                <th scope="col">ID Lộ Trình</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list as $row) :
                extract($row); ?>
                <tr>
                    <th scope="row"><?= $id_ltkh ?></th>
                    <td><?= $ten_khoa_hoc ?></td>
                    <td><?= $thoi_gian ?></td>
                    <td><a href="{{ADMIN_URL}}stdtimecourses/edit-stdtime-course/<?= $id_ltkh ?>"><button class="btn btn-warning">Sửa</button></a>
                        <a href="{{ADMIN_URL}}stdtimecourses/delete-stdtime-course/<?= $id_ltkh; ?>"><button class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
@endsection