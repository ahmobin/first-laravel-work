<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class postController extends Controller
{
    public function createPost(){
        $categories = DB::table('categories')->get();
        return view('post.createpost', compact('categories'));
    }

    public function storePost(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'details' => 'required|min:200',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_Id'] = $request->category;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/image/posts/';
            $image_url = $upload_path.$image_full_name;
            $upload = $image->move($upload_path, $image_full_name);
            $data['image'] = $image_url;

            DB::table('posts')->insert($data);
            $notification=array(
                'messege' => 'Successfully Post Inserted',
                'alert-type' => 'success'
            );
            return Redirect()-> route('all.posts')->with($notification);
        }else{
            DB::table('posts')->insert($data);
            $notification=array(
                'messege' => 'Successfully Post Inserted',
                'alert-type' => 'success'
            );
            return Redirect()-> route('all.posts')->with($notification);
        }
    }

    public function viewPosts(){
        $posts = DB::table('posts')->join('categories','posts.category_Id','categories.id')->select('posts.*','categories.name')->get();
        return view('post.all-posts',compact('posts'));
    }

    public function singleView($id){
        $view = DB::table('posts')->join('categories','posts.category_Id','categories.id')
                                  ->select('posts.*','categories.name')->where('posts.id',$id)->first();
        return view('post.view-post')->with('single',$view);
    }

    public function postEdit($id){
        $category = DB::table('categories')->get();
        $post = DB::table('posts')->where('id',$id)->first();
        return view('post.post-update',compact('category','post'));
    }

    public function postUpdated(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'details' => 'required|min:200',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_Id'] = $request->category;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/image/posts/';
            $image_url = $upload_path.$image_full_name;
            $upload = $image->move($upload_path, $image_full_name);
            $data['image'] = $image_url;
            unlink($request->old_img);
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'messege' => 'Successfully Post Updated',
                'alert-type' => 'success'
            );
            return Redirect()-> route('all.posts')->with($notification);
        }else{
            $data['image'] = $request ->old_img;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'messege' => 'Successfully Post Updated',
                'alert-type' => 'success'
            );
            return Redirect()-> route('all.posts')->with($notification);
        }
    }

    public function postDelete($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $img = $post->image;

        $delete = DB::table('posts')->where('id',$id)->delete();
        if($delete){
            unlink($img);
            $notification=array(
                'messege' => 'Successfully Post Deleted',
                'alert-type' => 'danger'
            );
            return Redirect()-> route('all.posts')->with($notification);
        }else{
            $notification=array(
                'messege' => 'Something Were Wrong',
                'alert-type' => 'error'
            );
            return Redirect('all.posts')-> route()->with($notification);
        }
    }
}
