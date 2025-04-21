<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(LoginFormRequest $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->withErrors(__('auth.failed'));
        }
        return to_route('series.index');
    }
}
