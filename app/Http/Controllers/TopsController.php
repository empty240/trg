<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories;

class TopsController extends Controller
{
  public function index($factory_no = null)
    {
      //工場一覧(key=>No)
        $this->setFactoriesByNo();
        $factory_no = $factory_no == null ? '001' : $factory_no;

        $factory = Factories::with('staffs')->where('no', $factory_no)->first();
        //logger($factory->toArray());
        return view('tops.index', compact('factory_no', 'factory'));
    }
}
