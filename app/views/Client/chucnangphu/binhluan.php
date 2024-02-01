<form action="<?= BASE_URL ?>add-comment/<?= $khct['id_khoa_hoc'] ?>/<?= $id_danh_muc ?>" method="post">
  <div class="input-group mb-2">
    <input type="text" class="form-control" required name="noi_dung_binh_luan" placeholder="Nhập bình luận của bạn">
    <div class="input-group-append">
    </div>
  </div>
  <input type="hidden" name="ngay_binh_luan" value="<?php echo date('Y-m-d H:i:s'); ?>">
  <input type="hidden" name="id_khoa_hoc" value="<?= $khct['id_khoa_hoc'] ?>">
  <input type="hidden" name="id_danh_muc" value="<?= $id_danh_muc ?>">
  <?php if (isset($_SESSION['id_tai_khoan'])) : ?>
    <input type="hidden" name="id_tai_khoan" value="<?php echo $_SESSION['id_tai_khoan']; ?>">
  <?php endif ?>
  <div class="row">
    <!-- /.col -->
    <div class="col-12">
      <button type="submit" name="addbinhluan" class="btn btn-primary btn-block">Bình luận</button>
    </div>
</form>