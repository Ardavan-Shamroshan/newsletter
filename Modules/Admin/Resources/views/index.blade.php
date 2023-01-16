@extends('admin::layouts.master')
@section('title')
    داشبورد مدیریت
@endsection
@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">سلام، خوش آمدید!</h2>
                <p class="mg-b-0">نظارت بر فروش داشبورد فروش.</p>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <label class="tx-13">رتبه بندی مشتری</label>
                <div class="main-star">
                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i>
                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i>
                    <i class="typcn typcn-star"></i> <span>(14,873)</span>
                </div>
            </div>
            <div>
                <label class="tx-13">فروش آنلاین</label>
                <h5>563,275</h5>
            </div>
            <div>
                <label class="tx-13">فروش آفلاین</label>
                <h5>783,675</h5>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">سفارشات امروز</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">500000 تومان</h4>
                                <p class="mb-0 tx-12 text-white op-7">در مقایسه با هفته گذشته</p>
                            </div>
                            <span class="float-right my-auto ms-auto">
										<i class="fas fa-arrow-circle-up text-white"></i>
										<span class="text-white op-7"> +427</span>
									</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">درآمد امروز</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">100000تومان</h4>
                                <p class="mb-0 tx-12 text-white op-7">در مقایسه با هفته گذشته</p>
                            </div>
                            <span class="float-right my-auto ms-auto">
										<i class="fas fa-arrow-circle-down text-white"></i>
										<span class="text-white op-7"> -23.09٪</span>
									</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">درآمد کل</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">71000 تومان</h4>
                                <p class="mb-0 tx-12 text-white op-7">در مقایسه با هفته گذشته</p>
                            </div>
                            <span class="float-right my-auto ms-auto">
										<i class="fas fa-arrow-circle-up text-white"></i>
										<span class="text-white op-7"> 52.09٪</span>
									</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">محصول فروخته شده</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">480000 تومان</h4>
                                <p class="mb-0 tx-12 text-white op-7">در مقایسه با هفته گذشته</p>
                            </div>
                            <span class="float-right my-auto ms-auto">
										<i class="fas fa-arrow-circle-down text-white"></i>
										<span class="text-white op-7"> -152.3</span>
									</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">وضعیت سفارش</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0">وضعیت سفارش و پیگیری. سفارش خود را از تاریخ کشتی تا رسیدن پیگیری کنید. برای شروع ، شماره سفارش خود را وارد کنید.</p>
                </div>
                <div class="card-body">
                    <div class="total-revenue">
                        <div>
                            <h4>120،750</h4>
                            <label><span class="bg-primary"></span>موفقیت</label>
                        </div>
                        <div>
                            <h4>56،108</h4>
                            <label><span class="bg-danger"></span>در انتظار</label>
                        </div>
                        <div>
                            <h4>32،895</h4>
                            <label><span class="bg-warning"></span>ناموفق</label>
                        </div>
                    </div>
                    <div id="bar" class="sales-bar mt-4"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-5">
            <div class="card card-dashboard-map-one">
                <label class="main-content-label">درآمد فروش توسط مشتریان در ایالات متحده آمریکا </label>
                <span class="d-block mg-b-20 text-muted tx-12">عملکرد فروش کلیه ایالت ها در ایالات متحده</span>
                <div class="">
                    <div class="vmap-wrapper ht-180" id="vmap2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">مشتریان اخیر</h3>
                    <p class="tx-12 mb-0 text-muted">مشتری شخصی یا شغلی است که خدمات کالا را خریداری می کند و شامل زمان واقعی می شود</p>
                </div>
                <div class="card-body p-0 customers mt-1">
                    <div class="list-group list-lg-group list-group-flush">
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{ asset('modules/admin/assets/img/faces/3.jpg') }}" alt="توضیحات تصویر">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-0">
                                            <h5 class="mb-1 tx-15">سامانتا خربزه</h5>
                                            <p class="mb-0 tx-13 text-muted">شناسه کاربر: # 1234
                                                <span class="text-success ml-2">پرداخت شده است</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
													<div id="spark1" class="wd-100p"></div>
												</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{ asset('modules/admin/assets/img/faces/11.jpg') }}" alt="توضیحات تصویر">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">جیمی چانگا</h5>
                                            <p class="mb-0 tx-13 text-muted">شناسه کاربری: # 1234
                                                <span class="text-danger ml-2">در انتظار</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
													<div id="spark2" class="wd-100p"></div>
												</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{ asset('modules/admin/assets/img/faces/17.jpg') }}" alt="توضیحات تصویر">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">گیب لاکمن</h5>
                                            <p class="mb-0 tx-13 text-muted">شناسه کاربری: # 1234
                                                <span class="text-danger ml-2">در انتظار</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
													<div id="spark3" class="wd-100p"></div>
												</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{ asset('modules/admin/assets/img/faces/15.jpg') }}" alt="توضیحات تصویر">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">مانوئل کارگر</h5>
                                            <p class="mb-0 tx-13 text-muted">شناسه کاربر: # 1234
                                                <span class="text-success ml-2">پرداخت شده است</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
													<div id="spark4" class="wd-100p"></div>
												</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action br-br-7 br-bl-7" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{ asset('modules/admin/assets/img/faces/6.jpg') }}" alt="توضیحات تصویر">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">سوزن های شارون</h5>
                                            <p class="b-0 tx-13 text-muted mb-0">شناسه کاربر: # 1234
                                                <span class="text-success ml-2">پرداخت شده است</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
													<div id="spark5" class="wd-100p"></div>
												</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">فعالیت فروش</h3>
                    <p class="tx-12 mb-0 text-muted">فعالیت های فروش ، تاکتیک هایی است که فروشندگان برای دستیابی به اهداف و هدف خود استفاده می کنند</p>
                </div>
                <div class="product-timeline card-body pt-2 mt-1">
                    <ul class="timeline-1 mb-0">
                        <li class="mt-0">
                            <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">تعداد کل محصولات </span>
                            <a href="#" class="float-left tx-11 text-muted">3 روز پیش</a>
                            <p class="mb-0 text-muted tx-12">1.3k محصولات جدید</p>
                        </li>
                        <li class="mt-0">
                            <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">فروش کل </span>
                            <a href="#" class="float-left tx-11 text-muted">35 دقیقه قبل</a>
                            <p class="mb-0 text-muted tx-12">1k فروش جدید</p>
                        </li>
                        <li class="mt-0">
                            <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">درآمد تواتال </span>
                            <a href="#" class="float-left tx-11 text-muted">50 دقیقه پیش</a>
                            <p class="mb-0 text-muted tx-12">درآمد جدید 23.5K</p>
                        </li>
                        <li class="mt-0">
                            <i class="ti-wallet bg-warning-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">Toatal Profit </span>
                            <a href="#" class="float-left tx-11 text-muted">1 ساعت پیش</a>
                            <p class="mb-0 text-muted tx-12">3k سود جدید</p>
                        </li>
                        <li class="mt-0">
                            <i class="si si-eye bg-purple-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">بازدید مشتری </span>
                            <a href="#" class="float-left tx-11 text-muted">1 روز پیش</a>
                            <p class="mb-0 text-muted tx-12">15٪ افزایش یافته است</p>
                        </li>
                        <li class="mt-0 mb-0">
                            <i class="icon-note icons bg-primary-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">نظرات مشتری </span>
                            <a href="#" class="float-left tx-11 text-muted">1 روز پیش</a>
                            <p class="mb-0 text-muted tx-12">بررسی 1.5k</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h3 class="card-title mb-2">سفارشات اخیر</h3>
                    <p class="tx-12 mb-0 text-muted">سفارش ، دستورالعمل های سرمایه گذار برای خرید یا فروش به کارگزار یا کارگزاری است</p>
                </div>
                <div class="card-body sales-info ot-0 pt-0 pb-0">
                    <div id="chart" class="ht-150"></div>
                    <div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
                        <div class="col-md-6 col">
                            <p class="mb-0 d-flex">
                                <span class="legend bg-primary brround"></span>تحویل داده شده</p>
                            <h3 class="mb-1">5238</h3>
                            <div class="d-flex">
                                <p class="text-muted ">6 ماه گذشته</p>
                            </div>
                        </div>
                        <div class="col-md-6 col">
                            <p class="mb-0 d-flex"><span class="legend bg-info brround"></span>لغو شد</p>
                            <h3 class="mb-1">3467</h3>
                            <div class="d-flex">
                                <p class="text-muted">6 ماه گذشته</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center pb-2">
                                <p class="mb-0">کل فروش</p>
                            </div>
                            <h4 class="font-weight-bold mb-2">7،590 تومان</h4>
                            <div class="progress progress-style progress-sm">
                                <div class="progress-bar bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <div class="d-flex align-items-center pb-2">
                                <p class="mb-0">کاربران فعال</p>
                            </div>
                            <h4 class="font-weight-bold mb-2">5460 تومان</h4>
                            <div class="progress progress-style progress-sm">
                                <div class="progress-bar bg-danger-gradient wd-75" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row close -->

    <!-- row opened -->
    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">کشورهای برتر شما</h6>
                <span class="d-block mg-b-10 text-muted tx-12">درآمد عملکرد فروش براساس کشور</span>
                <div class="list-group">
                    <div class="list-group-item border-top-0">
                        <i class="flag-icon flag-icon-us flag-icon-squared"></i>
                        <p>ایالات متحده</p><span>1،671,010 تومان</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
                        <p>هلند</p><span>1064075 تومان</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
                        <p>انگلستان</p><span>1055098 تومان</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
                        <p>کانادا</p><span>1045049 تومان</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-in flag-icon-squared"></i>
                        <p>هند</p><span>1930012 تومان</span>
                    </div>
                    <div class="list-group-item border-bottom-0 mb-0">
                        <i class="flag-icon flag-icon-au flag-icon-squared"></i>
                        <p>استرالیا</p><span>1042000 تومان</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">آخرین درآمد شما</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">این آخرین درآمد شما برای تاریخ امروز است.</span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th class="wd-lg-25p">تاریخ</th>
                            <th class="wd-lg-25p tx-right">تعداد فروش</th>
                            <th class="wd-lg-25p tx-right">درآمد</th>
                            <th class="wd-lg-25p tx-right">مالیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>05 مهر 1399</td>
                            <td class="tx-right tx-medium tx-inverse">34</td>
                            <td class="tx-right tx-medium tx-inverse">658020 تومان</td>
                            <td class="tx-right tx-medium tx-danger">- 45.10 تومان</td>
                        </tr>
                        <tr>
                            <td>06 مهر 1399</td>
                            <td class="tx-right tx-medium tx-inverse">26</td>
                            <td class="tx-right tx-medium tx-inverse">453025 تومان</td>
                            <td class="tx-right tx-medium tx-danger">- 15002 تومان</td>
                        </tr>
                        <tr>
                            <td>07 مهر 1399</td>
                            <td class="tx-right tx-medium tx-inverse">34</td>
                            <td class="tx-right tx-medium tx-inverse">653012 تومان</td>
                            <td class="tx-right tx-medium tx-danger">- 13045 تومان</td>
                        </tr>
                        <tr>
                            <td>08 مهر 1399</td>
                            <td class="tx-right tx-medium tx-inverse">45</td>
                            <td class="tx-right tx-medium tx-inverse">546047 تومان</td>
                            <td class="tx-right tx-medium tx-danger">- 24022 تومان</td>
                        </tr>
                        <tr>
                            <td>09 مهر 1399</td>
                            <td class="tx-right tx-medium tx-inverse">31</td>
                            <td class="tx-right tx-medium tx-inverse">425072 تومان</td>
                            <td class="tx-right tx-medium tx-danger">- 25001 تومان</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection
