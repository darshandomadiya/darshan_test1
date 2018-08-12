<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BlogModel;
use DB;

class BlogController extends Controller
{
    public function index(){
        $blogData = BlogModel::getBlogData();
		$blogCategories = BlogModel::getBlogCategories();
        return view('blog.index', ['blogData'=>$blogData,'blogCategories'=>$blogCategories]); 
    }

    public function postBlog(Request $request){
		
		$data = BlogModel::insertBlogData($request);
		
		$return["title"] = $request->blog_title;
		$return["description"] = $request->blog_desc;
		$return["author"] = $request->blog_author;
		$return["post_date"] = date("Y-m-d");
		$return["blog_category"] = implode(',',$request->blog_category);
		echo json_encode($return);
    } 
	
	public function filterBlog(Request $request){
		
		$filterDatas = BlogModel::filterBlogData($request);
		
		$html = '';
		foreach($filterDatas as $data){
			$return["title"] = $data->title;
			$return["description"] = $data->description;
			$return["author"] = $data->post_by;
			$return["post_date"] = $data->post_date;
			$blog_category = $data->category;
			
			$html .= "<div><hr><h2>".$data->title."</h2>
				<h5><span class='glyphicon glyphicon-time'></span>
				Post by<b>".$data->post_by."</b>,".$data->post_date."</h5>
				<h5><span class='label label-danger'>".$blog_category."</span></h5><br>
				<p>".$data->description."</p><br><br></div>";
			 
		}
		echo $html;
    }
}
