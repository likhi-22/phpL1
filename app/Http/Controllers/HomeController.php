<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $role_id= Auth::user()->role_id;
        switch ($role_id) {
            case 1:
                return redirect()->route('adminHome');
                break;
            case 2:
                return redirect()->route('userHome');
                break;
            default:
               return '/login';
               break;
       }
    }
}