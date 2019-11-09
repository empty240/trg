<?php
	$pageTitle = '';
	$ctrl = explode('.', Route::currentRouteName())[0];

		if($ctrl == 'DailyReports'){
			$pageTitle = '日報報告';
		} elseif ($ctrl == 'Reports'){
			if($action == 'workList'){
				$pageTitle = '確認項目';
			} else {
				$pageTitle = '報告';
			}
		} elseif ($ctrl == 'InspectionRecords'){
			$pageTitle = '点検表';
		} elseif ($ctrl == 'HistoryReports'){
			$pageTitle = '点検履歴';
		} elseif($ctrl == 'staffs'){
      $pageTitle = 'スタッフ';
			$href = route('staffs.index');
    }
?>
<header>
	<div class="row no-gutters">
		<div class="col-9 col-sm-4">
			<div class="corporate_icon"><img class="logo" src="{{ asset('img/icon.png') }}" alt="logo"></div>
			<h1>
					<a href="{{route('top')}}">日報登録システム</a>
			</h1>
		</div>
		<div class="col-1 col-sm-4 page_title">
			<h2>
			@if(isset($href))
					<a href="{{ $href }}" class="color-white">{{ $pageTitle }}</a>
			@else
			    {{ $pageTitle }}
			@endif
			</h2>
		</div>
		<div class="col-2 col-sm-4 datetime_area">
			<div id="datetime"></div>
			<div id="spMenu"></div>
		</div>
	</div>
	<span id="ctrlURL" style="display:none" data-ctrlurl="{{route('home').'/'.$ctrl}}">
</header>
