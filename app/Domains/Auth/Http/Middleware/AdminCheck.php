<?php

namespace App\Domains\Auth\Http\Middleware;

use App\Domains\Auth\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Closure;

/**
 * Class AdminCheck.
 */
class AdminCheck
{
    /**
     * @param $request
     * @param  Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->isType(User::TYPE_ADMIN)) {
            return $next($request);
        }

        if ($request->is('api/*')) {
            throw new AuthenticationException('You do not have access to do that..', [Auth::getDefaultDriver()]);
        } else {
            return redirect()->route('frontend.index')->withFlashDanger(__('You do not have access to do that.'));
        }
    }
}
