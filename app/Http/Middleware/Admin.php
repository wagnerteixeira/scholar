<?php

namespace Cinema\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;

use Closure;
use Session;
class Admin
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->auth->user()->admin)
        {
            Session::flash('message-error', 'Usuário sem privilégios suficiente');
            return redirect()->to('admin');
        }

        return $next($request);
    }
}
