<?php
    namespace App\Http\Middleware;
    use Closure;
    use Illuminate\Http\Request;
    use Symfony\Component\HttpFoundation\Response;

    class SessionExist{
        /**
         * Handle an incoming request.
         *
         * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
         */
        public function handle(Request $request, Closure $next){
            if(Session()->has("email")){
                return view('Errors.404');
            }

            return $next($request);
        }
    }
?>
