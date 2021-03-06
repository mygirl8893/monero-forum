@extends('master')
@section('content')
{{ Breadcrumbs::addCrumb('Home', '/') }}
{{ Breadcrumbs::addCrumb('Login') }}
	<div class="form-style">
@if (isset($errors) && sizeof($errors) > 0)
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <h4>Oops!</h4>
		  @foreach($errors as $error)
		  	{{{ $error }}}<br>
		  @endforeach
		</div>
@endif
		{{ Form::open(array('url' => 'login')) }}
            <div class="form-group">
            	<label>Username</label>
            	{{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'')) }}
            </div>     
            <div class="form-group">
            	<label>Password</label>
            	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'')) }}
            </div>
            <div class="form-group">
            	<div class="checkbox">
			      	<label>
			          <input type="checkbox" name="remember_me"> Remember me
			        </label>
			    </div>
            </div>
            <div class="form-group">
				<label>Remember for</label>
				<select class="form-control">
				  <option value="480">8 hours</option>
				  <option value="1440">1 day</option>
				  <option value="10080" selected="selected">1 week</option>
				  <option value="43829">1 month</option>
				  <option value="0">Forever</option>
				</select>
            </div>
	      <button type="submit" class="btn btn-success pull-right">Login</button>
	    {{ Form::close() }}
	    <p class="helpblock">Don't have an account yet? <a href="/register">Register!</a> | <a href="/user/forgot-password">Forgot password?</a>
	    </p>
	</div>
@stop