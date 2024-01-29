@extends('client.layout.masterLayout')
@section('content')
    <div class="middle-sidebar-bottom">
  <?php
  if (empty($_SESSION['id_role'])) {
    echo 'Chưa đăng nhập';
  } else { ?>
    <div class="container-khct" style="margin:30px">
      <h1 class="alert alert-primary">Khóa học của tôi</h1>
      <table class="table">
        <?php foreach ($myCources as $mc) : extract($mc); ?>
          <tr>
            <td><img style="width:200px;height:100px" src="public/images/<?= $avt_kh ?>" alt=""></td>
            <td>
              <h1><?= $ten_khoa_hoc ?></h1>
            </td>
            <td><i class="fas fa-clock">:</i> <?= $lo_trinh ?></td>

            <td>
              <h2>$ <?= number_format($thanh_tien, 0, ".", ",") ?></h2>
            </td>
            <td><a href="detail-my-course/<?= $id_khoa_hoc ?>/<?= $id_dang_ky_khoa_hoc ?>">
                <?php if ($id_trang_thai_kh == 1) { ?> <button class="btn btn-warning"><?= $ten_trang_thai ?>
                  </button><?php } else if ($id_trang_thai_kh == 2) { ?><button class="btn btn-primary"><?= $ten_trang_thai ?>
                  </button><?php } else { ?><button class="btn btn-success"><?= $ten_trang_thai ?></button><?php } ?>
              </a></td>

          </tr>
      <?php endforeach;
      } ?>
      </table>
    </div>
</div>
@endsection