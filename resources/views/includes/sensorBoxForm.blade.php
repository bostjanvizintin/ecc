<div class="container">
    <div class="row">
        <div class="col-md-12">
             <div class="panel panel-default">
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
                            <form action="{{ route('sensorBox.store') }}" method="POST">
                              <div class="form-group"> 
                                <label for="hash">Sensor hash:</label>
                                <input class="form-control" type="text" name="hash">
                              </div>
                              <div class="form-group">
                                <label for="name">Sensor name:</label>
                                <input class="form-control" type="text" name="name"></input>
                              </div>
                              <div class="form-group">
                                <label for="inputs">Number of inputs:</label>
                                <input class="form-control" type="number" name="numOfInputs" min="0" max="12" step="1">
                              </div>
                              <button class="btn btn-default" type="submit">Add sensorBox</button>
                              {{ csrf_field() }}
                            </form><br>
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
             </div>
        </div>
    </div>
</div>