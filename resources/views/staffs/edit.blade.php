<?php

?>

@extends('layout')

@section('css')

@endsection

@section('content')
    <div class="container mt-4">
        <div class="p-4">
            <h1 class="h5 mb-4">
                スタッフ編集
            </h1>
            <form method="POST" action="{{ route('staffs.update', ['staff' => $staff]) }}">
                @csrf
                @method('PUT')
                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="factory_id">工場</label>
                        <select id="factory_id" name="factory_id" value="{{ old('factory_id', $staff->factory_id) }}"
                            class="form-control {{ $errors->has('factory_id') ? 'is-invalid' : '' }}"
                        >
                        <option value=""></option>
                        @foreach ($factories as $fid => $fname)
                            <option value="{{$fid}}" {{ old('factory_id', $staff->factory_id) == $fid ? 'selected' : '' }}>{{$fname}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('factory_id'))
                            <div class="invalid-feedback">{{ $errors->first('factory_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="code">スタッフコード</label>
                        <input type="text" id="code" name="code" value="{{ old('code', $staff->code) }}"
                            class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                        >
                        @if ($errors->has('code'))
                            <div class="invalid-feedback">{{ $errors->first('code') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="full_name">名前</label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $staff->full_name) }}"
                            class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                        >
                        @if ($errors->has('full_name'))
                            <div class="invalid-feedback">{{ $errors->first('full_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="profile[age]">年齢</label>
                        <input type="text" id="profile-age" name="profile[age]" value="{{ old('profile.age', $staff->profile->age ?? null) }}"
                            class="form-control {{ $errors->has('profile.age') ? 'is-invalid' : '' }}"
                        >
                        @if ($errors->has('profile.age'))
                            <div class="invalid-feedback">{{ $errors->first('profile.age') }}</div>
                        @endif
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection



@section('js')

@endsection
