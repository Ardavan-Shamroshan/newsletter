@extends('admin::layouts.master')
@section('title')
    ویرایش کاربر | داشبورد مدیریت
@endsection
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/admin/assets/plugins/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">احراز هویت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">کاربران</a></li>
            <li class="breadcrumb-item">ویرایش کاربر</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-fullname mg-b-0">{{ $user->fullname ?? $user->name ?? '-' }}</h4>
                        <p class="tx-12 tx-gray-500 mb-2">ویرایش کاربر.
                            <a href="{{ route('admin.user') }}" id="m-l-c-05"><i class="fe fe-chevrons-right"></i>بازگشت به لیست کاربران</a>
                        </p>
                    </div>
                    <div class="tag tag-rounded tag-blue ">
                        <a href="#" class="text-white"><i class="fe fe-chevron-right"></i> مشاهده در وبگاه</a>
                    </div>
                </div>
            </div>

            {{-- form --}}
            <form action="{{ route('admin.user.update', $user) }}" id="form" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-8">
                        {{-- validation errors alert --}}
                        @if ($errors->any())
                            <div class="alert alert-solid-danger mg-b-0 rounded mb-2" role="alert">
                                <button aria-label="بستن" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">×</span></button>
                                @foreach($errors->all() as $error)
                                    <div>
                                        <span class="alert-inner--icon"><i class="fe fe-info"></i></span> {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="card box-shadow-0">
                            <div class="card-header"></div>
                            <div class="card-body pt-0">
                                <div>

                                    <div class="alert alert-primary" role="alert">
                                        <span class="alert-inner--icon"><i class="fe fe-check-square"></i></span>
                                        <span class="alert-inner--text"><strong>توجه!</strong> از بین (نام کاربری) و (نام و نام خانوادگی) فقط یکی را نیاز است پر کنید</span>
                                    </div>

                                    {{-- name --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('name') tx-danger @enderror">کاربر:
                                            <input type="text" name="name" class="form-control @error('name') border-danger @enderror" value="{{ old('name', $user->name) }}">
                                            @error('name') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- first_name --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('first_name') tx-danger @enderror">نام:
                                            <input type="text" name="first_name" class="form-control @error('first_name') border-danger @enderror" value="{{ old('first_name', $user->first_name) }}">
                                            @error('first_name')
                                            <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- last_name --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('last_name') tx-danger @enderror">نام خانوادگی:
                                            <input type="text" name="last_name" class="form-control @error('last_name') border-danger @enderror" value="{{ old('last_name', $user->last_name) }}">
                                            @error('last_name')
                                            <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="form-label @error('email') tx-danger @enderror">ایمیل:
                                            <span class="tx-danger">*</span></label>
                                        <input type="email" name="email" class="form-control @error('email') border-danger @enderror" value="{{ old('email', $user->email) }}">
                                        @error('email') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- slug(url) --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label">اسلاگ (نمایش در url):</label>
                                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $user->slug) }}">
                                        <small class="tx-gray-600">اگر خالی رها کنید، بصورت خودکار از روی ایمیل تولید خواهد شد.</small>
                                    </div>

                                    @if($user->user_type == 1)
                                        <div class="alert alert-link" role="alert">
                                            <span class="alert-inner--icon"><i class="fe fe-info"></i></span>
                                            <span class="alert-inner--text"><strong>توجه!</strong> برای تغییر کلمه عبور  <a href="{{ route('profile.show') }}" class="text-decoration-underline">اینجا</a> را کلیک کنید</span>
                                        </div>
                                    @endif

                                    {{-- password --}}
                                    {{--                                    <div class="form-group mb-4">--}}
                                    {{--                                        <label class="form-label @error('password') tx-danger @enderror">کلمه عبور:--}}
                                    {{--                                            <span class="tx-danger">*</span></label>--}}
                                    {{--                                        <input type="password" name="password" class="form-control @error('password') border-danger @enderror" value="">--}}
                                    {{--                                        @error('password') <small class="tx-danger">{{ $message }}</small> @enderror--}}
                                    {{--                                    </div>--}}

                                    {{-- password confirmation --}}
                                    {{--                                    <div class="form-group mb-4">--}}
                                    {{--                                        <label class="form-label @error('password_confirmation') tx-danger @enderror">تکرار کلمه عبور:--}}
                                    {{--                                            <span class="tx-danger">*</span></label>--}}
                                    {{--                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') border-danger @enderror" value="">--}}
                                    {{--                                        @error('password_confirmation')--}}
                                    {{--                                        <small class="tx-danger">{{ $message }}</small> @enderror--}}
                                    {{--                                    </div>--}}

                                    <div class="alert alert-primary" role="alert">
                                        <span class="alert-inner--icon"><i class="fe fe-check-square"></i></span>
                                        <span class="alert-inner--text"><strong>راهنمایی!</strong> هر نقش دارای چندین دسترسی است که با انتخاب هر نقش، دسترسی های آن نقش هم انتخاب می شوند. اگر علاوه بر دسترسی های نقش، دسترسی های اضافه ای هم میخواهید اختصاص بدهید میتوانید از بخش دسترسی ها، آنها را تیک بزنید. </span>
                                    </div>

                                    {{-- user role permission --}}
                                    <div class="form-group col-sm-12 checklist_dependency" data-entity="user_role_permission" data-init-function="bpFieldInitChecklistDependencyElement" element="div" bp-field-wrapper="true" bp-field-name="roles,permissions" bp-field-type="checklist_dependency" data-initialized="true">
                                        <label class="font-weight-bold form-label my-3 text-center">نقش ها و دسترسی های کاربر</label>

                                        <div class="container">

                                            {{-- roles --}}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label class="form-label font-weight-bold">نقش ها</label>
                                                </div>
                                            </div>

                                            <div class="row">

                                                @foreach($roles as $role)
                                                    <div class="col-sm-4">
                                                        <div class="checkbox">
                                                            <label class="font-weight-normal">
                                                                <input type="checkbox" data-id="{{ $role->id }}" @checked($user->roles->contains($role)) onclick="isChecked({{ $role->id }})" class="primary_list" label="Roles" name="roles_show[]" entity="roles" entity_secondary="permissions" attribute="name" model="Spatie\Permission\Models\Role" pivot="1" number_columns="3" parentfieldname="" relation_type="MorphToMany" multiple value="{{ $role->id }}">
                                                                {{ $role->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            {{-- end roles --}}

                                            {{-- permissions --}}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label class="form-label font-weight-bold">دسترسی ها</label>
                                                </div>
                                            </div>

                                            <div class="row">

                                                @foreach($permissions as $permission)
                                                    <div class="col-sm-4">
                                                        <div class="checkbox">
                                                            <label class="font-weight-normal">
                                                                <input type="checkbox" class="secondary_list" @checked($user->getPermissionsViaRoles()->contains($permission)) @disabled($user->getPermissionsViaRoles()->contains($permission)) @checked($user->getAllPermissions()->contains($permission)) @disabled($user->getAllPermissions()->contains($permission)) data-id="{{ $permission->id }}" label="Permissions" name="permissions_show[]" entity="permissions" entity_primary="roles" attribute="name" model="Spatie\Permission\Models\Permission" pivot="1" number_columns="3" parentfieldname="" relation_type="MorphToMany" multiple value="{{ $permission->id }}">
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            {{-- end permissions --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- submit --}}
                <button type="submit" class="btn btn-primary mb-3"><i class="fe fe-save"></i> ذخیره و بازگشت
                </button>

                {{-- cancel --}}
                <a href="{{ route('admin.user') }}" class="btn btn-secondary mb-3"><i class="fe fe-slash"></i> لغو</a>
            </form>
        </div>
        <!-- /row -->
    </div>
@endsection
@section('script')
    <script>
        function isChecked($id) {
            fetchRecords($id);
        }

        function fetchRecords(id) {
            $.ajax({
                url: '/admin/user/get-permissions/' + id,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    $.each(response['data'], function (index, value) {
                        var permissionChk = $("input[type='checkbox'][name='permissions_show[]'][data-id='" + value.id + "']");
                        if (permissionChk.is(':checked')) {
                            permissionChk.prop('checked', false).removeAttr("disabled");
                        } else
                            permissionChk.prop('checked', true).attr("disabled", true);
                    });
                }
            });
        }
    </script>
@endsection
