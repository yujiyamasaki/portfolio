<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search_blog_text && $request->blog_category){
            $blogs = Blog::where('blog_title','like','%'.$request->search_blog_text.'%')->orWhere('blog_detail','like','%'.$request->search_blog_text.'%')->where('blog_category',$request->blog_category)->paginate(5);
            $blogsTotal = count(Blog::where('blog_title','like','%'.$request->search_blog_text.'%')->orWhere('blog_detail','like','%'.$request->search_blog_text.'%')->where('blog_category',$request->blog_category)->get());
        }elseif($request->search_blog_text || $request->blog_category){
            if($request->search_blog_text == '' && $request->blog_category){
                $blogs = Blog::where('blog_category',$request->blog_category)->paginate(5);
                $blogsTotal = count(Blog::where('blog_category',$request->blog_category)->get());
            }
            if($request->search_blog_text && $request->blog_category == ''){
                $blogs = Blog::where('blog_title','like','%'.$request->search_blog_text.'%')->orWhere('blog_detail','like','%'.$request->search_blog_text.'%')->paginate(5);
                $blogsTotal = count(Blog::where('blog_title','like','%'.$request->search_blog_text.'%')->orWhere('blog_detail','like','%'.$request->search_blog_text.'%')->get());
            }
        }else{
            $blogs = Blog::orderby('created_at','desc')->paginate(5);
            $blogsTotal = count(Blog::all());
        }

        $param = ['blogs' => $blogs, 'blogsTotal' => $blogsTotal];
        return view('blog.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->blog_category = $request->blog_category;
        $blog->blog_title = $request->blog_title;
        $blog->blog_detail = $request->blog_detail;
        unset($request["_token"]);
        $blog->save();
        return redirect('/blog');
        // return view('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $param = ['blog' => $blog];
        return view('blog.detail', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $param = ['blog' => $blog];
        return view('blog.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $blog->blog_category = $request->blog_category;
        $blog->blog_title = $request->blog_title;
        $blog->blog_detail = $request->blog_detail;
        unset($request["_token"]);
        $blog->save();
        return redirect('/blog/detail?blog_id='.$request->blog_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $blog->delete();
        return redirect('/blog');
    }
}
