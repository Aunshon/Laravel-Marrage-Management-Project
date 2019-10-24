<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function addCategory(){
    	return view('admin.category.addCategory');
    }

    public function saveCategory(Request $request){
    	$categories = new Category();

    	$categories->categoryName = $request->categoryName;
    	$categories->categoryDescription = $request->categoryDescription;
    	$categories->productType = $request->productType;
    	$categories->publicationStatus = $request->publicationStatus;
    	$categories->save();

    	return redirect('/add_category')->with('msg','Saved Successfully');
    }

    public function manageCategory(){
    	$categories = DB::table('categories')->Paginate(3);
      return view('admin.category.manageCategory',['categories'=>$categories]);
    }

    public function editCategory($id){
    	$categoryById = Category::where('id',$id)->first();

      return view('admin.category.editCategory',['categoryById'=>$categoryById]);
    }

    public function updateCategory(Request $request){
    	$category = Category::find($request->categoryId);

      $category->categoryName = $request->categoryName;
      $category->categoryDescription = $request->categoryDescription;
      $category->publicationStatus = $request->publicationStatus;
      $category->save();

      return redirect('/manage_category')->with('msg','Updated Successfully');
    }

    public function deleteCategory($id){
    	$category = Category::find($id);
      $category->delete();

      return redirect('/manage_category')->with('msg','Deleted Successfully');
    }
}
