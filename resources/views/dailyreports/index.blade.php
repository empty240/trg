@extends('layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/daily_report.css') }}">
@endsection
<?php
use Carbon\Carbon;
?>
@section('content')
<main>
<div class="container">

  <form method="POST" id="select_form"  action="{{ route('daily-reports-date')}}">
    @csrf
  <div class="row no-gutters contents_header">
    <div class="col-sm">
      <div class="input_date">
        <span class="input-group datepickerYMD" data-target-date="{{ $target_date }}">
          <input type="text" name="select_date" id="select_date" class="form-control datepicker" readonly="readonly" value="{{ $target_date }}"/>
          <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
        </span>
      </div>
      <div class="view_factory"><i class="fas fa-industry"></i>{{ $staff->factory->name }}</div>
    </div>
    <div class="col-sm-4 select_personnel">
      <select name="select_staff" id="select_staff" value="{{$staff->id}}">
        @foreach ($staffOption as $sid => $sname)
            <option value="{{$sid}}" {{ $staff->id == $sid ? 'selected' : '' }} >{{$sname}}</option>
        @endforeach
      </select>
    </div>
  </div><!-- /.row -->
</form>

	<div class="row no-gutters">
		<div class="col-md-4 schedule_area">
			<div id="schedule"></div>
		</div>
		<div class="col-md plan_work_area">
			<div class="list_wrap">
				<h3>計画作業</h3>
				<div class="plan_list">
					<ul>
						@foreach ($workSchedules as $work)
							<?php
              $class = '';
							$work_date = $work->work_date;
							if($work_date < $today){
								$class = 'caution';
							}
						?>

						<li><a class="{{ $class }}" data-toggle="modal" data-target="#headsUpModal" data-id="{{ $work->id }}">
							{{ $work->equipment->identify_number }}　
							{{ $work->name }}　
							{{ $work_date }}
						</a></li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="list_wrap">
				<h3>作業中</h3>
				<div class="plan_list">
					<ul>
						@foreach ($workingList as $working)
						<li>
								<a class="working" data-toggle="modal" data-target="#headsUpModal" data-id="{{ $working->id }}">
								{{ $working->equipment->identify_number }}　
								{{ $working->name }}　
								{{ $work_date }}
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="button_area flex">
				<a class="btn btn-blue btn-lg "  data-toggle="modal" data-target="#headsUpModal2">緊急・予防およびその他作業</a>
				<button type="button" class="btn btn-lg btn-green history" data-toggle="modal" data-target="#facilitySearch">点検履歴</button>
			</div>
		</div>
	</div><!-- /.row -->

</div><!-- /.container -->

</main>
<span id="daily_report" data-daily-report='{{json_encode($factoryDailyReports, JSON_HEX_APOS)}}'></span>
<span id="switching_time" data-switching-time='{{ $switchingTime }}'></span>
<!-- 注意喚起 -->
<div class="modal fade" id="headsUpModal" tabindex="-1" role="dialog" aria-labelledby="headsUpModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="notes">aaaaabb</div>
			</div>
			<div class="modal-footer">
				<a href="javascript:void(0)" class="btn btn-red confirm_btn">確認</a>
				<button type="button" id="edit_btn" class="btn btn-blue" data-dismiss="modal">edit</button>
        <button type="button" class="btn btn-gray cancel_btn" data-dismiss="modal">キャンセル</button>
			</div>
		</div>
	</div>
</div>
<form method="POST" id="edit_form"  action="{{ route('daily-reports-edit')}}">
  @csrf
</form>
<!-- 緊急・予防およびその他作業の注意喚起 -->
<div class="modal fade" id="headsUpModal2" tabindex="-1" role="dialog" aria-labelledby="headsUpModal2Title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="notes">aaaaa</div>
			</div>
			<div class="modal-footer">
				<a href="javascript:void(0)" class="btn btn-red confirm_btn">確認</a>
				<button type="button" class="btn btn-gray cancel_btn" data-dismiss="modal">キャンセル</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/daily_report.js') }}"></script>
<script src="{{ asset('js/modal_search_equipment.js') }}"></script>
@endsection
