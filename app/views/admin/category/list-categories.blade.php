@extends('admin.layout.masterLayout')
@section('content')
<h1 class="alert alert-primary sticky-top">Danh sách danh mục</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Mã Danh Mục</th>
                <th scope="col">Tên Danh Mục Khóa Học</th>
                <th scope="col">Mô Tả</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cat as $row) :
                extract($row); ?>
                <tr>
                    <th scope="row"><?= $id_danh_muc ?></th>
                    <td><a href="{{BASE_URL}}admin/courses/course-by-cat/<?= $id_danh_muc; ?>"><?= $ten_danh_muc ?></a></td>
                    <td><?= $mo_ta ?></td>
                    <td><img style="width:100px" src="<?=  PATH_IMG. $avt ?>" alt=""></td>
                    <td><?= $trang_thai ?></td>
                    <td><a href="{{BASE_URL}}admin/categories/edit-cat/<?= $id_danh_muc ?>"><button class="btn btn-warning">Sửa</button></a>
                        <a href="{{BASE_URL}}admin/categories/delete-cat/<?= $id_danh_muc; ?>"><button class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
@endsection
