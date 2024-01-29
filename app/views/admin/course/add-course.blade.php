@extends('admin.layout.masterLayout')
@section('content')
    <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm Khóa Học</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên khóa học</label>
                <input type="text" class="form-control" id="exampleInputEmail1" required name="ten_khoa_hoc" placeholder="Tên khóa học">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tiền học</label>
                <input type="number" class="form-control" name="tien_hoc" required id="exampleInputPassword1" placeholder="Tiền học">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ảnh đại diện</label>
                <input type="file" class="form-control" name="avt" id="exampleInputPassword1" placeholder="ảnh đại diện khóa học">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <input type="text" class="form-control" id="exampleInputEmail1" required name="mo_ta" placeholder="Mô tả khóa học">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Trạng thái</label>
                <select name="trang_thai" id="">
                    <option value="yes">Lớp còn nhận học viên</option>
                    <option value="no">Lớp không còn nhận học viên</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Giảng viên</label>
                <select name="id_giang_vien" id="">
                    <?php
                    foreach ($gv as $row) :
                        extract($row); ?>
                        <option value="<?= $id_giang_vien; ?>"><?= $ma_giang_vien; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Danh Mục</label>
                <select name="id_danh_muc" id="">
                    <?php
                    foreach ($cat as $row) :
                        extract($row); ?>
                        <option value="<?= $id_danh_muc; ?>"><?= $ten_danh_muc; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Show slide</label>
                <select name="slideshow" id="">
                    <option value="show">Show</option>
                    <option value="none">None</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="addkhoahoc" class="btn btn-primary">Thêm khóa học</button>
        </div>
    </form>
</div>
@endsection