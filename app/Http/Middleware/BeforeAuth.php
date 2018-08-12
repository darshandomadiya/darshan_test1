<?php 
namespace App\Http\Middleware;
use Closure;
use Auth;
use Redirect;
use Session;
class BeforeAuth
{
    public function handle($request, Closure $next)
    {

        if(!Session::has('userlogin')){
             return redirect('/');
        } 

        return $next($request);
    }
}