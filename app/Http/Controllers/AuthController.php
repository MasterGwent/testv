<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function postSignin(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {
            echo 'Неправильный логин или пароль';
        } else {
            echo 'Вы успешно авторизовались';
        }
    }

    /**
     * Создает нового пользователя, автоматически авторизуя его
     *
     * @param Request $request
     * @return string
     */
    public function postReg(Request $request)
    {
        $user = User::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password'))
        ]);

        Auth::loginUsingId($user->id);

        return 'Вы успешно зарегистрировались';
    }

}

