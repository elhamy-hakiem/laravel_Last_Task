<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class deleteTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $task =   DB :: table('tasks')->find($request->id);
        $dateExpire = date('Y-m-d',$task->endDate);
        $date       = date('Y-m-d',Carbon::now()->timestamp);

        if($dateExpire < $date)
        {
            return $next($request);
        }
        else
        {
            $message = "Task Not Removed The End Time Expired";
            session()->flash('Message-error', $message);
            return back();
        }
    }
}
