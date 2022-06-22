@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
			                    <div class="card card-primary">
			                        <div class="card-header">
			                            <h3 class="card-title">Basic Info</h3>
			                        </div>
			                      
			                        <form role="form" action="{{ route('update') }}" method="post">
			                            @method('POST')
			                            @csrf
			                            <div class="card-body">
			                            	<div class="form-group row">
			                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
			                                    <div class="col-sm-10">
			                                    	<input type="text" class="form-control" name="email" value="{{$userData->email}}">
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
			                                    <div class="col-sm-10">
			                                    	<input type="text" class="form-control" name="name" value="{{$userData->name}}">
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
			                                    <div class="col-sm-10">
			                                    	<input type="text" class="form-control" name="address" value="{{$userData->address}}">
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="city" class="col-sm-2 col-form-label">City</label>
			                                    <div class="col-sm-10">
			                                    	<input type="text" class="form-control" name="city" value="{{$userData->city}}">
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="country" class="col-sm-2 col-form-label">Country</label>
			                                    <div class="col-sm-10">
			                                    	<input type="text" class="form-control" name="country" value="{{$userData->country}}">
			                                    </div>
			                                </div>
			                            <!-- /.card-body -->
			                            <div class="">
			                              <button type="submit" class="btn btn-primary btn-sm">Save</button>
			                            </div>
			                        </form>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </section>
			    <section class="content my-3">
			        <div class="container-fluid">
			            <div class="row">
			                <div class="col-md-12">
			                    <div class="card card-primary">
			                        <div class="card-header">
			                            <h3 class="card-title">Passengers</h3>
			                        </div>
			                     	<div class="card-body">
			                            <table class="table table-bordered table-striped">
			                                <thead>
			                                    <tr>
			                                      <th>Title</th>
			                                      <th>First Name</th>
			                                      <th>Surname</th>
			                                      <th>Passport ID</th>
			                                      <th>Options</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                  @foreach($passengerData as $passenger)
			                                    <tr>
			                                      <td>{{$passenger->title}}</td>
			                                      <td>{{$passenger->firstname}}</td>
			                                      <td>{{$passenger->surname}}</td>
			                                      <td>{{$passenger->passport_id}}</td>
			                                      <td>
			                                        <a href="{{ route('passenger.delete',['id'=>$passenger->id]) }}" class="btn btn-danger btn-sm">Delete</a>
			                                      </td>
			                                    </tr>
			                                  @endforeach
			                                  	<tr>
			                                  		<td colspan="5">
			                                  			<a href="{{ route('passenger.create') }}" class="btn btn-success btn-sm">Add</a>
			                                  		</td>
			                                  	</tr>
			                              </tbody>
			                            </table>
                					</div>
			                </div>
			            </div>
			        </div>
			    </section>

			    <section class="content my-3">
			        <div class="container-fluid">
			            <div class="row">
			                <div class="col-md-12">
			                    <div class="card card-primary">
			                        <div class="card-header">
			                            <h3 class="card-title">Trips</h3>
			                        </div>
			                     	<div class="card-body">
			                            <table class="table table-bordered table-striped">
			                                <thead>
			                                    <tr>
			                                      <th>From</th>
			                                      <th>To</th>
			                                      <th>Departure</th>
			                                      <th>Arrival</th>
			                                      <th>Passengers</th>
			                                      <th>Options</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                  @foreach($tripData as $trip)
			                                    <tr>
			                                      <td>{{$trip->departure_airport}}</td>
			                                      <td>{{$trip->destination_airport}}</td>
			                                      <td>{{$trip->departure_datetime}}</td>
			                                      <td>{{$trip->arrival_datetime}}</td>
			                                      <td>{{$trip->passenger_id}}</td>
			                                      <td>
			                                        <a href="{{ route('trip.delete',['id'=>$trip->id]) }}" class="btn btn-danger btn-sm">Delete</a>
			                                      </td>
			                                    </tr>
			                                  @endforeach
			                                  	<tr>
			                                  		<td colspan="6">
			                                  			<a href="{{ route('trip.create') }}" class="btn btn-success btn-sm">Add</a>
			                                  		</td>
			                                  	</tr>
			                              </tbody>
			                            </table>
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
