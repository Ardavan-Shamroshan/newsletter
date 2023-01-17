@extends('admin::layouts.master')
@section('title')
    ساخت دسته بندی اخبار | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.postcategory') }}">مجله و خبرنامه</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.postcategory') }}">دسته بندی اخبار</a></li>
            <li class="breadcrumb-item">ساخت دسته بندی</li>
        </ol>
    </nav>
    <!-- breadcrumb -->


    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">دسته بندی اخبار</h4>
                        <p class="tx-12 tx-gray-500 mb-2">ساخت دسته بندی.
                            <a href="{{ route('admin.postcategory') }}" id="m-l-c-05"><i class="fe fe-chevrons-right  "></i>بازگشت به لیست دسته بندی ها</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-8">

                {{-- validation errors alert --}}
                @if ($errors->any())
                    <div class="alert alert-solid-danger mg-b-0 rounded mb-2" role="alert">
                        <button aria-label="بستن" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span></button>

                        @foreach($errors->all() as $error)
                            <div><span class="alert-inner--icon"><i class="fe fe-info"></i></span> {{ $error }} </div>
                        @endforeach

                    </div>
                @endif

                {{-- form --}}
                <form action="{{ route('admin.postcategory.store') }}" method="post">
                    @csrf
                    <div class="card box-shadow-0">
                        <div class="card-header"></div>
                        <div class="card-body pt-0">
                            <div>

                                {{-- name --}}
                                <div class="form-group">
                                    <label class="form-label @error('name') tx-danger @enderror">نام دسته بندی:
                                        <span class="tx-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') border-danger @enderror" value="{{ old('name') }}">
                                    @error('name') <small class="tx-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- category parent id --}}
                                <div class="mb-4">
                                    <label class="form-label">دسته بندی پدر</label>
                                    <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="false">
                                        <select name="parent_id" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">
                                            <option value="">-</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @selected(old('parent_id') == $category->id)>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="tx-gray-600">اگر زیر مجموعه دسته دیگری نیست، خالی رها کنید .</small>
                                    </div>
                                </div>

                                {{-- slug(url) --}}
                                <div class="form-group">
                                    <label class="form-label">اسلاگ (نمایش در url):</label>
                                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                                    <small class="tx-gray-600">اگر خالی رها کنید، بصورت خودکار از روی نام دسته بندی تولید خواهد شد.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- submit --}}
                    <button type="submit" class="btn btn-primary mb-3"><i class="fe fe-save"></i> ذخیره و بازگشت
                    </button>

                    {{-- cancel --}}
                    <a href="{{ route('admin.postcategory') }}" class="btn btn-secondary mb-3"><i class="fe fe-slash"></i> لغو</a>
                </form>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
@endsection