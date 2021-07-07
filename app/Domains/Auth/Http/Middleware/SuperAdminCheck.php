<?php

namespace App\Domains\Auth\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Class SuperAdminCheck.
 */
class SuperAdminCheck
{
    /**
     * @param $request
     * @param  Closure  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->hasAllAccess()) {
            return $next($request);
        }

        if ($request->is('api/*')) {
            throw new AuthenticationException('You do not have access to do that..', [Auth::getDefaultDriver()]);
        } else {
            return redirect()->route('frontend.index')->withFlashDanger(__('You do not have access to do that.'));
        }
    }
}
