<?php
namespace App\Http\Controllers;

use App\Http\Requests;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Session;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('vendor.authorize.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        return view('vendor.authorize.users.edit', compact('user', 'roles'));
    }

    public function update($id, Request $request)
    {

        $requestData = $request->all();
        $user = User::findOrFail($id);
        $user->update($requestData);

        Session::flash('flash_message', 'User updated!');

        return redirect(Config("authorization.route-prefix") . '/users');
    }

    public function destroy($id)
    {
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect(Config("authorization.route-prefix") . '/users');
    }
}
