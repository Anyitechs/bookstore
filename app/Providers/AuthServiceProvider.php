<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Auth::viaRequest('admin', function ($request) {
            return $this->authenticate($request, 'admin');
        });

        Auth::viaRequest('user', function ($request) {
            return $this->authenticate($request, 'user');
        });
    }

    private function authenticate($request, $auth)
    {
        $api_token = $this->getAPiToken($request);

        if($auth==='user'){
            return User::where('api_token', $api_token)->first();
        }

        if($auth==='admin'){
            return Admin::where('api_token', $api_token)->first();
        }

        return null;    
    }


    private function getAPiToken($request)
    {
        $api_token = $request->api_token;
        if ($request->header('Authorization')) {
            $token = explode(' ', $request->header('Authorization'));
            if (key_exists(0, $token)) {
                $api_token =  $token[1];
            }
        }
        return $api_token;
    }

}
