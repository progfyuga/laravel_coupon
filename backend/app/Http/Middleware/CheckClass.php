<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\UsersCourse;

class CheckClass
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            UsersCourse::where('user_id', Auth::id())->firstOrFail();
        } catch (\Exception $e) {
            $message = 'クラスが登録されていません。お問い合わせ下さい。';
            return response(view('Member.exception', ['message' => $message]));
        }

        return $next($request);
    }
}
