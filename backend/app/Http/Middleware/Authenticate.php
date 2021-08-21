<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected $user_route  = 'member.login';
    protected $admin_route = 'admin.login';

    protected function redirectTo($request)
    {

        if (! $request->expectsJson()) {
            if (!$request->expectsJson()) {
                if (Route::is('member.*')) {
                    return route($this->user_route);
                } elseif (Route::is('admin.*')) {
                    return route($this->admin_route);
                }
            }
        }
    }
}
