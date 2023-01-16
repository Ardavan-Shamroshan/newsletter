@extends('admin::layouts.master')
@section('title')
    نمایش دسته بندی اخبار | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.postcategory') }}">مجله و خبرنامه</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.postcategory') }}">دسته بندی اخبار</a></li>
            <li class="breadcrumb-item">نمایش دسته بندی</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">{{ $postcategory->name }}</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش دسته بندی.
                            <a href="{{ route('admin.postcategory') }}" id="m-l-c-05"><i class="fe fe-chevrons-right  "></i>بازگشت به لیست دسته بندی ها</a>
                        </p>
                    </div>

                    <div>
                        <div class="tag tag-rounded tag-blue">
                            <a href="#" class="text-white"><i class="fe fe-chevron-right"></i> مشاهده در وبگاه</a>
                        </div>
                        <div class="dt-buttons btn-group flex-wrap">
                            <a class="btn buttons-pdf" id="print" tabindex="0" aria-controls="example" type="button">
                                <span><i class="fe fe-printer"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card" id="printable">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                <tbody>
                                <tr>
                                    <th class="font-weight-bold">نام :</th>
                                    <td>{{ $postcategory->name }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">اسلاگ :</th>
                                    <td>{{ $postcategory->slug }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">زیر دسته :</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">مقالات :</th>
                                    <td><a href="" class="btn-sm">{{ $postcategory->posts->count() }} مورد</a></td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">زمان ایجاده شده :</th>
                                    <td>{{ jalaliDate($postcategory->created_at) }} {{ jalaliTime($postcategory->created_at, 'H:i') }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">ویرایش شده در :</th>
                                    <td>{{ jalaliDate($postcategory->updated_at) }} {{ jalaliTime($postcategory->updated_at, 'H:i') }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">عملیات :</th>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('admin.postcategory.edit', $postcategory) }}" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                        <form action="{{ route('admin.postcategory.destroy', $postcategory) }}" method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-sm btn-link delete">
                                                <i class="fe fe-trash-2"></i> پاک کردن
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
            </div>

        </div>
        <!--/div-->

    </div>
    <!-- /row -->

@endsection
@section('script')
    <script>
        var printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function () {
            printContent('printable');
        })

        function printContent(el) {
            var restorePage = $('body').html();
            var printContent = $('#' + el).clone();
            $('body').empty().html(printContent);
            window.print();
            $('body').empty().html(restorePage);
        }
    </script>

    @include('sweetalert::toast')
    @include('sweetalert::confirmation', ['className' => 'delete'])
@endsection