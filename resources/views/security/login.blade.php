<html>
    <head>
        <meta charset="utf-8" />
        <!-- jQuery library -->
        <link rel="stylesheet" href="{{asset('resources/assets/css/bootstrap.min.css')}}">
        <script src="{{asset('resources/assets/js/jquery.min.js')}}"></script>
        <!-- Latest compiled JavaScript -->
        <script src="{{asset('resources/assets/js/bootstrap.min.js')}}"></script>
        <style type="text/css">
            .error { float: none; color: red; padding-left: .5em; vertical-align: top; }
        </style>
        <script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="{{asset('resources/assets/js/jquery.validate.min.js')}}"></script>        
		<style>
            body {font-family: Arial, Helvetica, sans-serif;}
            form {border: 3px solid #f1f1f1;}
            input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            }
            button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            }
            button:hover {
            opacity: 0.8;
            }
            .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
            }
            .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            }
            img.avatar {
            width: 40%;
            border-radius: 50%;
            }
            .container {
            padding: 16px;
            }
            span.psw {
            float: right;
            padding-top: 16px;
            }
            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
            span.psw {
            display: block;
            float: none;
            }
            .cancelbtn {
            width: 100%;
            }
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="container">
            <div class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
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
                @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
                <div class="row">
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                            <div class="panel-title text-center">
                                <a href="#">Login</a>
                            </div>
                        </div>
                        <div class="panel-body" >
                            {{ Form::open(array('url' => 'postlogin','id'=>'loginForm','data-toggle'=>"validator",'class'=>'form-vertical')) }}
                            <div class="imgcontainer">
                                <img src="<?php echo url('/');?>/public/images/img_avatar2.png" alt="Avatar" class="avatar">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                {{ Form::text('email',null,array('id'=>'email','class'=>'form-control')) }}
                                <div class="error"><span>{{ $errors->register->first('email') }}</span></div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password: </label>
                                {{ Form::password('password',array('id'=>'password','class'=>'form-control')) }}
                                <div class="error"><span>{{ $errors->register->first('password') }}</span></div>
                            </div>
                            <input type="submit" name="submit" value="Login" class="btn btn-primary">
                            <a class="btn btn-primary" href="{{route('user_add')}}">Sign Up</a>
                            {{ Form::close() }}
                            <div style="background-color:#f1f1f1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function() {
               $("#loginForm").validate({
                   rules: {
                     password: "required",
                     email: {
                       required: true,
                       email: true
                     }
                   },
                   messages: {
                     password: "Password is required",
                     email: {
                       required: "Email is required",
                       email: "Your email address must be in the format of name@domain.com"
                     }
                   }
               })
            });
        </script>
    </body>
</html>

