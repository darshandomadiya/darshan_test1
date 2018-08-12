<html>
    <head>
        <link rel="stylesheet" href="{{asset('resources/assets/css/bootstrap.min.css')}}">
        <script src="{{asset('resources/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('resources/assets/js/jquery.validate.min.js')}}"></script>
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
     {{ Form::model($userData, ['route' => ['user_update', $userData->id], 'id'=>'edit']) }}
        Name: {{ Form::text('Name',null, array('id' => 'name')) }}<br/><br/>
        City: {{ Form::text('City',null, array('id' => 'city')) }}<br/><br/>
        Mobile No: {{ Form::text('MobileNo',null, array('id' => 'mobileno')) }}<br/><br/>
        User Name: {{ Form::text('UserName',null, array('id' => 'username')) }}<br/><br/>
        Email: {{ Form::text('Email',null, array('id' => 'email')) }}<br/><br/>
        
        <input type="submit" name="submit" value="Save">
        
    {{ Form::close() }}
    <script>
    $("#edit").validate({
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