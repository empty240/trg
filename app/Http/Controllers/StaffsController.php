<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Staffs;
use App\Profiles;

class StaffsController extends Controller
{
  public function index()
    {
        $staffs = Staffs::with(['factory', 'profile'])->paginate(10);

        foreach($staffs as $s){
          //logger($s);
          break;
        }
        return view('staffs.index', ['staffs' => $staffs]);
    }

  public function create()
  {
    $this->setFactories();
      return view('staffs.create');
  }

  public function store(Request $request)
    {
        $factories = $this->setFactories();
        $params = $request->validate([
            'factory_id' => 'required',
            'code' => 'required|max:8',
            'full_name' => 'required|max:10',
        ]);

        Staffs::create($params);

        return redirect()->route('staffs.index');
    }

    public function edit($staff_id)
      {
          $staff = Staffs::with('profile')->findOrFail($staff_id);
          $this->setFactories();
          return view('staffs.edit', [
              'staff' => $staff,
          ]);
      }

      public function update($staff_id, Request $request)
      {
        //logger($request);
          $params = $request->validate([
            'factory_id' => 'required',
            'code' => 'required|max:8',
            'full_name' => 'required|max:10',
            'profile.age' => 'required',
          ]);
//logger($params);
          $staff = Staffs::with('profile')->findOrFail($staff_id);

          DB::beginTransaction();
          try {
            $staff->fill($params)->save();
            if($staff->profile == null){
              $staff->profile = new Profiles;
              $params['profile']['staff_id'] = $staff->id;
            }
            $staff->profile->fill($params['profile'])->save();
             DB::commit();
          } catch (\Exception $e) {
            DB::rollback();
          }
          return redirect()->route('staffs.edit', ['staff' => $staff]);
      }
}
