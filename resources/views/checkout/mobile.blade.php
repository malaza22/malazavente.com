@extends('layouts.master')

@section('content')
    
    <div class="col-md-12">
        <a href="{{ route('cart.index') }}" class="btn btn-sm btn-secondary mt-3">Revenir au panier</a>
        <div class="row">
            <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="fa fa-mobule"></i>Procéder au paiement</strong>
                        </div>
                        <div class="card-body card-block">
                        <form action="{{route('checkout.commande')}}" method="POST" class="my-4" id="payment-form">
                                    {{ csrf_field() }}
                                    <div class="row form-group text-center">
                                        <div class="col-12">
                                            <label class="form-control-label ">TELMA: <b>#111*1*4*1*0340604465*montanttotal*codemvola#OK</b></label>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-control-label ">ORANGE: <b>#111*1*4*1*0320604465*montanttotal*codemvola#OK</b></label>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-control-label ">AIRTEL: <b>#111*1*4*1*0330604465*montanttotal*codemvola#OK</b></label>
                                        </div>
                                    </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="price" class="form-control-label">Numero Telephone</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="telephone" name="telephone" placeholder="Enter numero telephone" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" id="amount" name="amount" value="{{ Cart::total() }}">
                                <input type="hidden" id="status" name="status" value="0">
                            <div class="card-footer">
                                    <button class="btn btn-success btn-block mt-3">
                                        <i class="fa fa-credit-card" aria-hidden="true"></i> Payer maintenant ({{ getPrice(Cart::total()) }})
                                    </button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection
