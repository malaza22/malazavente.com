<?php

namespace App\Http\Controllers;


use DateTime;
use App\Order;
use App\Product;
use App\Address;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Commande;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count()<= 0)
        {
            return redirect()->route('products.index');
        }
        Stripe::setApiKey('sk_test_51GqZklBAs3Kfgr3O8v87G6QS0spYGem8kaVNP2iQMMKoJl0D30CM7C2myIQoGGULmnEfOtSM999pARSBLJWJNrlA00eoMbHwcb');
        $intent = PaymentIntent::create([
            'amount' => round(Cart::total()),
            'currency' => 'Eur',
            // Verify your integration in this guide by including this parameter
            // 'metadata' => ['integration_check' => 'accept_a_payment'],
          ]);

          $clientSecret = Arr::get($intent,'client_secret');

        return view('checkout.carte',[
            'clientSecret' => $clientSecret, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->checkIfNotAvailable()) {
            Session::flash('error','Un produit dans votre panier n\'est pas disponible');
            return response()->json(['success' => false],400);
        }


        $data = $request->json()->all();

        $order = new Order();
        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];
        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');
        $products = [];
        $i = 0;
        foreach (Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->title;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->qty;
            $i++;
        }

        $order->products = serialize($products);
        $order->user_id = Auth()->user()->id;
        $order->save();

        if ($data['paymentIntent']['status'] === 'succeeded') {
            $this->updateStock();
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }
    }
    
    public function commande(Request $request)
    {
        if ($this->checkIfNotAvailable()) {
            Session::flash('error','Un produit dans votre panier n\'est pas disponible');
            return response()->json(['success' => false],400);
        }


        $data = $request->all();

        $commande = new Commande();
        $commande->amount = $data['amount'];
        $commande->payment_created_at = (new DateTime())->format('Y-m-d H:i:s');
            $products = [];
            $i = 0;
            foreach (Cart::content() as $product) {
                $products['product_' . $i][] = $product->model->title;
                $products['product_' . $i][] = $product->model->price;
                $products['product_' . $i][] = $product->qty;
                $i++;
            }

        $commande->products = serialize($products);//chaine de caracteur
        $commande->user_id = Auth()->user()->id;
        $commande->telephone=$data['telephone'];
        $commande->status=$data['status'];
        $commande->save();

        if ($data['status'] === '0') {
            $this->updateStock();
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return redirect('/merci')->with('success','Payment Intent Succeeded');
        } else {
            return redirect('/merci')->with('error','Payment Intent Not Succeeded');
        }
    }
    
    public function thankyou()
    {
        return Session::has('success') ? view('checkout.thankyou') : redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function checkIfNotAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->stock < $item->qty) {
                return true;
            }
        }
        return false;
    }

    private function updateStock()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['stock' => $product->stock - $item->qty]);
        }
    }

    public function facturenonpayes()
    {
       $addresse = Address::all();
        return view('checkout.facturenonpayes')->with('addresse',$addresse);
    }
    public function mobile()
    {
       $addresse = Address::all();
        return view('checkout.mobile')->with('addresse',$addresse);
    }
    public function impression()
    {
        $addresse = Address::all();
        return view('checkout.imprimer')->with('addresse',$addresse);
    }
}
