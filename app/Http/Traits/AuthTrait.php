<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request){

        if($request->type == 'customer'){
            $guardName= 'customer';
        }


        else{
            $guardName= 'web';
        }
        return $guardName;
    }

    public function redirect($request){

        if($request->type == 'customer'){
            return redirect()->intended(RouteServiceProvider::CUSTOMER);
        }

        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
