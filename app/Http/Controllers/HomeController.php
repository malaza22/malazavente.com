<?php

namespace App\Http\Controllers;

use App\User;
use App\Address;
use App\Commande;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function facture($id)
    {   
        $commande=Commande::all();
        $addresse = Address::all();
        return view('checkout.facture')->with(['addresse'=>$addresse,'commande'=>$commande]);
    }

    public function show()
    {
        return view('profile');
    }
}
