<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\LogRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function  getLogin(){

        return view('admin.Auth.login');
    }

    public function save(){

            $admin = new   App\Models\Admins();
            $admin -> name= 'kerollos';
            $admin -> email= 'kerollos12@gmail.com';
            $admin -> password= bcrypt('kero');
            $admin -> save();


    }

    public function login(LogRequest  $request){


        
        $remember_me = $request ->has('remember_me')? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            // notify()->success('تم الدخول بنجاح  ');
            return redirect() -> route('admin.dashboard');
        }

       // else{
          //  return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);

       // }
        // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
    }
}
