<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class RegisteredUserController extends Controller
{
    public function __construct()
    {
    }
    public function create()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        else{
            return view("auth.registration");
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required','string','max:255'],
            'email'=> ['required','string','email','max:255','unique:users'],
            'password'=> ['required','string','min:8','max:255','confirmed'],
        ]);
    }
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $role =Role::find(2);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verified=true;
        $role->users()->save($user);

        return redirect()->route("login");
    }
}