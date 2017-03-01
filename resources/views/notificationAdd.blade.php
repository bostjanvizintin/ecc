@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-xs-2">
      <div class="panel panel-default panel-margin sidebar">
          @include('includes.listNotifications')
      </div>
    </div>
    <div class="col-xs-10">
       <div class="panel panel-default panel-margin">
          <div class="panel-heading">
            @include('includes.mainButtons')
          </div>
          <div class="panel-body">
            {{ Form::open(array('route' => 'notification.store', 'method' => 'post')) }}
            <div class="form-group">
              {{ Form::label('name', 'Notification name:') }}
              {{ Form::text('name', "", array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
              {{ Form::label('sensor', 'Select sensor:') }}
              {{ Form::select('sensor', $sensors, "",array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
              {{ Form::label('value', 'Value:') }}
              {{ Form::number('value', "", array('class' => 'form-control', 'step' => 'any', 'min' => 0)) }}
            </div>
            <div class="form-group">
              {{ Form::label('dateFrom', 'From:') }}
              <input class="form-control" type="date" name="dateFrom" value="2016-01-01"><input class="form-control" type="time" name="timeFrom" value="00:00">
            </div>
            <div class="form-group">
              {{ Form::label('dateTo', 'To:') }}
              <input class="form-control" type="date" name="dateTo" value="2017-01-01"><input class="form-control" type="time" name="timeTo" value="00:00">
            </div>
            <div class="form-group">
              {{ Form::label('type', 'Type (1 for total, 0 for current):') }} <br>
              {{ Form::label('type', '0') }}
              {{ Form::radio('type', '0', 1) }} <br>
              {{ Form::label('type', '1') }}
              {{ Form::radio('type', '1') }}
            </div>
            {{ Form::token() }}
            {{ Form::submit('Add notification', array('class' => 'btn btn-default')) }}
            {{ Form::close() }}
            @include('includes.errorMessage')
          </div>
        </div>
    </div>
  </div>
@endsection
