<?php

namespace App\Http\Middleware;

use App\Customer;
use App\Step;
use App\Task;
use App\Template;
use App\User;
use App\Project;

use Closure;
use Auth;
use HipsterJazzbo\Landlord\Facades\Landlord;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Middleware\BaseMiddleware;

class TokenEntrustRole extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! $token = $this->auth->setRequest($request)->getToken()) {
            return $this->respond('tymon.jwt.absent', 'token_not_provided', 400);
        }
        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            return $this->respond('tymon.jwt.expired', 'token_expired', $e->getStatusCode(), [$e]);
        } catch (JWTException $e) {
            return $this->respond('tymon.jwt.invalid', 'token_invalid', $e->getStatusCode(), [$e]);
        }
        if (! $user) {
            return $this->respond('tymon.jwt.user_not_found', 'user_not_found', 404);
        }
        if (!$user->hasRole(explode('|', $role))) {
            return $this->respond('tymon.jwt.invalid', 'token_invalid', 401, 'Unauthorized');
        }
        $this->events->fire('tymon.jwt.valid', $user);

        Landlord::AddTenant(\App\Agency::find(Auth::user()->agency_id));
        return $next($request);
    }
}
