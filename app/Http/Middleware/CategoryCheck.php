<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

            $user = Auth::user();
            if($user->category == 1){
                return $next($request);
            }else{
                $notification = array(
                    'message' => 'Only Admin can access',
                    'alert-type' => 'info'
                );
                return Redirect()->back()->with($notification);
            }



    }
}
