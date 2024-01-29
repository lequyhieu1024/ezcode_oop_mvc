@extends('admin.layout.masterLayout')
@section('content')
     <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã liên hệ</th>
                <th scope="col">Nội dung liên hệ</th>
                <th scope="col">Ngày liên hệ</th>
                <th scope="col">Người liên hệ</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($contacts as $row) :
                extract($row); ?>
                <tr>
                    <th scope="row"><?= $id_lien_he ?></th>
                    <td><?= $noi_dung ?></td>
                    <td><?= $ngay_lien_he ?></td>
                    <td><?= $ten_tai_khoan ?></td>
                    <td>
                        <a href="{{ADMIN_URL}}contacts/delete-contact/<?= $id_lien_he ?>"><button class="btn btn-danger">Xóa</button></a>
                        <a href="{{ADMIN_URL}}contacts/rep-contact/<?= $id_lien_he ?>"><button class="btn btn-success">Phản Hồi</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
@endsection