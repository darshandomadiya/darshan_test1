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
    <div class="">
        <br/>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
            {{ Form::open(array('url' => 'user/store','id'=>'create')) }}
        <div class="form-group">
            Name: {{ Form::text('Name',null, array('id' => 'name','class'=>'form-control')) }}
        </div>
        <div class="form-group">
            City: {{ Form::text('City',null, array('id' => 'city','class'=>'form-control')) }}
        </div>
        <div class="form-group">
            Mobile No: {{ Form::text('MobileNo',null, array('id' => 'mobileno','class'=>'form-control')) }}
        </div>
        <div class="form-group">
            User Name: {{ Form::text('UserName',null, array('id' => 'username','class'=>'form-control')) }}
        </div>
        <div class="form-group">
            Email: {{ Form::text('Email',null, array('id' => 'email','class'=>'form-control')) }}
        </div>
		<div class="form-group">
            Password: {{ Form::text('Password',null, array('id' => 'password','class'=>'form-control')) }}
        </div>
        
            <input type="submit" name="submit" class="btn btn-primary" value="Save">

        {{ Form::close() }}
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