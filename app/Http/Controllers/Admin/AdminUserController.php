<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function show()
    {
        $users = User::all();
        return view('admin.user')->with(['users'=>$users]);
    }
    public function viewUser($id)
    {
        $user=User::find($id);
        return view('admin.view-user')->with(['user'=>$user]);
    }
    public function editUser($id)
    {
        $user=User::find($id);
        return view('admin.edit-user')->with(['user'=>$user]);
    
    }
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data,[
            'name' => ['required','string','max:255'],
        ]);
    }
    public function updateUser(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = User::find($request->userId);
        $user->name = $request->name;
        $user->save();
        return redirect()->route('users');
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        return redirect()->route('users');
    }

}
