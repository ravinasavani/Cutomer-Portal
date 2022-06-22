@extends('layouts.app')
<style type="text/css">
	  	.input-container input {
	    border: none;
	    box-sizing: border-box;
	    outline: 0;
	    padding: .75rem;
	    position: relative;
	    width: 100%;
	}

	input[type="date"]::-webkit-calendar-picker-indicator {
	    background: transparent;
	    bottom: 0;
	    color: transparent;
	    cursor: pointer;
	    height: auto;
	    left: 0;
	    position: absolute;
	    right: 0;
	    top: 0;
	    width: auto;
	}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add Trip</div>
        	<div class="card-body">
            	<section class="content">
			        <div class="container-fluid">
			            <div class="row">
			                <div class="col-md-12">
			                    
			                    @if ($errors->any())
			                          <div class="alert alert-danger">
			                            <ul>
			                                @foreach ($errors->all() as $error)
			                                  <li>{{ $error }}</li>
			                                @endforeach
			                            </ul>
			                          </div><br />
			                    @endif
			                    <div class="card-primary">
			                        <form role="form" action="{{ route('trip.store') }}" method="post">
			                            @method('POST')
			                            @csrf
			                            <div class="card-body">
			                            	<div class="form-group row">
			                                    <label for="departure_airport" class="col-sm-2 col-form-label">Departure Airport</label>
			                                    <div class="col-sm-10">
			                                    	<input type="text" class="form-control" name="departure_airport" value="{{ old('departure_airport') }}">
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="destination_airport" class="col-sm-2 col-form-label">Destination Airport</label>
			                                    <div class="col-sm-10">
			                                    	<input type="text" class="form-control" name="destination_airport" value="{{ old('destination_airport') }}">
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="departure_date" class="col-sm-2 col-form-label">Departure Date</label>
			                                    <div class="col-sm-10">
						                            <input type="date" class="form-control pull-right" name="departure_datetime">
			                                	</div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="arrival_datetime" class="col-sm-2 col-form-label">Arrival Datetime</label>
			                                    <div class="col-sm-10">
			                                    	<input type="date" class="form-control pull-right" name="arrival_datetime">
			                                    </div>
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="passengers" class="col-sm-2 col-form-label">Passengers</label>
			                                    <div class="col-sm-10">
			                                    	@foreach($passengerData as $passenger)
					                                  <div class="col-md-4 form-check">
					                                    <input class="form-check-input" type="checkbox" name="passenger_id[]"  value="{{ $passenger['id'] }}">
					                                    <label for="{{ $passenger['firstname'] }}" class="form-check-label">{{ $passenger['title'] ." ". $passenger['firstname'] }}</label>
					                                  </div>
                                  					@endforeach
			                                    	
			                                    </div>
			                                </div>
			                               
			                            <div class="card-footer">
			                              <button type="submit" class="btn btn-primary btn-sm">Save</button>
			                              <a href="{{ route('customer') }}" class="btn btn-secondary btn-sm">Cancel</a>
			                            </div>
			                        </form>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </section>
			    
        	</div>
            </div>
        </div>
    </div>
</div>
@endsection
