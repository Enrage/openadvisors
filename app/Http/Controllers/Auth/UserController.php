<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct(Request $request) {

    }

    public function profile() {
        return view('auth.profile');
    }

    public function edit() {
        return view('auth.edit');
    }

    public function update(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->phone = trim($request->phone);
        $user->country = trim($request->country);
        $user->index = trim($request->index);
        if ($user->save()) {
            $status = 'Вы успешно изменили данные!';
        }
        return redirect('/profile')->with('status', $status);
    }
}