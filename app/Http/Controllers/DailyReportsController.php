<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staffs;
use App\WorkSchedules;
use App\DailyWorkReports;

use Session;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class DailyReportsController extends Controller
{
  public function index($staff_id = null)
  {
    //スタッフ
    $staff = Staffs::with('factory')->find($staff_id);

    if ($staff_id == null || empty($staff)) {
      return redirect()->route('top');
    }
    $dt = Carbon::now();
    $target_date = Session::get('target_date', $dt->format('Y/m/d'));
    //logger($target_date);

    //工場切り替え時間を数値に変換　06:00 → 6
    //$hour = DateTimeUtil::format('H', $staff->factory->daily_switching_time);
    $switchingTime = intval(6);

    //同工場のスタッフリスト
    $staffs = Staffs::select('id', 'full_name')->where('factory_id', $staff->factory_id)->get()->toArray();
    $staffOption = collect($staffs)->mapWithKeys(function ($item) {
        return [$item['id'] => $item['full_name']];
    });

    //同工場、対象日の作業日報
    $factoryDailyReports = DailyWorkReports::where('factory_id', $staff->factory_id)
      ->where('report_date', $target_date)
      ->get();
      //->contain(['Equipments', 'Workers', 'WorkClassifications'])


    // $factoryDailyReportsの中から、選択スタッフが担当者 or 作業者 の作業日報を抽出

    //作業日報の開始時間と終了時間、配色をjsで扱いやすくする
    $timeList = [];
    /*
    foreach ($dailyReports as $report) {
      $report->work_start_time = $this->skedulerStartTime($report->work_start_time, $timeList);
      $timeList [] = $report->work_start_time;
      $report->start_hour = DateTimeUtil::format('H', $report->work_start_time);
      $report->start_min = DateTimeUtil::format('i', $report->work_start_time);
      $report->work_end_time = DateTimeUtil::format('H:i', $report->work_end_time);
      $report->end_hour = DateTimeUtil::format('H', $report->work_end_time);
      $report->end_min = DateTimeUtil::format('i', $report->work_end_time);
    }*/

    //作業スケジュール
    //作業開始日<=対象日 かつ 未完了の予定作業
    $today = $dt->format('Y-m-d');
    $workSchedules = WorkSchedules::with('equipment')
      ->where('factory_id' , $staff->factory_id)
      ->where('status', 1)
      ->where('work_date', '<=',$today)
      ->orderBy('work_date')
      ->get();

      $workingList = WorkSchedules::with('equipment')
        ->where('factory_id' , $staff->factory_id)
        ->where('status', 2)
        ->where('work_date', '<=',$today)
        ->orderBy('work_date')
        ->get();

      return view('dailyreports.index', compact('target_date', 'factoryDailyReports', 'workSchedules', 'workingList', 'switchingTime', 'today', 'dt', 'staff','staffOption'));
  }

  public function date(Request $request)
  {
    logger($request);
    logger('date');
    Session::put('target_date', $request['select_date']);
    return redirect()->route('daily-reports', $request['select_staff']);
  }

  public function editWorkSchedule(Request $request)
  {
    logger($request);
    $ws = WorkSchedules::find($request['id']);
    $ws->fill(['name' => $ws->name.$request['name']])->save();

    logger('edit');
    return response()->json(['success'=>'Got Simple Ajax Request.']);
  }

}
