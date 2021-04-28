<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {

            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->getMessageBag());
            }

            if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
                return redirect(route('user.balanceRefill'));
            }
        }
        return view('auth.login');
    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect('/');
        }
    }
}
