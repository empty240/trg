@extends('layout')

@section('css')

@endsection

@section('content')
    <div class="container mt-4">
        <div class="p-4">
            <h1 class="h5 mb-4">
                スタッフ一覧
            </h1>
            <a href="{{ route('staffs.create') }}" class="">新規</a>
            <table class="table">
              @foreach ($staffs as $staff)
                  <tr>
                    <td>{{ $staff->code }}</td>
                    <td><a class="" href="{{ route('staffs.edit', ['staff' => $staff]) }}">{{ $staff->full_name }}</a></td>
                    <td>{{ $staff->factory->name ?? null }}</td>
                    <td>{{ $staff->profile->age ?? null }}</td>
                    <td>{{ $staff->profile->job ?? null }}</td>
                  </tr>
              @endforeach
            </table>
        </div>
    </div>
@endsection



@section('js')

@endsection
