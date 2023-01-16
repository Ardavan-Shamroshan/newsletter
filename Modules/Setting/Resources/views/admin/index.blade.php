@extends('admin::layouts.master')
@section('title')
    تنظیمات وب سایت | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.setting') }}">احراز هویت</a></li>
            <li class="breadcrumb-item">تنظیمات وب سایت</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">تنظیمات وب سایت</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش 1 از 1 صفحه از همه 1 مورد .
                            <a href="{{ route('admin.setting') }}" id="m-l-c-05">تازه سازی </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive d-inline">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="نام کوچک: activate to sort column descending" style="width: 191.667px;">عنوان سایت</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="حقوق: activate to sort column ascending" style="width: 191.4375px;">کلمات کلیدی</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="پست الکترونیک: activate to sort column ascending" style="width: 196.135px;">ایمیل</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="پست الکترونیک: activate to sort column ascending" style="width: 196.135px;">موبایل</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="پست الکترونیک: activate to sort column ascending" style="width: 196.135px;">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>{{ $setting->title }}</td>
                                            <td>
                                                @empty($setting->keywords)
                                                    <div class="bg-light rounded px-1">
                                                        <small>بدون تگ</small>
                                                    </div>
                                                @else
                                                    <div>
                                                        @foreach(explode(',', $setting->keywords) as $kweyword)
                                                            <small class="bg-gray-100 rounded mx-1 p-1"><i class="fe fe-bookmark"></i> {{ $kweyword }}
                                                            </small>
                                                        @endforeach
                                                    </div>
                                                @endempty
                                            </td>
                                            <td><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></td>
                                            <td>{{ $setting->mobile }}</td>
                                            <td class="d-flex justify-content-start">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#dataModal-1" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                                <a href="{{ route('admin.setting.edit', $setting) }}" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="dataModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width: 45%">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div class="row">
                                                            <div class="col-12 mg-b-0 pb-1">
                                                                <div class="d-flex">
                                                                    <ul class="list-unstyled w-100">
                                                                        <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                            <div class="font-weight-bold">عنوان :</div>
                                                                            <div>
                                                                                <small>{{ $setting->title ?? '-' }}</small>
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                            <div class="font-weight-bold">متن درباره ما :</div>
                                                                            <div class=""><?= html_entity_decode($setting->description) ?? '-' ?>
                                                                            </div>
                                                                        </li>

                                                                        <li class="d-flex justify-content-start  gap-3 m-0 p-3">
                                                                            <div class="font-weight-bold">تگ ها :</div>
                                                                            @empty($setting->keywords)
                                                                                <div class="bg-light rounded px-1">
                                                                                    <small>بدون تگ</small></div>
                                                                            @else
                                                                                <div>
                                                                                    @foreach(explode(',', $setting->keywords) as $keyword)
                                                                                        <small class="bg-gray-100 rounded mx-1 p-1"><i class="fe fe-hash"></i> {{ $keyword }}
                                                                                        </small>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endempty
                                                                        </li>

                                                                        <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                            <div class="font-weight-bold">ایمیل :</div>
                                                                            <div class="">
                                                                                <a href="#">{{ $setting->email ?? '-' }}</a>
                                                                            </div>
                                                                        </li>

                                                                        <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                            <div class="font-weight-bold">موبایل :</div>
                                                                            <div class="">
                                                                                {{ $setting->mobile ?? '-' }}
                                                                            </div>
                                                                        </li>

                                                                        <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                            <div class="font-weight-bold">تلفن :</div>
                                                                            <div class="">
                                                                                {{ $setting->phone ?? '-' }}
                                                                            </div>
                                                                        </li>

                                                                        <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                            <div class="font-weight-bold">آدرس :</div>
                                                                            <div class="">
                                                                                {{ $setting->address ?? '-' }}
                                                                            </div>
                                                                        </li>
                                                                        <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                            <div class="font-weight-bold">گوگل مپ :</div>
                                                                            <div class="">
                                                                                <a href="#">{{ $setting->google_map ?? '-' }}</a>
                                                                            </div>
                                                                        </li>

                                                                        <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                            <div class="font-weight-bold">زمان ایجاده شده :</div>
                                                                            <div>{{ jalaliDate($setting->created_at) }} {{ jalaliTime($setting->created_at, 'H:i') }}</div>

                                                                        </li>
                                                                        <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                            <div class="font-weight-bold">ویرایش شده در :</div>
                                                                            <div>{{ jalaliDate($setting->updated_at) }} {{ jalaliTime($setting->updated_at, 'H:i') }}</div>
                                                                        </li>
                                                                        <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                            <div class="font-weight-bold">عملیات :</div>
                                                                            <div class="d-flex justify-content-start">
                                                                                <a href="{{ route('admin.setting.edit', $setting) }}" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>

                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div><!-- bd -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        </tbody>

                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/div-->

    </div>
    <!-- /row -->

@endsection

@section('script')
    @include('sweetalert::toast')
@endsection
