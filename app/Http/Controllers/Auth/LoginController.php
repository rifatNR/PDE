<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {


        $credential = $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

        if (auth()->attempt($credential)) {
            $user = Auth::user();
            $role = Role::where('name', 'admin')->first();
            $has_role = $user->hasRole($role);
            if ($has_role) {

                // return \redirect('/admin-index');
                return response()->json(['msg'=>'Login Admin Successfully', 'success'=>true, 'flag'=>1]);
//                return route('admin.index');
            } else {

                // return redirect('/');
                return response()->json(['msg'=>'Login Successfully', 'success'=>true]);
                // return route('index');
            }

        } else {
            // return back()->withErrors('Email or Password is Wrong!');
            return response()->json(['msg'=>'Email or Password is Wrong!', 'success'=>false]);
        }

    }
}
