<?php

namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;
use HipsterJazzbo\Landlord\Facades\Landlord;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Middleware\BaseMiddleware;

class TokenEntrustPermission extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
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
        if (!$user->can(explode('|', $permission))) {
            return $this->respond('tymon.jwt.invalid', 'You do not have permission', 401, 'Unauthorized');
        }

        Landlord::AddTenant(\App\Agency::find(Auth::user()->agency_id));
        User::bootBelongsToTenants();

        $this->events->fire('tymon.jwt.valid', $user);

        return $next($request);
    }
}
