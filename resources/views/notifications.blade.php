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
              asdf
              @if (isset($errors) && count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
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
