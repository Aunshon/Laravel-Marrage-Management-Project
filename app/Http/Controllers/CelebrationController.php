<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CelebrationCategory;
use App\Celebration;
use Carbon\Carbon;
use App\Category;
use App\Product;
use Image;

class CelebrationController extends Controller
{
    function index()
    {
        return view('celebration.celebration');
    }
    function showCart()
    {
        return view('frontEnd.cart.showCart');
    }

    function addcelebrationcategory()
    {
        $all_celebration_category = CelebrationCategory::all();
        return view('celebration.addCategory',compact('all_celebration_category'));
    }
    function managecelebrationcategory()
    {
        $all_celebration_category = CelebrationCategory::all();
        return view('celebration.manageCategory', compact('all_celebration_category'));
    }
    function addcelebrationproduct()
    {
        $all_celebration_category = CelebrationCategory::all();
        return view('celebration.addProduct', compact('all_celebration_category'));
    }
    function managecelebrationproduct()
    {
        $products = Celebration::all();
        return view('celebration.manageProduct',compact('products'));
    }
    function save_celebration_category(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
        CelebrationCategory::insert([
        'categoryName' => $request->categoryName,
        'categoryDescription'=> $request->categoryDescription,
        'publicationStatus' => $request->publicationStatus,
        'created_at' => Carbon::now()
        ]);
        return back()->with('msg','Category added successfully');
    }
    function edit_celebration_category($id)
    {
        $categoryById = CelebrationCategory::find($id);
        return view('celebration.editCategory',compact('categoryById'));
    }
    function update_celebration_category(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
        CelebrationCategory::find($request->id)->update([
            'categoryName' => $request->categoryName,
            'categoryDescription' => $request->categoryDescription,
            'publicationStatus' => $request->publicationStatus,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('msg', 'Category Updated successfully');
    }
    function delete_celebration_category($id)
    {
        CelebrationCategory::find($id)->delete();
        return back()->with('msg', 'Category deleted successfully');
    }
    function save_celebration_product(Request $request)
    {
        $request->validate([
            'productName' => 'required',
            'productCategory' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required|numeric',
            'productDescription' => 'required',
            'publicationStatus' => 'required',
        ]);

        // $product = new Celebration();

        // $product->productName = $request->productName;
        // $product->categoryId = $request->productCategory;
        // $product->productPrice = $request->productPrice;
        // $product->productQuantity = $request->productQuantity;
        // $product->productDescription = $request->productDescription;
        // //$product->productPicture = $imageUrl;
        // $product->productPicture = 'picture';
        // $product->publicationStatus = $request->publicationStatus;
        // $product->save();

        $lastId = Celebration::insertGetId([
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
            Image::make($photo)->resize(400, 450)->save(base_path("public/uploads/CelebrationPic/" . $photoName), 100);
            Celebration::findOrFail($lastId)->update([
                'productPicture' => $photoName
            ]);
        }

        // $lastId = $product->id;

        // $productPic = $request->file('productPicture');
        // $name = $lastId . $productPic->getClientOriginalName();
        // $uploadPath = 'public/uploadCelebrationPic/';

        // $productPic->move($uploadPath, $name);
        // $imageUrl = $uploadPath . $name;

        // $updateImage = Celebration::find($lastId);
        // $updateImage->productPicture = $imageUrl;
        // $updateImage->save();

        return back()->with('msg', 'Added Successfully');
    }
    function view_celebration_product($id)
    {
        $product = Celebration::find($id);
        return view('celebration.viewProduct',compact('product'));
    }
    function edit_celebration_product($id)
    {
        $product = Celebration::find($id);
        return view('celebration.editProduct', compact('product'));
    }
    function update_celebration_product(Request $request)
    {



        // if ($request->productPicture != null) {
        //     echo "not null";
        // }
        // else {
        //     echo "null";
        // }



        $data = Celebration::find($request->productId)->update([
            'productName' => $request->productName,
            'categoryId' => $request->categoryId,
            'productPrice' => $request->productPrice,
            'productQuantity' => $request->productQuantity,
            'productDescription' => $request->productDescription,
            // 'productPicture' => $request->productPicture,
            'publicationStatus' => $request->publicationStatus,
        ]);
        // if ($request->hasFile('productPicture')) {
        if ($request->hasFile('productPicture')) {
            $image_name = Celebration::findOrFail($request->productId)->productPicture;
            if ($image_name == 'NoImage.jpg') {
                $uploas_image = $request->productId . '.' . $request->productPicture->getClientOriginalExtension();
                Image::make($request->productPicture)->resize(400, 450)->save(base_path("public/uploads/CelebrationPic/" . $uploas_image), 100);
                Celebration::findOrFail($request->productId)->update([
                    'productPicture' => $uploas_image,
                ]);
            } else {
                $update_image = $request->productId . '.' . $request->productPicture->getClientOriginalExtension();
                unlink(base_path("public/uploads/CelebrationPic/" . $image_name));
                Celebration::findOrFail($request->productId)->update([
                    'productPicture' => $update_image,
                ]);
                Image::make($request->productPicture)->resize(400, 450)->save(base_path("public/uploads/CelebrationPic/" . $update_image), 100);
            }
        }










        return back()->with('msg','Celebration data updated successfully 👍');
    }
    function delete_celebration_product($id)
    {
        $update_image = Celebration::find($id)->productPicture;
        unlink(base_path("public/uploads/CelebrationPic/" . $update_image));
        Celebration::find($id)->delete();
        return back()->with('msg','Deleted Successfully 😊');
    }
    function product($id)
    {
        $product_data = Product::where('categoryId',$id)->get();
        return view('celebration.product',compact('product_data'));
    }

    // function maleFasion()
    // {
    //     return view('celebration.maleFasion');
    // }
    // function maleParlour()
    // {
    //     return view('celebration.maleParlour');
    // }
    // function jewellary()
    // {
    //     return view('celebration.jewellary');
    // }
    // function cloth()
    // {
    //     return view('celebration.cloth');
    // }
    // function femaleParlour()
    // {
    //     return view('celebration.femaleParlour');
    // }
}
