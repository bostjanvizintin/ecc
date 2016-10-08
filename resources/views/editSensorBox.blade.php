@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-xs-2">
      <div class="panel panel-default panel-margin sidebar">
          @include('includes.listSensorBoxes')
      </div>
    </div>
    <div class="col-xs-10">
       <div class="panel panel-default panel-margin">
          <div class="panel-heading"> 
            @include('includes.mainButtons')
          </div>
          <div class="panel-body">
              <form action="{{ route('sensorBox.update', $sensorBox['hash']) }}" method="POST">
                <div class="form-group"> 
                  <label for="hash">Sensor hash:</label>
                  <input class="form-control" type="text" name="hash" value="{{ $sensorBox['hash'] }}" disabled>
                  <input type="hidden" name="hash" value="{{  $sensorBox['hash']}}">
                </div>
                <div class="form-group">
                  <label for="name">Sensor name:</label>
                  <input class="form-control" type="text" name="name"  value="{{ $sensorBox['name'] }}"></input>
                </div>
                <div class="form-group">
                  <label for="inputs">Number of inputs:</label>
                  <input class="form-control" type="number" name="numOfInputs" min="0" max="12" step="1"  value="{{ $sensorBox['numOfInputs'] }}">
                </div>
                <hr>
                <label for="sensors">Sensors:</label><br>
                  @for($i = 0;$i<$sensorBox['numOfInputs'];$i++) 
                    <label for="input">Input {{$i}}</label>
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="name">Name for sensor {{$i}}</label> 
                          <input class="form-control" type="text" name="sensorName[]"></input>
                        </div>
                      </div> 
                      <div class="col-xs-6">
                        <div class="form-group">
                         <label for=subname>Sub name for sensor {{$i}}</label>
                         <input class="form-control" type="text" name="sensorSubName[]"></input>
                        </div>
                      </div>       
                    </div>               
                  @endfor
                <button class="btn btn-default" type="submit">Edit sensorBox</button>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
              </form><br>
              <form action="{{ route('sensorBox.destroy', $sensorBox['hash']) }}" method="POST">
                <button class="btn btn-danger" id="deleteSensorBoxForm" type="submit">Delete sensor box</button>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              </form><br>
              @if (isset($errors) && count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->¸all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if(isset($message))
              <div class="alert alert-success">
                {{ $message }}
              </div>
              @endif
          </div>
        </div>
    </div>
  </div>
@endsection
