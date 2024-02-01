@extends('client.layout.masterLayout')
@section('content')
    <div style="margin:30px" class="container-ctkhct">
        <h1>Chi tiết khóa học đã đăng ký</h1><br>
        <div class="group">
            <div class="img">
                <img style="height:180px;width:250px" class="img-fluid" src="{{ PATH_IMG. $detail['avt_kh']}}" alt="">
            </div>
            <div class="group2">
                <div class="group3">
                    <div class="ten">
                        <h1>Khóa học: <b style="color:blue">{{$detail['ten_khoa_hoc']}}</b></h1>
                    </div>
                    <div class="gia">
                        <h1> <del style>$<?=number_format($detail['tien_hoc'],0,"." ,",")?></del><b style="color:red"> $ <?=$detail['thanh_tien']?></b></h1>
                    </div>
                    <div class="lotrinh">
                        <h1> <i class="fas fa-clock">:</i> <?=$detail['lo_trinh']?></b></h1>
                    </div>
                </div>
                <div class="gv">
                        <h2><i class="fas fa-user"> : </i><b><?=$detail['ma_giang_vien']?></b></h2>
                    <td>PTTT: <br> <?php if($detail['pttt'] == 1){
                        echo '<h1><b>Thanh toán qua VNPAY</b></h1>';
                    }else if($detail['pttt'] == 3){
                        echo '<h1><b>Thanh toán qua MOMO</b></h1>';
                    }else{
                        echo '<h1>Thanh toán sau</h1>';
                    }
                    ?></td>
                </div>
                <div class="thaotac"><br>
                    <button class="btn btn-primary"><?=$detail['ten_trang_thai']?></button><br><br>
                    <?php if($detail['id_trang_thai'] == 1){?>
                        <button id="btnz" class="btn btn-outline-primary"><a href="{{BASE_URL}}unregister-course/{{$detail['id_dang_ky_khoa_hoc']}}">Hủy đăng ký</a></button>
                        <?php } else if($detail['trang_thai'] == 2){?> 
                        <button class="btn btn-outline-primary" disabled>Hủy đăng ký</button>
                        <?php }else{
                            if(empty($checkdg)){
                                include("app/views/Client/chucnangphu/danhgia.php");
                            }else{
                                echo "Cảm ơn đã đánh giá";
                            }
                            }?>
                </div>
            </div>
        </div>
    </div>
    <style>
        .group{
            display: grid;
            grid-template-columns: 1fr 3fr;
            box-shadow: 0 0 10px gray;
        }
        .group2{
            display: grid;
            grid-template-columns: 1.5fr 2fr 1fr;
        }
        .group3{
            display: grid;
            grid-template-rows: 1fr 1fr;
        }
        #btnz:hover{
            background-color: red;
            color:white;
        }
        .gv{
            padding-top: 20px;
        }
    </style>

@endsection