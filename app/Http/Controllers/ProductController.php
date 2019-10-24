<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;
use Image;

class ProductController extends Controller
{
    public function addProduct(){
    	$categories = Category::where('publicationStatus',1)->get();

    	return view('admin.product.addProduct',['categories'=>$categories]);
    }

    public function saveProduct(Request $request){

        $request->validate([
            'productName' => 'required',
            'productCategory' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required|numeric',
            'productDescription' => 'required',
            'publicationStatus' => 'required',
        ]);

        $lastId = Product::insertGetId([
            'productName' => $request->productName,
            'categoryId' => $request->productCategory,
            'productPrice' => $request->productPrice,
            'productQuantity' => $request->productQuantity,
            'productDescription' => $request->productDescription,
            'publicationStatus' => $request->publicationStatus,
        ]);

        if ($request->hasFile('productPicture')) {
            $photo = $request->productPicture;
            $photoName = $lastId . '.' . $photo->getClientOriginalExtension();
            //echo $photoName;
            Image::make($photo)->resize(400, 450)->save(base_path("public/uploads/product_photo/" . $photoName), 100);
            Product::findOrFail($lastId)->update([
                'productPicture' => $photoName
            ]);
        }

    	// $product = new Product();

    	// $product->productName = $request->productName;
    	// $product->categoryId= $request->productCategory;
    	// $product->productPrice = $request->productPrice;
    	// $product->productQuantity = $request->productQuantity;
    	// $product->productDescription = $request->productDescription;
    	// //$product->productPicture = $imageUrl;
    	// $product->productPicture = 'picture';
    	// $product->publicationStatus = $request->publicationStatus;
    	// $product->save();

    	// $lastId = $product->id;

    	// $productPic = $request->file('productPicture');
    	// $name = $lastId.$productPic->getClientOriginalName();
    	// $uploadPath = 'public/uploadPic/';

    	// $productPic->move($uploadPath,$name);
    	// $imageUrl = $uploadPath.$name;

    	// $updateImage = Product::find($lastId);
    	// $updateImage->productPicture = $imageUrl;
    	// $updateImage->save();

    	return redirect('/add_product')->with('msg','Added Product Successfully');
    }

    public function manageProduct(){
        $products = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->get();

            return view('admin.product.manageProduct',['products'=>$products]);

    }

    public function viewProduct($id){
        $productById = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->where('products.id',$id)
            ->first();

            return view('admin.product.viewProduct',['product'=>$productById]);
    }

    public function editProduct($id){

        $productById = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->where('products.id',$id)
            ->first();

            $categories = Category::all();
            return view('admin.product.editProduct',['product'=>$productById,'categories'=>$categories]);
    }

    public function updateProduct(Request $request){
        // $product = Product::find($request->productId);

        // $productImage = $request->file('productPicture');
        // if($productImage){
        //     // unlink($product->productPicture);
        //     $imageName = $request->productId.$productImage->getClientOriginalName();
        //     $uploadPath = 'public/uploadPic/';

        //     $productImage = $uploadPath.$imageName;

        //     $imageUrl = $uploadPath.$imageName;
        // }
        // else{
        //     $imageUrl = $product->productPicture;
        // }

        // $product->productName = $request->productName;
        // $product->categoryId = $request->productCategory;
        // $product->productPrice = $request->productPrice;
        // $product->productQuantity = $request->productQuantity;
        // $product->productDescription = $request->productDescription;
        // $product->productPicture = $imageUrl;
        // $product->publicationStatus = $request->publicationStatus;
        // $product->save();







        // $request->validate([
        //     'productName' => 'required',
        //     'categoryId' => 'required',
        //     'productPrice' => 'required',
        //     'productQuantity' => 'required',
        //     'productDescription' => 'required',
        //     'publicationStatus' => 'required',
        // ]);
        $data = Product::find($request->productId)->update([
            'productName' => $request->productName,
            'categoryId' => $request->categoryId,
            'productPrice' => $request->productPrice,
            'productQuantity' => $request->productQuantity,
            'productDescription' => $request->productDescription,
            // 'productPicture' => $request->productPicture,
            'publicationStatus' => $request->publicationStatus,
        ]);
        if ($request->hasFile('productPicture')) {
            $image_name = Product::findOrFail($request->productId)->productPicture;
            if ($image_name == 'NoImage.jpg') {
                $uploas_image = $request->productId . '.' . $request->productPicture->getClientOriginalExtension();
                Image::make($request->productPicture)->resize(400, 450)->save(base_path("public/uploads/product_photo/" . $uploas_image), 100);
                Product::findOrFail($request->productId)->update([
                    'productPicture' => $uploas_image,
                ]);
            } else {
                $update_image = $request->productId . '.' . $request->productPicture->getClientOriginalExtension();
                unlink(base_path("public/uploads/product_photo/" . $image_name));
                Product::findOrFail($request->product_id)->update([
                    'productPicture' => $update_image,
                ]);
                Image::make($request->productPicture)->resize(400, 450)->save(base_path("public/uploads/product_photo/" . $update_image), 100);
            }
        }










        return redirect('/manage_product')->with('msg','Updated Successfull');
    }

    public function deleteProduct($id){
        $update_image = Product::find($id)->productPicture;
        unlink(base_path("public/uploads/product_photo/" . $update_image));
        $product = Product::find($id);

        //unlink($product->productPicture);

        $product->delete();
        return redirect('/manage_product')->with('msg','Deleted Succssfull');
    }

    public function pmanageProduct(){
        $products = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->get();

            $products = DB::table('products')->paginate(4);

        return view('admin.product.pmanageProduct',['products'=>$products]);
    }
}
