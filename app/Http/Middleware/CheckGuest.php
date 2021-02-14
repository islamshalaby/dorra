<?php

namespace App\Http\Middleware;
use App\Helpers\APIHelpers;

use Closure;

class CheckGuest
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
        if(auth()->user()){
            return $next($request);
        }else{
            $gusetkey = $request->header('Authorization');
            if($gusetkey == '$2y$12$ebmU5yx.MHYJ1Hc2O7Sha.6xJCBUhDuJXExMyO4p0D5xj9XwRD0/K'){
                return $next($request);
            }
            $response = APIHelpers::createApiResponse(true , 401 , 'توكن زائر خاطيء' , null);
            return response()->json($response , 401);
        }
    }
}
