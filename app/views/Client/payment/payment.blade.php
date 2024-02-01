@extends('client.layout.masterLayout')
@section('content')
    
      <div class="page-nav bg-lightblue pt-lg--7 pb-lg--7 pt-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h1
                class="text-grey-800 fw-700 mont-font display4-size display4-md-size"
              >
                Thanh toán
              </h1>
            </div>
          </div>
        </div>
      </div>

<form action="{{BASE_URL}}payment/{{$course['id_khoa_hoc']}}" method="post">

      <div class="cart-wrapper pt-lg--7 pb-lg--7 pb-5 pt-5">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="card bg-greyblue border-0 p-4 mb-5">
                <p
                  class="mb-0 mont-font font-xssss text-uppercase fw-600 text-grey-500"
                >
                  <i class="fa fa-exclamation-circle"></i> Chú ý
                  <a class="expand-btn text-grey-500 fw-700" href="#coupon_info"
                    >Áp mã voucher ở phần thông tin thanh toán</a
                  >
                </p>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6">
              <div class="page-title">
                <h4 class="mont-font fw-600 font-md mb-5">Thông tin người đăng ký</h4>
                <div>
                  <div class="row">
                    <div class="col-lg-12 mb-3">
                      <div class="form-gorup">
                        <label class="mont-font fw-500 font-xsss"
                          >Họ Và Tên</label
                        >
                        <input
                          type="text"
                          name="ho_va_ten"
                          class="form-control"
                          value="{{$info1['ho_va_ten']}}"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 mb-3">
                      <div class="form-gorup">
                        <label class="mont-font fw-500 font-xsss">Email</label>
                        <input
                          type="text"
                          name="email"
                          class="form-control"
                          value="{{$info1['email']}}"
                        />
                      </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                      <div class="form-gorup">
                        <label class="mont-font fw-500 font-xsss">Số điện thoại</label>
                        <input
                          type="text"
                          name="so_dien_thoai"
                          class="form-control"
                          value="{{$info1['so_dien_thoai']}}"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div><hr>
                <h4 class="mont-font fw-600 font-md mb-5">Thông tin thanh toán</h4>
                <div
                  class="table-content table-responsive mb-5 card border-0 bg-greyblue p-5"
                >
                  <table class="table order-table order-table-2 mb-0">
                    <thead>
                      <tr>
                        <th class="border-0">Khóa học</th>
                        <th class="text-right text-primary border-0">{{ $course['ten_khoa_hoc'] }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th class="border-0">
                          Giá mặc định
                        </th>
                        <td class="text-right text-grey-900 font-xss fw-600">
                          $ {{ number_format($course['tien_hoc'],0,'.', '.') }}
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr class="cart-subtotal">
                        <th>Khuyến mại</th>
                        <td class="text-right text-grey-900 font-xss fw-600">
                            <select style="border:none;" class="bg-greyblue" name="id_khuyen_mai" id="">
                                <option value="">Voucher</option>
                                @foreach ($promotional as $item)
                                    <option value="{{$item['id_khuyen_mai']}}">{{$item['ten_khuyen_mai']}}</option>
                                @endforeach
                            </select>
                        </td>
                      </tr>
                      <tr class="shipping">
                        <th>Lộ trình học</th>
                        <td class="text-right">
                          <span class="text-grey-900 font-xss fw-600">
                            <select style="border:none;" class="bg-greyblue" name="lo_trinh_hoc" id="">
                                @if(empty($stdtime))
                                    <option value="12 tháng">12 tháng</option>
                                @else
                                @foreach ($stdtime as $item)
                                    <option value="{{$item['thoi_gian']}}">{{$item['thoi_gian']}}</option>
                                @endforeach
                                @endif
                            </select>
                          </span>
                        </td>
                      </tr>
                      <tr class="order-total">
                        <th>Tổng thanh toán</th>
                        <td class="text-right text-grey-900 font-xss fw-600">
                          <span class="order-total-ammount" >$ {{ number_format($course['tien_hoc'],0,'.', '.') }}</span>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
            </div>
            <div class="col-xl-5 offset-xl-1 col-lg-6">
              <div class="order-details">
                <h4 class="mont-font fw-600 font-md mb-5">Phương thức thanh toán</h4>
                <div
                  class="checkout-payment card border-0 mb-3 bg-greyblue p-5"
                >
                  <div class="payment-form">
                    <div class="payment-group mb-4">
                      <div class="payment-radio">
                        <input
                          type="radio"
                          value="2"
                          name="pttt"
                          id="bank"
                          checked=""
                        />
                        <label
                          class="payment-label fw-600 text-grey-900 ml-2"
                          for="cheque"
                          >Thanh toán sau</label
                        >
                      </div>
                      <div class="payment-info" data-method="bank" style="">
                      </div>
                    </div>
                    <div class="payment-group mb-4">
                      <div class="payment-radio">
                        <input
                          type="radio"
                          value="1"
                          name="pttt"
                          id="cheque"
                        />
                        <label
                          class="payment-label fw-600 text-grey-90"
                          for="cheque"
                        >
                          Thanh toán qua VNPAY
                        </label>
                      </div>
                      <div
                        class="payment-info cheque hide-in-default"
                        data-method="cheque"
                        style="display: none"
                      >
                      </div>
                    </div>
                    <div class="payment-group mb-0">
                      <div class="payment-radio">
                        <input
                          type="radio"
                          value="3"
                          name="pttt"
                          id="cash"
                        />
                        <label
                          class="payment-label fw-600 text-grey-90"
                          for="cash"
                        >
                          Thanh toán qua MOMO
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>

                <input type="hidden" name="ngay_dang_ky" value="{{ date('Y-m-d H-i-s') }}">
                <input type="hidden" name="thanh_tien" value="{{ $course['tien_hoc'] }}">

                <div class="card shadow-none border-0">
                    <button class="w-100 p-3 mt-3 font-xsss text-center text-white bg-current rounded-lg text-uppercase fw-600 ls-3" type="submit">Đăng ký</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
@endsection