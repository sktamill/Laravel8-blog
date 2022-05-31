<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function userCreate()
    {
        $roles = User::getRoles();
        return view('admin.user.create', compact('roles'));
    }

    public function userStore(UserRequest $request)
    {
        $data = $request->validated();
        /*$password = Str::random(10);
        $data['password'] = Hash::make($password);

        $user = User::firstOrCreate(['email' => $data['email']], $data);

        Mail::to($data['email'])->send(new PasswordMail($password));

        event(new Registered($user));*/

        StoreUserJob::dispatch($data);

        return redirect()->route('user.index');
    }

    public function userShow(User $user)
    {

        return view('admin.user.show', compact('user'));
    }

    public function userEdit(User $user)
    {
        $roles = User::getRoles();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function userUpdate(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('user.index');
    }

    public function userDestroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }


}
