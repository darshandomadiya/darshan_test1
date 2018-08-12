<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

class BlogModel extends Model
{
    protected $table = 'blog';
    
    public static function insertBlogData($request){
       $blog = new BlogModel;
       $blog->title       = $request->blog_title;
       $blog->description = $request->blog_desc;
       $blog->post_by     = $request->blog_author;
       $blog->post_date   = date("Y-m-d");
       $blog->category    = implode(',',$request->blog_category);
	   $blog->tag         = implode(',',$request->blog_category);
       $blog->status      = 1;
       $blog->created_at  = date("Y-m-d");
      
       $blog->save();
    }
    
    public static function getBlogData(){
        return BlogModel::get();
    }
	
	public static function getBlogCategories(){
        return DB::table('blog_category')->get();
    }
	
	public static function filterBlogData($request){
		
		$filterData = DB::table('blog');
		
		if($request->author != ''){
			$filterData->orWhere('post_by', 'LIKE',"'%$request->author%'");
		}
		if($request->category != ''){
			$filterData->orWhereRaw("FIND_IN_SET('".$request->category."',category)"); 
		}
		if($request->from_date != '' && $request->to_date != ''){
			$filterData->orWhereBetween('post_date', [$request->from_date,$request->to_date]);
		}
		$dd = $filterData->get();
		return $dd;
	}
    
}
