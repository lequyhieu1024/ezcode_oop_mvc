@extends('client.layout.masterLayout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="col-lg-12 pt-2">
        <h1 class="alert alert-primary">Khóa học yêu thích</h1>
    <div class="d-flex flex-wrap">

        <?php
        if (empty($_SESSION['id_role'])) :
            echo 'Chưa đăng nhập';
        else :
            echo '<div class="col-lg-12 pt-2">
                </div>';
            foreach ($myCources as $tt) :
                extract($tt);
        ?>
                <div class="col-lg-4 mb-4">
                    <a href="{{BASE_URL}}detail-course/{{$id_khoa_hoc}}/{{$id_danh_muc}}">
                        <div class="card course-card p-0 shadow-xss border-0 rounded-lg overflow-hidden">
                            <div class="card-image mb-3">
                                <div class="position-relative d-block"><img style="height:150px" src="public/images/<?= $avt ?>" alt="image" class="w-100"></div>
                            </div>
                            <div class="card-body pt-0">
                                <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1"><?= $ten_khoa_hoc ?></span>
                                <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss">$</span> <?= number_format($tien_hoc, 0, " ", " ") ?></span>
                                <div style="max-height: 100px; width: 100%; overflow: hidden;">
                                    <h4 class="fw-700 font-xss mt-3 lh-28 mt-0">
                                        <div class="text-dark text-grey-900"> <?= $mo_ta ?>... </div>
                                    </h4>
                                </div>
                                <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2">Lượt xem: <?= $so_luot_xem ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
        <?php endforeach;
        endif; ?>
    </div>
</div>
@endsection