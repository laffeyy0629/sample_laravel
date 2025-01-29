<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('ENTER MIDDLWARE HANDLE=====================>');
        if(Auth::check()){
            $user = $request->session()->get('user');
            if($user)
            {
                Log::info('$user');
            } else {
                Log::info("Via remember");
                $user = User::where('id', Auth::id())->first();
                Session()->put('user', $user);
                Session()->put('loginId', $user->id);
            }
            
        } else {
            $username = $request->input('email');
            $password = $request->input('password');
            $user = User::where('email', $username)->first();

            $remember = $request->has('remember');

            if($user)
            {
                if(Auth::attempt(['email' => $username, 'password' => $password], $remember))
                {
                    Log::info('LOGIN SUCCESS');
                    $request->session()->put('user', $user);
                    $request->session()->put('loginId', $user->id);
                    return $next($request);
                } else {
                    Log::info('LOGIN FAILED');
                    return back()->withErrors(['password' => 'Invalid password']);
                }
            } else {
                return redirect('/')->with(['ERROR' => 'Invalid credentials']);
            }
        }
        Log::info('EXIT MIDDLWARE HANDLE=====================>');

        return $next($request);
    }
}
