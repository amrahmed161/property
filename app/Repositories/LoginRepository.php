<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\LoginRepositoryInterface;

class LoginRepository implements LoginRepositoryInterface
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_post( $request)
    {
        //dd($request->all());
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' =>$request->password],$remember))
        {
            if (Auth::user()->is_admin ==  0) {
                return redirect('user/dashboard');
            }
            elseif(Auth::user()->is_admin == 1)
            {
                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->is_admin == 2)
            {
                return redirect('vendor/dashboard');
            }
        }else
        {
            return redirect()->back()->with('error','please enter currect email and password');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_post( $request)
    {
       // dd($request->all());
       $user = request()->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6'
       ]);

       $user = new User;
       $user->name = trim( $request->name);
       $user->last_name = trim($request->last_name);
       $user->email = trim ($request->email);
       $user->mobile = trim ($request->mobile);
       $user->address = trim ($request->address);
       $user->password = Hash::make($request->password);
       $user->remember_token = Str::random(50);
       $user->status = 0;
       $user->is_admin = 0;
       $user->save();

       return redirect('/')->with('success','Register successfully');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
