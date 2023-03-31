<?php
    namespace App\Http\Middleware;
    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Symfony\Component\HttpFoundation\Response;

    class SessionNotBibliothecaire{
        /**
         * Handle an incoming request.
         *
         * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
         */
        public function handle(Request $request, Closure $next){
            if(Session()->has("email") && auth()->user()->getRoleUserAttribute() != "Bibliothécaire"){
                return view('Errors.404');
            }

            else if(!Session()->has("email")){
                return view("Errors.404");
            }
            return $next($request);
        }
    }
?>
