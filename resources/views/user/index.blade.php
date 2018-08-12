<html>
    <head>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="{{asset('resources/assets/css/bootstrap.min.css')}}">
			<script src="{{asset('resources/assets/js/jquery.min.js')}}"></script>
		  <script src="{{asset('resources/assets/js/bootstrap.min.js')}}"></script>
    </head>
	<body><br/>
    <div class="container">
		<div class="row margin-top 15">
        <div class="col-md-6 col-sm-6">
        <table class="table table-hover center">
            <thead>
            <tr class="heading">
               
                <th>Name</th>
                <th>City</th>
				<th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($userData as $user)
                    <tr> 
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->city !!}</td>
						<td><a title="Edit" href="<?php echo URL::to('user/edit'); ?>/{!! $user->id !!}"><i class="fa fa-pencil-square-o">Edit</i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table><div class="pull-right">{!! $userData->render() !!}</div>
			</div>
			</div>
		
    
</div>
	</body>
</html>