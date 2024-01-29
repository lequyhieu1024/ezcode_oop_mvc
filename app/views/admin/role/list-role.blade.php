@extends('admin.layout.masterLayout')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã Quyền</th>
                <th scope="col">Tên Quyền Truy Cập</th>
                <th scope="col">Quyền của người truy cập</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($role as $row) :
                extract($row); ?>
                <tr>
                    <th scope="row"><?= $id_role ?></th>
                    <td><?= $name_role ?></td>
                    <td><?= $mo_ta ?></td>
                    <td>
                        <a href="{{ADMIN_URL}}roles/edit-role/<?= $id_role; ?>"><button class="btn btn-warning">Sửa</button></a>
                        <a href="{{ADMIN_URL}}roles/delete-role/<?= $id_role; ?>"><button class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
@endsection