<?php namespace App\Http\Middleware;

use Closure;

class Install {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
    public function handle($request, Closure $next)
    {
        if(\File::exists(base_path().'/config/invoicer.php')){
            return $next($request);
        }
        return redirect('install');
    }

}
