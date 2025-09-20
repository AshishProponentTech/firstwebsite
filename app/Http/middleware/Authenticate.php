<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        // Check if the URL starts with /admin
        if ($request->is('admin/*')) {
            return route('admin.login'); // redirect to admin login
        }

        // Default user login
        return route('login');
    }
}
}

