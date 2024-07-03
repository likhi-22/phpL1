<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\validator;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function userHome()
    {
        return view("user.dashboard");
    }    
    public function profile()
    {
    
        return view('user.view-profile');
    }
    public function editProfile()
    {
        return view('user.edit-profile');
    
    }
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data,[
            'name' => ['required','string','max:255'],
        ]);
    }
    public function uProfile(Request $request)
    {
        $this->validator($request->all())->validate();
        $user =Auth::user();
        $user->name = $request->name;
        $user->save();
        return redirect()->route('profile');
    }
}
