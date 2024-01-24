<?php
extract($list);
?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Sửa danh mục</h3>
    </div>
    <form method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Lộ Trình Học</label>
                <select name="id_lo_trinh" id="">
                    <?php
                    foreach ($stdTime as $rows) : ?>
                        <option value="<?= $rows['id_lo_trinh'] ?>" <?php echo $rows['id_lo_trinh'] == $id_lo_trinh ? "selected" : "" ?>><?= $rows['thoi_gian'] ?></option>
                    <?php endforeach ?>
                </select>
                <input type="hidden" class="form-control" value="<?= $id_lo_trinh_khoa_hoc ?>" name="id_lo_trinh_khoa_hoc">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">khóa học</label>
                <select name="id_khoa_hoc" id="">
                    <?php
                    foreach ($course as $rows) : ?>
                        <option value="<?= $rows['id_khoa_hoc'] ?>" <?php echo $rows['id_khoa_hoc'] == $id_khoa_hoc ? "selected" : "" ?>><?= $rows['ten_khoa_hoc'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="editltkh" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>