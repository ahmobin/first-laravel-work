<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class categoryController extends Controller
{
    public function addCategory(){
        return view('category.add_category');
    }

    public function storeCategory(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25',
            'slug' => 'required|unique:categories|max:25',
        ]);

        $data = array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
        //for checking
        //return response()->json($data);
        // or can be using array..
        //echo "<pre>".print_r($data)."</pre>";

        if($category){
            $notification=array(
                'messege' => 'Successfully Category Inserted',
                'alert-type' => 'success'
            );
            return Redirect()-> route('view.category')->with($notification);
        }else{
            $notification=array(
                'messege' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return Redirect()-> back()->with($notification);
        }
    }

    public function viewCategory(){
        $category = DB::table('categories')->get();
        return view('category.view_category',compact('category'));
    }

    public function singleCategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('category.category')->with('single', $category);
    }

    public function deleteCategory($id){
        $delete = DB::table('categories')->where('id',$id)->delete();
        if($delete){
            $notification=array(
                'messege' => 'Successfully Category Deleted',
                'alert-type' => 'danger'
            );
            return Redirect()-> back()->with($notification);
        }
    }

    public function editCategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('category.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:25',
            'slug' => 'required|max:25',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        $category = DB::table('categories')->where('id',$id)->update($data);
        if($category){
            $notification=array(
                'messege' => 'Successfully Category Updated',
                'alert-type' => 'success'
            );
            return Redirect()-> route('view.category')->with($notification);
        }else{
            $notification=array(
                'messege' => 'Nothing To Update',
                'alert-type' => 'error'
            );
            return Redirect()-> back()->with($notification);
        }
    }
}
