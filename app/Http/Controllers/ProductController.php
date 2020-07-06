<?php

namespace App\Http\Controllers;

use Image;
use Input;
use App\Vende;
use App\Address;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request){

        if (request()->categorie) {
          $products = Product::with('categories')->whereHas('categories',function ($query){
                $query->where('slug',request()->categorie);
            })->orderBy('created_at','DESC')->paginate(12);
        }else{
            $products = Product::with('categories')->where('status','1')->orderBy('created_at','DESC')->paginate(12);
        }
        return view('products.index')->with('products',$products);
    }

    public function show($slug){
        $product = Product::where('slug',$slug)->firstOrfail();
        $stock = $product->stock === 0 ? 'Indisponible' : 'Disponible';
        return view('products.show',['product'=>$product,'stock'=>$stock]);
    }

    public function search()
    {
        request()->validate([
            'q' => 'required|min:3'
        ]);
        $q = request()->input('q');

        $products = Product::where('title', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->paginate(6);

        return view('products.search')->with('products', $products);
    }

    public function vende(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $products = new Product;
            $products->title = $data['title'];
            $products->slug = $data['slug'];
            $products->description = $data['description'];
            $products->price = $data['price'];
              //Uplaod image
              if ($request->hasFile('image')) {
                echo $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                  //image path code
                  $extension = $image_tmp->getClientOriginalExtension();
                  $filename = rand(111, 99999) . '.' . $extension;
                  $img_path = 'storage/' . $filename;
                  //image resize
                  Image::make($image_tmp)->resize(500, 500)->save($img_path);
                  $products->image = $filename;
                }
              }
            $products->stock = $data['stock'];
            $products->status = $data['status'];
            $products->save();
            DB::table('category_product')->insert([
              'category_id'=> $data['category_id'],
              'product_id' => $products->id
            ]);
            $vendes = new Vende;
            $vendes->user_id = $data['user_id'];
            $vendes->user_name = $data['user_name'];
            $vendes->title = $data['title'];
            $vendes->slug = $data['slug'];
            $vendes->description = $data['description'];
            $vendes->price = $data['price'];
              //Uplaod image
              if ($request->hasFile('image')) {
                echo $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                  //image path code
                  $extension = $image_tmp->getClientOriginalExtension();
                  $filename = rand(111, 99999) . '.' . $extension;
                  $img_path = 'storage/' . $filename;
                  //image resize
                  Image::make($image_tmp)->resize(500, 500)->save($img_path);
                  $vendes->image = $filename;
                }
              }
            $vendes->stock = $data['stock'];
            $vendes->status = $data['status'];
            $vendes->save();
            return redirect()->back()->with('success','votre produit est publier après vous avez informe par un sms !!');
        }
        $categories = Category::all();
        $categories_dropdown = "<option value=''selected disabled>select</option>";
          foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name . "</option>";
          }
        $address = count(Address::all()->where('user_email',Auth()->user()->email));
        return view('products.vends')->with(['categories_dropdown'=>$categories_dropdown,'address'=>$address]);
    }

}
