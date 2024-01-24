<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Sửa Khóa Học</h3>
    </div>
    <?php
    extract($editkh);
    ?>
    <form method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên khóa học</label>
                <input type="text" class="form-control" id="exampleInputEmail1" required name="ten_khoa_hoc" value="<?= $ten_khoa_hoc; ?>" placeholder="Tên khóa học">
                <input type="hidden" class="form-control" id="exampleInputEmail1" required value="<?= $id_khoa_hoc; ?>" name="id_khoa_hoc" placeholder="Tên khóa học">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tiền học</label>
                <input type="number" class="form-control" name="tien_hoc" value="<?= $tien_hoc; ?>" required id="exampleInputPassword1" placeholder="Tiền học">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ảnh đại diện</label>
                <input type="file" class="form-control" name="avt" id="exampleInputPassword1" placeholder="ảnh đại diện khóa học">
            </div>
            Ảnh hiện tại<img style="width: 100px;height:80px;" src="../../../public/images/<?= $avt ?>" alt="">
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <input type="text" class="form-control" value="<?= $mo_ta; ?>" id="exampleInputEmail1" required name="mo_ta" placeholder="Mô tả khóa học">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Trạng thái</label>
                <select name="trang_thai" id="">
                    <option value="<?= $trang_thai; ?>">Còn nhận học viên không : <?= $trang_thai; ?></option>
                    <option value="yes">Lớp còn nhận học viên</option>
                    <option value="no">Lớp không còn nhận học viên</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Giảng viên</label>
                <select name="id_giang_vien" id="">
                    <?php
                    foreach ($gv as $row) : ?>
                        <option value="<?= $row['id_giang_vien']; ?>" <?php echo ($row['id_giang_vien'] == $id_giang_vien) ? "selected" : "" ?>><?= $row['ma_giang_vien']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Danh Mục</label>
                <select name="id_danh_muc" id="">
                    <?php
                    foreach ($cat as $row) : ?>
                        <option value="<?= $row['id_danh_muc']; ?>" <?php echo ($row['id_danh_muc'] == $id_danh_muc) ? "selected" : "" ?>><?= $row['ten_danh_muc']; ?></option>
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

        <div class="card-footer">
            <button type="submit" name="editkhoahoc" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>