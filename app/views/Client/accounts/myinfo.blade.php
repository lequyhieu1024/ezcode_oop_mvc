@extends('client.layout.masterLayout')
@section('content')
@if(empty($info1))
<h1 class="alert alert-danger">Bạn chưa đăng nhập</h1>
@else 
<div class="row justify-content-center mt-3">
    <div class="col-md-12">
      <div class="card">
          <ul class="list-group list-group-flush text-left">
          <li class="list-group-item"><strong>Ảnh đại diện </strong> <span id="loginname"><img src="<?= PATH_IMG . $info1['avt']?>" alt="Ảnh đại diện" class="img-fluid mb-3 col-md-2"></span></li>
          <li class="list-group-item"><strong>Tên Đăng Nhập</strong> <h2 id="loginname"><?=$info1['ten_tai_khoan']?></h2></li>
            <li class="list-group-item"><strong>Họ và Tên</strong> <h2 id="fullname"><?=$info1['ho_va_ten']?></h2></li>
            <li class="list-group-item"><strong>Email</strong> <h2 id="email"><?=$info1['email']?></h2></li>
            <li class="list-group-item"><strong>Số Điện Thoại</strong> <h2 id="phone"><?=$info1['so_dien_thoai']?></h2></li>
            <li class="list-group-item"><a href="<?=BASE_URL?>settings/updateinfo"><input style="height:35px;width:180px;background-color:#1E74FD; border: 1px solid #1E74FD; border-radius: 5px; color: white;" type="button" value="Cập nhập thông tin"></a></li>
          </ul>
        </div>
      </div>
  </div>
  @endif
@endsection

