@extends('layouts.app')

@section('content')

 <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Region Form -->
        <form action="{{ url('region/'.$region->id) }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Region Name -->
            <div class="form-group">
                <label for="region-name" class="col-sm-3 control-label">Region</label>

                <div class="col-sm-4">
                    <input type="text" name="name" id="region-name" class="form-control" value="{{ old('name', $region->name) }}">
                </div>
            </div>

            <!-- buttons -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                	<!-- Update Region Button -->
                    <button type="submit" class="btn btn-default">
                        Update Region
                    </button>
                    <!-- cancel Button -->
                      <button  href="{!! URL::previous() !!}" class="btn btn-default btn-close">
                        Cancel
                    </button>

                </div>
 
            </div>

              <!-- Update Region Button -->
            <div class="form-group">
              
            </div>
        </form>
    </div>


@endsection

