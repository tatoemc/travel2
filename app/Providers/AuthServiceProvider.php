<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
  
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

   
    public function boot(GateContract $gate)
    {
        
        $this->registerPolicies($gate);

        $gate->define('isAdmin', function($user) 
        {
            return $user->user_type == 'admin';
        });

        $gate->define('isUser', function($user)  
        {
            return $user->user_type == 'user';
        });
        $gate->define('isEmp', function($user)  
        {
            return $user->user_type == 'emp';
        });



    }
}
