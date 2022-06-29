<?php

namespace App\Http\Controllers\frontend;

use App\Blog;
use App\BlogTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

    	$blog = Blog::latest()->paginate(12);
 
    	return view('frontend.blog.index',compact('blog'));
    }

    public function single_blog_post($slug)
    {    
        $data['post']=Blog::where('slug',$slug)->first();
        $data['title']=$data['post']->title;
        $data['meta_description']=$data['post']->description;
        $data['keywords']=$data['post']->keywords;
        $data['recents']=Blog::where('id','!=',$post->id)->latest()->take(4)->get();

        return view('frontend.blog.single',$data);
    }

    public function blog_according_to_tag(BlogTag $tag)
    {
       $blog = $tag->blogs();
       return view('frontend.blog.index',compact('blog'));
    }

}
