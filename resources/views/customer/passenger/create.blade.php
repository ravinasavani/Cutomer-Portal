@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add Passenger</div>
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
			                        <form role="form" action="{{ route('passenger.store') }}" method="post">
			                            @method('POST')
			                            @csrf
			                            <div class="card-body">
			                            	<div class="form-group row">
			                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
			                                    <div class="col-sm-10">
			                                    	<select name="title" class="form-control">
			                                    		<option value="Mr">Mr</option>
			                                    		<option value="Miss">Miss</option>
			                                    	</select>
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
			                                    <div class="col-sm-10">
			                                    	<input type="text" class="form-control" name="firstname" value="{{ old('title') }}">
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="surname" class="col-sm-2 col-form-label">Surname</label>
			                                    <div class="col-sm-10">
			                                    	<input type="text" class="form-control" name="surname" value="{{ old('surname') }}">
			                                    </div>
			                                </div>
			                                <div class="form-group row">
			                                    <label for="passport_id" class="col-sm-2 col-form-label">Passportid</label>
			                                    <div class="col-sm-10">
			                                    	<input type="text" class="form-control" name="passport_id" value="{{ old('passport_id') }}">
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
