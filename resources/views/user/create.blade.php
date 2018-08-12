<html>
    <head>
        <link rel="stylesheet" href="{{asset('resources/assets/css/bootstrap.min.css')}}">
        <script src="{{asset('resources/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('resources/assets/js/jquery.validate.min.js')}}"></script>
        <style>
            .error{
                color: red;
            }
        </style>
    </head>
    @if(count($errors))
    <div class="error">
        <br/>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
		<div class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
		<div class="row">
		 <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title text-center">
                            <a href="#">Sign Up</a>
                        </div>
                    </div>     
		<?php //$errors = $validator->errors();?>

                    <div class="panel-body" > 
            {{ Form::open(array('url' => 'user/store','id'=>'create')) }}
        <div class="form-group">
            Name: {{ Form::text('Name',null, array('id' => 'name','class'=>'form-control')) }}
			<div class="error"><span>{{ $errors->register->first('Name') }}</span></div>
        </div>
        <div class="form-group">
            City: {{ Form::text('City',null, array('id' => 'city','class'=>'form-control')) }}
			<div class="error"><span>{{ $errors->register->first('City') }}</span></div>
        </div>
        <div class="form-group">
            Mobile No: {{ Form::text('MobileNo',null, array('id' => 'mobileno','class'=>'form-control')) }}
			<div class="error"><span>{{ $errors->register->first('MobileNo') }}</span></div>
		</div>
        <div class="form-group">
            User Name: {{ Form::text('UserName',null, array('id' => 'username','class'=>'form-control')) }}
			<div class="error"><span>{{ $errors->register->first('UserName') }}</span></div>
		</div>
        <div class="form-group">
            Email: {{ Form::text('Email',null, array('id' => 'email','class'=>'form-control')) }}
			<div class="error"><span>{{ $errors->register->first('Email') }}</span></div>
        </div>
		<div class="form-group">
            Password: {{ Form::password('Password',array('id' => 'password','class'=>'form-control')) }}
			<div class="error"><span>{{ $errors->register->first('Password') }}</span></div>
		</div>
        
        <input type="submit" name="submit" class="btn btn-primary" value="Sign Up">
		<a class="btn btn-info" href="{{url('login')}}">Cancel</a>	
        {{ Form::close() }}
		 </div>
		 </div>
		</div>
    </div>
    <script>
        $("#create").validate({
            rules: {
                Name: "required",
                City: "required",
                MobileNo: "required",

            },
            messages: {
                Name: 'Name is Required',
                City: 'City is Required',
                MobileNo: 'Mobile No is Required',
            },

        });
    </script>

</html>