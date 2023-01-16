<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\Http\Requests\UserRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request) {
        $users = User::query()->filter($request)->paginate(10);
        $usersCount = User::query()->count();
        return view('user::admin.index', compact('users', 'usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('user::admin.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(UserRequest $request) {
        $inputs = $request->all();
        // Hashing password
        $inputs['password'] = Hash::make('password');

        DB::transaction(function () use ($inputs) {
            $user = User::query()->create($inputs);
            // assign member role to the user
            $user->assignRole('member');
        });
        toast('کاربر جدید با موفقیت ثبت شد', 'success');
        return to_route('admin.user');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user) {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('user::admin.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UserRequest $request, User $user) {
        $inputs = $request->all();

//        // Hashing password
//        $inputs['password'] = Hash::make($inputs['password']);

        DB::transaction(function () use ($inputs, $user) {
            $user->update($inputs);

            // roles assign
            if (array_key_exists('roles_show', $inputs)) {
                $user->roles()->sync($inputs['roles_show']);
            } else $user->syncRoles([]);
            // permissions assign
            if (array_key_exists('permissions_show', $inputs)) {
                $user->permissions()->sync($inputs['permissions_show']);
            } else $user->syncPermissions([]);
        });

        toast('کاربر با موفقیت ویرایش شد', 'success');
        return to_route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $user) {
        $user->delete();
        toast('داده مورد نظر با موفقیت حذف شد', 'success');
        return to_route('admin.user');
    }

    public function activate(User $user) {
        $user->activation = $user->activation == 0 ? 1 : 0;
        $result = $user->save();
        if ($result) {
            toast('وضعیت کاربر با موفقیت تغییر کرد', 'success');
            return back();
        } else {
            toast('عملیات با خطا مواجه شد، دوباره تلاش کنید', 'error');
            return back();
        }
    }

    public function getPermissions($id) {
        $role = Role::query()->find($id);
        // Fetch all students
        $permission['data'] = $role->permissions;
        echo json_encode($permission, JSON_THROW_ON_ERROR);
        exit;
    }
}
