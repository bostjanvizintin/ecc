@extends('layouts.app')

@section('content')
  <div class="panel-heading">
      @include('includes.mainButtons')
  </div>
  <div class="panel panel-default panel-margin">
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Number</th>
              <th>Name</th>
              <th>Description</th>
              <th>Time</th>
              <th>Check</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($userErrors as $error)
              @if($error['seen'] == 0)
                <tr class="danger">
              @else
                <tr class="success">
              @endif
                <td>{{ $error['number'] }}</td>
                <td>{{ $error['name'] }}</td>
                <td>{{ $error['description'] }}</td>
                <td>{{ $error['created_at'] }}</td>
                <td>Check</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

      </div>
@endsection
