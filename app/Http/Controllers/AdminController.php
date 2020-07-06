<?php

namespace App\Http\Controllers;

use Image;
use Input;
use App\User;
use App\Order;
use App\Vende;
use App\Address;
use App\Product;
use App\Category;
use App\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function connecter(Request $request)
    {
      if($request->isMethod('post')){
        $data = $request->input();
        if(Auth::attempt(['email' =>$data ['email'], 'password'=>$data ['password'],'role_id'=>'1'])){
              return redirect('admin/Category-add');
          }else{
              return redirect('admin/connecter')->with('error','Invalid Username or Password');
          }
      }
      return view('admin.auth.connecter');
    }
    public function inscrire(Request $request)
    {
      if($request->isMethod('post')){

        $data = $request->input();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->role_id = $data['role_id'];

        $user->save();
        if(Auth::attempt(['email' =>$data ['email'], 'password'=>$data ['password']])){
              return redirect('admin/Category-add')->with('success','Welcom');
          }
      }
      return view('admin.auth.inscrire');
    }

    public function Dashboard()
    {
      return view('admin.dashboard');
    }

    public function addCategorie(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $category = new Category;
            $category->name = $data['name'];
            $category->slug = $data['slug'];
            $category->save();
            return redirect()->back()->with('success','Category ajout avec success ');
        }
       return view('admin.categories.category');
    }

    public function listeCategorie()
    {
      $category = Category::all();
      return view('admin.categories.listecategory')->with('category',$category);
    }

    public function deleteCategory($id = null)
    {
      Category::where(['id' => $id])->delete();
      return redirect()->back()->with('error', 'Category Delete');
    }
  
    public function addProduct(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $products = new Product;
            $products->title = $data['title'];
            $products->slug = $data['slug'];
            if (!empty($data['description'])) {
              $products->description = $data['description'];
            } else {
              $products->description = '';
            }
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
            $products->save();

              DB::table('category_product')->insert([
                'category_id'=> $data['category_id'],
                'product_id' => $products->id
              ]);
            return redirect()->back()->with('success','Produit bien enregistre');
        }
        $categories = Category::all();
        $categories_dropdown = "<option value=''selected disabled>select</option>";
          foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name . "</option>";
          }
        return view('admin.products.product')->with(compact('categories_dropdown'));
    }
    
    public function listeProduct()
    {  
      $products =  Product::all();
      return view('admin.products.listeproduct')->with('products',$products);
    }

    public function deleteProduct($id = null)
    {
      Product::where(['id' => $id])->delete();
      return redirect()->back()->with('error', 'Product Delete');
    }

    public  function updateStatusProduct(Request $request, $id = null)
    {
      $data = $request->all();
      Product::where('id', $data['id'])->update(['status' => $data['status']]);
    }

    public function listeAddress()
    {
      $address =  Address::all();
      return view('admin.address.listeaddress')->with('address',$address);
    }

    public function deleteAddress($id = null)
    {
      Address::where(['id' => $id])->delete();
      return redirect()->back()->with('error', 'Address Delete');
    }

    public  function updateStatusAddress(Request $request, $id = null)
    {
      $data = $request->all();
      Address::where('id', $data['id'])->update(['status' => $data['status']]);
    }
    
    public function listeUser()
    {
      $user =  User::all();
      return view('admin.auth.listeuser')->with('user',$user);
    }

    public function deleteUser($id = null)
    {
      User::where(['id' => $id])->delete();
      return redirect()->back()->with('error', 'User Delete');
    }

    public function listevende()
    {
      $vende =  Vende::all();
      return view('admin.vendes.listevende')->with('vende',$vende);
    }

    public function deleteVende($id = null)
    {
      Vende::where(['id' => $id])->delete();
      return redirect()->back()->with('error', 'Vende Delete');
    }

    public function listecommandeMobile()
    {
      $commandeMobile =  Commande::all();
      return view('admin.commandes.listecommandeMobile')->with('commandeMobile',$commandeMobile);
    }

    public  function updateStatusCommandeMobile(Request $request, $id = null)
    {
      $data = $request->all();
      Commande::where('id', $data['id'])->update(['status' => $data['status']]);
    }

    public function deleteCommandeMobile($id = null)
    {
      Commande::where(['id' => $id])->delete();
      return redirect()->back()->with('error', 'Commande Delete');
    }

    public function listecommandeCarte()
    {
      $commandeCarte =  Order::all();
      return view('admin.commandes.listecommandeCarte')->with('commandeCarte',$commandeCarte);
    }

    // public  function updateStatusCommandeCarte(Request $request, $id = null)
    // {
    //   $data = $request->all();
    //   Order::where('id', $data['id'])->update(['status' => $data['status']]);
    // }

    public function deleteCommandeCarte($id = null)
    {
      Order::where(['id' => $id])->delete();
      return redirect()->back()->with('error', 'Commande Delete');
    }
  
}
