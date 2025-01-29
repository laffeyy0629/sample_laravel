<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CustomAuthMiddleware;
use App\Http\Requests\LoginRequest;
use App\Models\Credential;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {

       return view ('login_registration.login');
    }

    public function loginSubmit(LoginRequest $request)
    {
        Log::info(('loginSubmit'));

        $middleware = new CustomAuthMiddleware();
        
        $response = $middleware->handle($request, function($request){
            Log::info("Nakapasok");
            return redirect()->route('blogs.index');
        });

        Log::info('loginSubmit EXIT');

        return $response;
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function register()
    {
        return view ('login_registration.register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();

        $password = Hash::make($request->password);

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = $password;

        DB::beginTransaction();
        try{
            $user->save();
            DB::commit();
            return back()->with('success', 'User created successfully');
        }catch(QueryException $e){
            $message = "ERROR";
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $message = "Email already exists";
            }
            return back()->with('error', $message);
        }

        if($id > 0){
            try{
                $credentials = new Credential();                         
                $credentials->user_id = $id;
                $credentials->is_deleted = 0;
                $credentials->password = $password;
                $credentials->save();
            } catch(QueryException $e){
                $message = "ERROR";
                DB::rollBack();
                return back()->with('error', $message);
            }
        }
    }
}