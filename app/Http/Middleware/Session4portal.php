<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;
use App\User;
use App\Models\Student;
class Session4portal
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
      if(Auth::check())
          {
            if (null == session()->get('st_id')) {
              $student = Student::where('user_id', Auth::id())->first();
              $user = User::find(Auth::id());
              session()->put('st_id', $student->id);
              session()->put('dept_id', $student->department_id);
              session()->put('origin', $user->state_id);
            }
          }
          return $next($request);
    }

}
