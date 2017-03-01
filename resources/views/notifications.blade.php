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
            <div class="">
              <a class="btn btn-primary" href="{{ route('notification.create') }}" role="button">Add notification</a>
            </div>
            <div class="notifications-table">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Sensor</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($notifications as $notification)
                    @if($notification['active'] == 1)
                      <tr class="success">
                    @else
                      <tr class="danger">
                    @endif
                      <td>{{ $notification['idSensor'] }}</td>
                      <td>{{ $notification['name'] }}</td>
                      <td>{{ $notification['value'] }}</td>
                      @if($notification['active'] == 1)
                        <td>Active</td>
                        <td><button type="button" name="button" class="btn btn-info btn-notifications">Cancel</button></td>
                      @else
                        <td>Triggered</td>
                        <td><button type="button" name="button" class="btn btn-info btn-notifications">Hide</button></td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @include('includes.errorMessage')
          </div>
        </div>
    </div>
  </div>
@endsection
