@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <div class="card">
                <div class="card-header" style="background-color:turquoise">Commande <strong>payes</strong> </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    @foreach (Auth()->user()->commandes as $commande)
                        @if ($commande->status === 1)
                        <div class="card">
                                <div class="card-header">
                                    commande passée le {{ Carbon\Carbon::parse($commande->payment_created_at)->format('Y/m/d à H:i')}} 
                                    d'un montant de <strong> {{ getPrice($commande->amount) }}</strong> payer par <strong> Mobule</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <h6>List des produits</h6>
                                            @foreach ( unserialize($commande->products) as $product)
                                                <div>Nom du produit: {{ $product[0]}}</div>
                                                <div>Prix: {{getPrice($product[1])}}</div>
                                                <div>Quantite: {{($product[2])}}</div>
                                            @endforeach
                                        </div>
                                        <div class="col-5">
                                            <label for=""><img src="../img/payer.jpg" alt="payer"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <a class="col-sm-2 btn btn-dark" href="#"><i class="fas fa-print"></i>Print</a>
                                        <button class="col-sm-2 btn btn-success"><i class="fas fa-print"></i>Pdf</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
              

                    @foreach (Auth()->user()->orders as $order)
                    <div class="card">
                        <div class="card-header">
                            commande passée le {{ Carbon\Carbon::parse($order->payment_created_at)->format('Y/m/d à H:i')}} 
                            d'un montant de <strong> {{ getPrice($order->amount) }}</strong> payer par <strong> Carte</strong>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <h6>List des produits</h6>
                                    @foreach ( unserialize($order->products) as $product)
                                    <div>Nom du produit: {{ $product[0]}}</div>
                                    <div>Prix: {{getPrice($product[1])}}</div>
                                    <div>Quantite: {{($product[2])}}</div>
                                    @endforeach
                                </div>
                                <div class="col-5">
                                    <label for=""><img src="../img/payer.jpg" alt="payer"></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <button class="col-sm-2 btn btn-dark"><i class="fas fa-print"></i>Print</button>
                                <button class="col-sm-2 btn btn-success"><i class="fas fa-print"></i>Pdf</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header" style="background-color:salmon">Commande <strong>non payes</strong></div>
                <div class="card-body " >
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach (Auth()->user()->commandes as $commande)
                        @if ($commande->status === 0)
                            <div class="card" >
                                <div class="card-header">
                                    commande passée le
                                    {{ Carbon\Carbon::parse($commande->payment_created_at)->format('Y/m/d à H:i')}}
                                    d'un montant de <strong> {{ getPrice($commande->amount) }}</strong> payer par <strong> Mobule</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <h6>List des produits</h6>
                                            @foreach ( unserialize($commande->products) as $product)
                                            <div>Nom du produit: {{ $product[0]}}</div>
                                            <div>Prix: {{getPrice($product[1])}}</div>
                                            <div>Quantite: {{($product[2])}}</div>
                                            @endforeach
                                        </div>
                                        <div class="col-5">
                                            <label><img src="../img/nonpayer.jpg" alt="payer"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <button class="col-sm-2 btn btn-dark"><i class="fas fa-print"></i>Print</button>
                                        <button class="col-sm-2 btn btn-success"><i class="fas fa-print"></i>Pdf</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection