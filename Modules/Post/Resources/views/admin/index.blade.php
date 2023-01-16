@extends('admin::layouts.master')
@section('title')
    اخبار | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.post') }}">مجله و خبرنامه</a>
            </li>
            <li class="breadcrumb-item">اخبار
            </li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0"> اخبار</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش {{ $posts->currentPage() }} از {{ $posts->lastPage() }} صفحه از همه {{ $postsCount }} مورد .
                            <a href="{{ route('admin.post') }}" id="m-l-c-05">تازه سازی </a>
                        </p>
                    </div>
                </div>
                <a href="{{ route('admin.post.create') }}" class="btn p-2 btn-primary"><i class="fe fe-plus"></i> ساخت خبر
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive d-inline">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    {{-- filters --}}
                                    <div class="filters d-flex justify-content-between align-items-center tx-12">
                                        {{-- filter items --}}
                                        <div class="filter-items  d-flex justify-content-start align-items-center gap-1">
                                            <div><i class="fe fe-filter"></i></div>

                                            {{-- filter 1 --}}
                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?status'))) border bg-primary-transparent @endif">وضعیت<i class="fe fe-chevron-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-filter rounded shadow tx-12" id="myDropdown">
                                                <input type="text" placeholder="جستجو" id="myInput" class="border m-1 rounded" onkeyup="filterFunction()" style="outline: none">
                                                <a href="{{ route('admin.post') }}" class="dropdown-item">همه</a>
                                                <a href="{{ route('admin.post','status=1') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?status=1'))) bg-primary-transparent @endif">فعال</a>
                                                <a href="{{ route('admin.post','status=0') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?status=0'))) bg-primary-transparent @endif">غیر فعال</a>
                                            </div>

                                            {{-- filter 2 --}}
                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?category_id'))) border bg-primary-transparent @endif">دسته بندی<i class="fe fe-chevron-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-filter rounded shadow tx-12" id="myDropdown2">
                                                <input type="text" placeholder="جستجو" id="myInput2" class="border m-1 rounded" onkeyup="filterFunction2()" style="outline: none">
                                                @foreach($categories as $category)
                                                    <a href="{{ route('admin.post', 'category_id=' . $category->id) }}" class="dropdown-item @if((str_contains(request()->getUri(), '?category_id=' . $category->id))) bg-primary-transparent @endif" data-bs-placement="left" data-bs-toggle="tooltip" title="{{ $category->name }}">{{ Str::limit($category->name, 25) }}</a>
                                                @endforeach
                                            </div>

                                            {{-- filter clearing --}}
                                            @if(str_contains(request()->getUri(), '?') && str_contains(request()->getUri(), '='))
                                                <a href="{{ route('admin.post') }}" class="btn-link text-black-50">پاکسازی<i class="la la-eraser"></i></a>
                                            @endif
                                        </div>
                                        {{-- filter guid --}}
                                    </div>

                                    <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc w-25" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام کوچک: activate to sort column descending" style="width: 101.667px;">عنوان</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="وضعیت: activate to sort column ascending" style="width: 54.4375px;">دسته بندی</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="وضعیت: activate to sort column ascending" style="width: 54.4375px;">وضعیت</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="وضعیت: activate to sort column ascending" style="width: 54.4375px;">بازدید</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="عملیات: activate to sort column ascending" style="width: 196.135px;">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($posts as $post)
                                            <tr>
                                                <td>
                                                   <a href="" data-bs-toggle="modal" data-bs-target="#dataModal-{{ $post->id }}">{{ Str::limit($post->title, 50) ?? '-' }}</a>
                                                </td>
                                                <td><a href="{{ route('admin.postcategory.show', $post->category) }}">{{ $post->category->name }}</a></td>
                                                <td>
                                                    <label for="{{ $post->id }}">
                                                        <input type="checkbox" id="{{ $post->id }}" onchange="changeStatus({{ $post->id }})" data-url="{{ route('admin.post.status', $post->id) }}" data-value="{{ $post->status }}" @checked($post->status == 1)>
                                                    </label>
                                                </td>
                                                <td>{{ $post->views }}</td>
                                                <td class="d-flex justify-content-start">
                                                    <a href="{{ route('admin.post.show', $post) }}" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
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

                                            <!-- Modal -->
                                            <div class="modal fade" id="dataModal-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" style="max-width: 45%">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
{{--                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $post->title }}</h1>--}}
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            <div class="row">
                                                                <div class="col-12 mg-b-0 pb-1">
                                                                    <div class="d-flex">
                                                                        <ul class="list-unstyled w-100">
                                                                            <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                                <div class="font-weight-bold">عنوان :</div>
                                                                                <div><small>{{ $post->title ?? '-' }}</small></div>
                                                                            </li>
                                                                            <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                                <div class="font-weight-bold">نویسنده :</div>
                                                                                <div class="">
                                                                                    <a href="#">{{ $post->author->fullname ?? '-' }}</a>
                                                                                </div>
                                                                            </li>
                                                                            <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                                <div class="font-weight-bold">دسته بندی :</div>
                                                                                <div>
                                                                                    <a href="{{ route('admin.postcategory.show', $post->category) }}">{{ $post->category->name ?? '-' }}</a>
                                                                                </div>
                                                                            </li>
                                                                            <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                                <div class="font-weight-bold">اسلاگ :</div>
                                                                                <div><small>{{ $post->slug }}</small></div>

                                                                            </li>

                                                                            <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                                <div class="font-weight-bold">زمان ایجاده شده :</div>
                                                                                <div>{{ jalaliDate($post->created_at) }} {{ jalaliTime($post->created_at, 'H:i') }}</div>

                                                                            </li>
                                                                            <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                                <div class="font-weight-bold">ویرایش شده در :</div>
                                                                                <div>{{ jalaliDate($post->updated_at) }} {{ jalaliTime($post->updated_at, 'H:i') }}</div>
                                                                            </li>
                                                                            <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                                <div class="font-weight-bold">عملیات :</div>
                                                                                <div class="d-flex justify-content-start">
                                                                                    <a href="{{ route('admin.post.show', $post) }}" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                                                                    <a href="{{ route('admin.post.clone', $post) }}" class="btn-sm"><i class="fe fe-copy"></i> شبیه سازی</a>
                                                                                    <a href="{{ route('admin.post.edit', $post) }}" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                                                                    <form action="{{ route('admin.post.destroy', $post) }}" method="post">
                                                                                        @csrf @method('delete')
                                                                                        <button type="submit" class="btn btn-sm btn-link delete">
                                                                                            <i class="fe fe-trash-2"></i> پاک کردن
                                                                                        </button>
                                                                                    </form>
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

                                        @endforeach

                                        </tbody>

                                    </table>

                                    <div class="col-12 mt-4 text-left">
                                        {{ $posts->links('vendor.pagination.bootstrap-5', ['elements' => $posts]) }}
                                    </div>

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
    @include('sweetalert::confirmation', ['className' => 'delete'])


    <script>
        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }

        function filterFunction2() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown2");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
