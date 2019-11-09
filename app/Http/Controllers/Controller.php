<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\View\Factory as ViewFactory;
use App\Factories;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function setFactories():void
    {
        //$factories = config('const.factories');
        $factories = Factories::select(['id', 'name'])->withTrashed()->get()->toArray();
        $factories = collect($factories)->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });
        //logger($factories);
        View::share('factories', $factories);
    }

    public function setFactoriesByNo():void
    {
        //$factories = config('const.factories');
        $factories = Factories::select(['no', 'name'])->get()->toArray();
        $factories = collect($factories)->mapWithKeys(function ($item) {
            return [$item['no'] => $item['name']];
        });
        //logger($factories);
        View::share('factoriesByNo', $factories);
    }
}
