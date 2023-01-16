@extends('admin::layouts.master')
@section('title')
    نمایش خبر | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.post') }}">مجله و خبرنامه</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.post') }}">اخبار</a></li>
            <li class="breadcrumb-item">نمایش خبر</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">{{ $post->title ?? '-' }}</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش خبر.
                            <a href="{{ route('admin.post') }}" id="m-l-c-05"><i class="fe fe-chevrons-right"></i>بازگشت به لیست اخبار</a>
                        </p>
                    </div>

                    <div>
                        <div class="tag tag-rounded tag-blue">
                            <a href="{{ route('post.show', $post) }}" class="text-white"><i class="fe fe-chevron-right"></i> مشاهده در وبگاه</a>
                        </div>
                        <div class="dt-buttons btn-group flex-wrap">
                            <a class="btn buttons-pdf" id="print" tabindex="0" aria-controls="example" type="button">
                                <span><i class="fe fe-printer"></i></span></a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-9">
                <div class="card" id="printable">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                <div class="table-header w-100 mb-3 d-flex gap-2">
                                    <img class="img-thumbnail" src="{{ asset($post->image['indexArray']['medium']) }}" alt="{{ $post->title ?? 'تصویر' }}">
                                    <div>
                                        <h6 class="font-weight-bold">خلاصه :</h6>
                                        <p>{{ $post->summary ?? '-' }}</p>
                                    </div>
                                </div>
                                <tbody class="text-nowrap">
                                <tr>
                                    <th class="font-weight-bold">عنوان :</th>
                                    <td>{{ $post->title ?? '-' }}</td>
                                </tr>
                                <tr class="text-wrap">
                                    <th class="font-weight-bold">متن :</th>
                                    <td>
                                        <?= html_entity_decode($post->body) ?? '-' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">اسلاگ :</th>
                                    <td>{{ $post->slug }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">نویسنده :</th>
                                    <td><a href="#">{{ $post->author->fullname ?? $post->author->name ?? '-' }}</a></td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">دسته بندی :</th>
                                    <td>
                                        <a href="{{ route('admin.post.show', $post->category) }}">{{ $post->category->name ?? '-' }}</a>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="font-weight-bold">زمان ایجاده شده :</th>
                                    <td>{{ jalaliDate($post->created_at) }} {{ jalaliTime($post->created_at, 'H:i') }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">ویرایش شده در :</th>
                                    <td>{{ jalaliDate($post->updated_at) }} {{ jalaliTime($post->updated_at, 'H:i') }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">عملیات :</th>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('admin.post.clone', $post) }}" class="btn-sm"><i class="fe fe-copy"></i> شبیه سازی</a>
                                        <a href="{{ route('admin.post.edit', $post) }}" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                        <form action="{{ route('admin.post.destroy', $post) }}" method="post">
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