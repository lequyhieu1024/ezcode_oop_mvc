@extends('admin.layout.masterLayout')
@section('content')  
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
                    <td><a href="{{ADMIN_URL}}stdtimes/edit-stdtime/<?= $id_lo_trinh ?>"><button class="btn btn-warning">Sửa</button></a>
                        <a href="{{ADMIN_URL}}stdtimes/delete-stdtime/<?= $id_lo_trinh; ?>"><button class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

@endsection