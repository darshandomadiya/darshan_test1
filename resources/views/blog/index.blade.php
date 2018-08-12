<html lang="en">
    <head>
        <title>Darshan's Blog</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('resources/assets/css/bootstrap.min.css')}}">
        <script src="{{asset('resources/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('resources/assets/js/bootstrap.min.js')}}"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {height: 1500px}
            /* Set gray background color and 100% height */
            .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            }
            /* Set black background color, white text and some padding */
            footer {
            background-color: #555;
            color: white;
            padding: 15px;
            }
            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
            .sidenav {
            height: auto;
            padding: 15px;
            }
            .row.content {height: auto;} 
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav">
                    <?php $userName = Session()->get('userName');?>
                    <h4><?php echo $userName."'s Blog";?></h4>
                    <a class="logout" href="{{route('logout')}}">Logout</a>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#section1">Home</a></li>
                    </ul>
                    <br>
                    <div class="input-group">
                        <div class="col-md-12">  
                            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                        </div>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="col-md-12">  
                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                        </div>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="col-md-12">  
                            <input type="text" name="filter_author" id="filter_author" class="form-control" placeholder="Author">
                        </div>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="col-md-12">
                            <select class="form-control" id="filter_category" name="filter_category">
                                <option value=''>-- Select Category --</option>
                                @foreach($blogCategories as $blogCategory)
                                <option value="<?php echo $blogCategory->category_name; ?>">{!! $blogCategory->category_name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>  
                    <div class="col-md-9">  
                        <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" /> 
                        <a class="btn btn-info" href="{{route('blog')}}">Reset</a>			 
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="col-sm-9">
                    <div id="blogData">
                        <h4><small>RECENT POSTS</small></h4>
                        @foreach ($blogData as $blog)
                        <div>
                            <hr>
                            <h2>{!! $blog->title !!}</h2>
							<?php 
							$dt = new DateTime($blog->post_date); 
							$date = $dt->format('m/d/Y');
							$time = $dt->format('H:i:s');

							$postDate = $date.' | '.$time;
							?>
                            <h5><span class="glyphicon glyphicon-time"></span> Post by <b>{!! $blog->post_by !!}</b>, {!! $postDate !!}.</h5>
                            <h5>
                                <?php 
                                    $categories = explode(',',$blog->category); 
                                    ?>
                                @foreach($categories as $category)
                                <span class="label label-danger">{!! $category !!}</span> 
                                @endforeach
                            </h5>
                            <br>
                            <p>{!! $blog->description !!}</p>
                            <br><br>
                        </div>
                        @endforeach
                    </div>
                    <h4>Post a Blog:</h4>
                    <form method="post" id="blogpost" onsubmit="return doBlogPost();">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="blog_title">Blog Title:</label>
                            <input type="text" name="blog_title" id="blog_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="blog_desc">Blog Description:</label>
                            <textarea id="blog_desc" name="blog_desc" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="blog_category">Blog Category:</label>
                            <select multiple class="form-control" id="blog_category" name="blog_category[]">
                                @foreach($blogCategories as $blogCategory)
                                <option>{!! $blogCategory->category_name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="blog_author">Blog Author:</label>
                            <input type="text" name="blog_author" id="blog_author" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    <br><br>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){  
               $.datepicker.setDefaults({  
            		dateFormat: 'yy-mm-dd'   
               });  
               $(function(){  
            		$("#from_date").datepicker();  
            		$("#to_date").datepicker();  
               });
               $('#filter').click(function(){  
            		var from_date = $('#from_date').val();  
            		var to_date = $('#to_date').val();
            		var category = $('#filter_category').val();
            		var author = $('#filter_author').val();
            		var token = "<?php echo csrf_token(); ?>";
            		//if(from_date != '' && to_date != '')  
            		//{  
            			 $.ajax({  
            				  url: "{{ url('filterblog') }}", 
            				  method:"POST",  
            				  data:{_token:token, from_date:from_date, to_date:to_date, author:author, category:category},  
            				  success:function(data)  
            				  {  
            						 
            					   $('#blogData').html(data);  
            				  }  
            			 });  
            		//}  
            		//else  
            		//{  
            			 //alert("Please Select Date");  
            		//}  
               });
            }); 	    
                function doBlogPost()
                {
            		var blogTitle = $('#blog_title').val();
                    var blogDesc = $('#blog_desc').val();
                    var blogCategory = $('#blog_category').val();
            		var blogAuthor = $('#blog_author').val();
            		if(blogTitle=='')
                    {
                        alert('Please enter blog title.');
                        $('#blog_title').focus();
                        return false;
                    }
                    if(blogDesc=='')
                    {
                        alert('Please enter blog description.');
                        $('#blog_desc').focus();
                        return false;
                    }
                    if(blogCategory=='')
                    {
                        alert('Please select blog category.');
                        $('#blog_category').focus();
                        return false;
                    }
            		if(blogAuthor=='')
                    {
                        alert('Please enter blog author name.');
                        $('#blog_author').focus();
                        return false;
                    } 
                    var values = $('#blogpost').serialize();
                    $.ajax({
                        url: "{{ url('postblog') }}",
                        type: "post",
                        data: values ,
                        success: function (data) {
            				var obj = JSON.parse(data);
            				var description = obj.description;
            				var title = obj.title;
            				var author = obj.author;
            				var blog_category = obj.blog_category;
            				var post_date = obj.post_date;
            				var tr_str = "<div><hr><h2>"+title+"</h2>"+
            				  "<h5><span class='glyphicon glyphicon-time'></span> Post by<b>"+author+"</b>,"+post_date+"</h5><h5>"+
            						"<span class='label label-danger'>"+blog_category+"</span></h5><br><p>"+description+"</p><br><br></div>";
            				
            				$("#blogData").append(tr_str);
            				$('#blog_title').val('');
            				$('#blog_desc').val('');
            				$('#blog_category').val('');
            				$('#blog_author').val('');
                            
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        } 
                    }); 
                    return false;
                }
        </script>  
        <footer class="container-fluid">
            <p>Footer Text</p>
        </footer>
    </body>
</html>

