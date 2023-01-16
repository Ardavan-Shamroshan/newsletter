@extends('admin::layouts.master')
@section('title')
    ویرایش تنظیمات | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.setting') }}">مجله و خبرنامه</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.setting') }}">تنظیمات</a></li>
            <li class="breadcrumb-item">ویرایش تنظیمات</li>
        </ol>
    </nav>
    <!-- breadcrumb -->


    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">{{ $setting->title ?? '-' }}</h4>
                        <p class="tx-12 tx-gray-500 mb-2">ویرایش تنظیمات.
                            <a href="{{ route('admin.setting') }}" id="m-l-c-05"><i class="fe fe-chevrons-right  "></i>بازگشت به لیست تنظیمات ها</a>
                        </p>
                    </div>

                    <div class="tag tag-rounded tag-blue ">
                        <a href="{{ route('home') }}" class="text-white"><i class="fe fe-chevron-right"></i> مشاهده در وبگاه</a>
                    </div>
                </div>
            </div>
                {{-- form --}}
                <form action="{{ route('admin.setting.update', $setting) }}" method="post" id="form" enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="row">
                    <div class="col-8">
                        {{-- validation errors alert --}}
                        @if ($errors->any())
                            <div class="alert alert-solid-danger mg-b-0 rounded mb-2" role="alert">
                                <button aria-label="بستن" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">×</span></button>

                                @foreach($errors->all() as $error)
                                    <div><span class="alert-inner--icon"><i class="fe fe-info"></i></span> {{ $error }}
                                    </div>
                                @endforeach

                            </div>
                        @endif

                        <div class="card box-shadow-0">
                            <div class="card-header"></div>
                            <div class="card-body pt-0">
                                <div class="">
                                    {{-- title --}}
                                    <div class="form-group">
                                        <label class="form-label @error('title') tx-danger @enderror">عنوان سایت:</label>
                                        <input type="text" name="title" class="form-control @error('name') border-danger @enderror" value="{{ old('title', $setting->title) }}">
                                        @error('title') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- body --}}
                                    <div class="form-group mb-4">
                                        <label for="description" class="@error('description') tx-danger @enderror">متن درباره ما:</label>
                                        <textarea type="text" class="form-control form-control-sm @error('description') border border-danger @enderror" name="description" id="editor">{{ old('description', $setting->description) }}</textarea>
                                        @error('description') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- tags --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label">تگ:</label>
                                        <input type="hidden" class="form-control form-control-sm @error('keywords') border border-danger @enderror" name="keywords" id="tags" value="{{ old('keywords', $setting->keywords) }}">
                                        <select id="select_tags" class="select2 form-control form-control-sm @error('keywords') border border-danger @enderror" name="keywords" multiple></select>
                                        <small class="tx-gray-600">تگ های خود را وارد کنید و با زدن دکمه
                                            <span class="badge badge-light border shadow-base">Enter</span> تگ را ایجاد کنید</small>
                                    </div>

                                    {{-- email --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('email') tx-danger @enderror">ایمیل:</label>
                                        <input type="email" name="email" class="form-control @error('email') border-danger @enderror" value="{{ old('email', $setting->email) }}">
                                        @error('email') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- mobile --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('mobile') tx-danger @enderror">موبایل:</label>
                                        <input type="number" name="mobile" class="form-control @error('mobile') border-danger @enderror" value="{{ old('mobile', $setting->mobile) }}">
                                        @error('mobile') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- phone --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('phone') tx-danger @enderror">ایمیل:</label>
                                        <input type="text" name="phone" class="form-control @error('phone') border-danger @enderror" value="{{ old('phone', $setting->phone) }}">
                                        <small class="tx-gray-600">مثال: 3322151-061</small>
                                        @error('hone') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- address --}}
                                    <div class="form-group">
                                        <label class="form-label @error('address') tx-danger @enderror">آدرس:</label>
                                        <input type="text" name="address" class="form-control @error('address') border-danger @enderror" value="{{ old('address', $setting->address) }}">
                                        @error('address') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- copyright --}}
                                    <div class="form-group">
                                        <label class="form-label @error('copyright') tx-danger @enderror">متن کپی رایت:</label>
                                        <input type="text" name="copyright" class="form-control @error('copyright') border-danger @enderror" value="{{ old('copyright', $setting->copyright) }}">
                                        @error('copyright') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- google map(url) --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label">گوگل مپ (آدرس url):</label>
                                        <input type="text" name="google_map" class="form-control" value="{{ old('google_map', $setting->google_map) }}">
                                        <small class="tx-gray-600">برای نمایش آدرس در گوگل مپ در صفحات مانند صفحه تماس با ما</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3"><i class="fe fe-save"></i> ذخیره و بازگشت
                        </button>
                        <a href="{{ route('admin.setting') }}" class="btn btn-secondary mb-3"><i class="fe fe-slash"></i> لغو</a>
                    </div>
                    <div class="col-4">
                        {{-- logo --}}
                        <div class="form-group mb-4">
                            <label class="form-label @error('logo') tx-danger @enderror">لوگو:</label>
                            <input type="file" name="logo" class="dropify" data-default-file="{{ asset($setting->logo) }}" data-height="200">
                            <div class="dropify-preview" style="display: none;">
                                <span class="dropify-render"></span>
                                <div class="dropify-infos">
                                    <div class="dropify-infos-inner"><p class="dropify-filename">
                                            <span class="dropify-filename-inner"></span></p>
                                        <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- icon --}}
                        <div class="form-group mb-4">
                            <label class="form-label @error('icon') tx-danger @enderror">آیکون:</label>
                            <input type="file" name="icon" class="dropify" data-default-file="{{ asset($setting->icon) }}" data-height="200">
                            <div class="dropify-preview" style="display: none;">
                                <span class="dropify-render"></span>
                                <div class="dropify-infos">
                                    <div class="dropify-infos-inner"><p class="dropify-filename">
                                            <span class="dropify-filename-inner"></span></p>
                                        <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                </form>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
@endsection

@section('script')
    <script src="{{ asset('modules/admin/assets/plugins/ckeditor5-build-classic/ckeditor.js') }}"></script>

    {{-- ckeditor5 --}}
    <script>
        ClassicEditor.create(document.querySelector('#editor'), {
            language: {
                // The UI will be English.
                ui: 'en',
                // But the content will be edited in persian.
                content: 'fa'
            }
        }).then(editor => {
            window.editor = editor;
        }).catch(err => {
            console.error(err.stack);
        });
    </script>


    {{-- select2 select tags --}}
    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;


            if (tags_input.val() !== null && tags_input.val().length > 0)
                default_data = default_tags.split(',');

            select_tags.select2({
                multiple: true,
                tags: true,
                data: default_data,
                theme: "classic",
                dir: "rtl"
            });


            // select_tags.children('option').attr('selected', false).trigger('change');
            select_tags.children('option').attr('selected', true).trigger('change');
            $('#form').submit(function () {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        });
    </script>

@endsection