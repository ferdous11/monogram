<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $count = 1;
        $users = User::paginate(10);
        return view('users.index', compact('users', 'count'));
    }

    public function create()
    {
        $roles = Role::lists('display_name', 'id');
        return view('users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {

        $user = new User();
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->vendor_id = $request->get('vendor_id');
        $user->zip_code = $request->get('zip_code');
        $user->state = $request->get('state');
        $user->save();

        $role = Role::find($request->get('role'));
        $user->attachRole($role);

        return redirect(url('/'));

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
