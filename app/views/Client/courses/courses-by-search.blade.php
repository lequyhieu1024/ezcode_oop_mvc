@extends('client.layout.masterLayout')
@section('content')
<div class="middle-sidebar-left">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="card rounded-xxl p-lg--5 border-0 bg-no-repeat bg-image-contain banner-wrap" style="background-image: url(public/images/fogg-clip.png);">
                <div class="card-body p-4">
                    <h2 class="display3-size fw-400 display2-md-size sm-mt-7 sm-pt-10">Tìm kiếm <b class="d-lg-block">Khóa Học </b></h2>
                    <div class="form-group mt-lg-4 p-3 border-light border p-2 bg-white rounded-lg ">
                        <div class="row">
                            <div class="col-md-5">
                                <form method="post" action="search-course" class="form-group icon-input mb-0">
                                    <i class="ti-search font-xs text-grey-400"></i>
                                    <input type="text" name="search_input" style="color: black; font-size: 16px; width: 100%;" required class="style1-input bg-transparent border-0 pl-5  mb-0 fw-500" placeholder="Nhập tìm kiếm...">
                            </div>

                            <div class="col-md-4">

                            </div>
                            <div class="col-md-3">
                                <button type="submit" name="tim_kiem" class="w-100 d-block btn bg-current text-white font-xssss fw-600 ls-3 style1-input p-0 border-0 text-uppercase ">Search</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 pt-2">
    <div class="d-flex flex-wrap">
        <h2 class="fw-400 font-lg alert alert-warning">Kết quả tìm kiếm<a href="#" class="float-right"></a></h2> <br>
        <?php
        if (empty($resultSearch)) :

            echo '<img style="width:1200px;height:600px" class="img-fluid" src="public/images/no-result.jpg">';
        else :
            echo '<div class="col-lg-12 pt-2">
                </div>';
            foreach ($resultSearch as $tt) :
                extract($tt);
        ?>
                <div class="col-lg-4 mb-4">
                    <a href="detail-course/<?= $id_khoa_hoc ?>/<?= $id_danh_muc ?>">
                        <div class="card course-card p-0 shadow-xss border-0 rounded-lg overflow-hidden">
                            <div class="card-image mb-3">
                                <div class="position-relative d-block"><img style="height:150px" src="public/images/<?= $avt ?>" alt="image" class="w-100"></div>
                            </div>
                            <div class="card-body pt-0">
                                <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1"><?= $ten_khoa_hoc ?></span>
                                <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss">$</span> <?= number_format($tien_hoc, 0, ".", ",") ?></span>
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