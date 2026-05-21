<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  
    public function showRegister()
    {
        return view('register');
    }

  

    public function register(Request $request)
    {
        $request->validate([

            'full_name' => [
                'required',
                'regex:/^[А-Яа-яЁё\s]+$/u'
            ],

            'phone' => [
                'required',
                'regex:/^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$/'
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],

            'login' => [
                'required',
                'min:6',
                'unique:users,login',
                'regex:/^[А-Яа-яЁё]+$/u'
            ],

            'password' => [
                'required',
                'min:6'
            ]

        ], [

            'full_name.required' =>
                'Введите ФИО',

            'full_name.regex' =>
                'ФИО должно содержать только кириллицу и пробелы',

            'phone.required' =>
                'Введите телефон',

            'phone.regex' =>
                'Телефон должен быть в формате +7(XXX)-XXX-XX-XX',

            'email.required' =>
                'Введите email',

            'email.email' =>
                'Некорректный email',

            'email.unique' =>
                'Email уже существует',

            'login.required' =>
                'Введите логин',

            'login.min' =>
                'Логин минимум 6 символов',

            'login.unique' =>
                'Логин уже занят',

            'login.regex' =>
                'Логин должен содержать только кириллицу',

            'password.required' =>
                'Введите пароль',

            'password.min' =>
                'Пароль минимум 6 символов'

        ]);

        $user = User::create([

            'full_name' => $request->full_name,

            'phone' => $request->phone,

            'email' => $request->email,

            'login' => $request->login,

            'password' => Hash::make($request->password)

        ]);


        Auth::login($user);

        
        return redirect('/applications');
    }


    public function showLogin()
    {
        return view('login');
    }

  

    public function login(Request $request)
    {
        $credentials = $request->validate([

            'login' => 'required',

            'password' => 'required'

        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('/applications');
        }

        return back()->withErrors([

            'login' => 'Неверный логин или пароль'

        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

   

    public function admin()
    {
     
        if (
            auth()->user()->login !== 'avto2024'
        ) {
            abort(403);
        }

        $applications = Application::latest()
            ->paginate(10);

        return view('admin', compact('applications'));
    }
}