@extends('layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')
<main>
<div class="top container">
	<div class="row no-gutters">
    
		<div class="col-sm-3 select_area">
			<div class="factory_select">
        <select id="factory_id" name="factory_id" value="{{ $factory_no }}"
            class="form-control">
        @foreach ($factoriesByNo as $fno => $fname)
            <option value="{{$fno}}" {{ $factory_no == $fno ? 'selected' : '' }}>{{$fname}}</option>
        @endforeach
        </select>
			</div>
      <div class="personnel_list">
				<ul>
					@foreach ($factory->staffs as $staff)
						<li>
							<a class="js_link" data-url="{{route('daily-reports', $staff->id)}}">
								{{$staff->full_name}}
							</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>

	</div><!-- /.row -->

</div><!-- /.container -->
</main>


<!-- お知らせ -->

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="msg"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-gray" data-dismiss="modal">閉じる</button>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/top.js') }}"></script>
@endsection
