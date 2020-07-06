@extends('layouts.master')

@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
@if (Cart::count()>0)
    
<div class="col-md-12 p-4">
    <div class="pb-5">
      <div class="container">
        <div class="row  p-4 rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Produit</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Prix</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantite</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Supprimer</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach (Cart::content() as $product)
                <tr>
                    <th scope="row" class="border-0">
                      <div class="p-2">
                        <img src="{{ asset('storage/'.$product->model->image) }}" alt="photo"  width="75" height="50" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0">{{$product->model->title}}</h5>
                          <span class="text-muted font-weight-normal font-italic d-block">
                            Categories: @foreach ($product->model->categories as $category)
                                          {{ $category->name}}{{$loop->last ? '':'. '}}
                                      @endforeach 
                          </span>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong>{{getPrice($product->subtotal)}}</strong></td>
                    <td class="border-0 align-middle">
                      <select name="qty" id="qty" data-id="{{ $product->rowId }}" data-stock="{{$product->model->stock}}" class="custom-select">
                        @for ($i = 1; $i <= 6; $i++)
                            <option value="{{ $i}}" {{$i == $product->qty ? 'selected' : '' }} >{{$i}}</option>
                        @endfor
                      </select>
                    </td>
                    <td class="border-0 align-middle">
                      <form action="{{route('cart.destroy',$product->rowId)}}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button type="submit" class="col-12 btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                      </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
        
          <div class="row p-4 rounded shadow-sm">
            <div class="col-sm-6">
              @if ($address == 0)
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Address
                    </div>
                      <div class="p-3">
                          <p class="font-italic mb-4">Complete le champ <b>Address</b> avant passé à la caisse</p>
                            <form action="{{url('address')}}" method="POST" >
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" id="user_id" value="{{Auth()->user()->id}}">
                                <input type="hidden" name="user_email" id="user_email" value="{{Auth()->user()->email}}">
                                <input type="hidden" name="stat" id="stat" value="0">
                                <div class="input-group mb-4 border rounded-pill p-2">
                                    <input type="text" placeholder="Address/lot" name="address" aria-describedby="button-addon3" class="form-control border-0 @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                </div>
                                <div class="input-group mb-4 border rounded-pill p-2">
                                  <input type="text" placeholder="Ville" name="ville" aria-describedby="button-addon3" class="form-control border-0 @error('ville') is-invalid @enderror" value="{{ old('ville') }}">
                                </div>
                                <div class="input-group mb-4 border rounded-pill p-2">
                                    <input type="number" placeholder="CIN" name="cin" aria-describedby="button-addon3" class="form-control border-0 @error('cin') is-invalid @enderror" value="{{ old('cin') }}">
                                </div>
                                <div class="input-group mb-4 border rounded-pill p-2">
                                    <input type="number" placeholder="Telephones" name="telephone" aria-describedby="button-addon3" class="form-control border-0 @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}">
                                </div>
                                <button  class="col-sm-3 btn btn-sm btn-dark rounded-pill py-2 btn-block">Address</button>
                            </form>
                      </div>
                    @else
                    
                      <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Payment Methods:</div>
                      <div class="p-3">
                          <img src="../admin_asset/dist/img/credit/visa.png" alt="Visa" width="65">
                          <img src="../admin_asset/dist/img/credit/mastercard.png" alt="Mastercard" width="65">
                          <img src="../admin_asset/dist/img/credit/american-express.png" alt="American Express" width="65">
                          <img src="../admin_asset/dist/img/credit/paypal2.png" alt="Paypal" width="65">
                          <p class="font-italic mb-4">si vous avez choisir la <b>methode</b> en payment chec veuiller clique sur les bouton vert</p>
                       </div>
                       <div class="p-3">
                        <img src="../admin_asset/dist/img/credit/mvola.jpg" alt="Mastercard" width="50">
                        <img src="../admin_asset/dist/img/credit/orangemoney.jpg" alt="American Express" width="50">
                        <img src="../admin_asset/dist/img/credit/airtelmoney.jpg" alt="Paypal" width="50">
                        <p class="font-italic mb-4">si vous avez choisir la <b>methode</b> en mobule money veuiller clique sur les bouton bleu</p>
                     </div>
                      
                    @endif
                   
            </div>
            <div class="col-sm-6">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Payment</div>
                <div class="p-4">
                    @if ($address != 0)
                  <p class="font-italic mb-4">Les frais éventuels de livraison seront calculés suivant les informations que vous avez transmises.</p>
                  <ul class="list-unstyled mb-4">
                    <li class="d-flex justify-content-between py-3 border-bottom">
                      <strong class="text-muted">Sous-total </strong><strong>{{ getPrice(Cart::Subtotal()) }}</strong>
                    </li>
                    <li class="d-flex justify-content-between py-3 border-bottom">
                      <strong class="text-muted">Taxe(20%)</strong><strong>{{getPrice(Cart::tax())}}</strong>
                    </li>
                    <li class="d-flex justify-content-between py-3 border-bottom">
                      <strong class="text-muted">Total</strong>
                      <strong>{{getPrice(Cart::total())}}</strong>
                    </li>
                  </ul>
                  <div class="row">
                    <a href="{{route('checkout.mobile')}}" class="col-sm-6 btn btn-sm rounded-pill py-2 btn-info"><i class="fa  fa-mobile-phone"></i> Paiement Mobule</a>
                    {{-- <a href="{{route('checkout.facture')}}" class="col-sm-4 btn btn-sm rounded-pill py-2 btn-primary"><i class="fa fa-money"></i> Paiement en cache</a> --}}
                    <a href="{{route('checkout.carte')}}" class="col-sm-6 btn btn-sm btn-success  rounded-pill py-2"><i class="fa fa-credit-card"></i> Submit Payment</a>
                  </div>
                  @else
                  <div class="p-4">
                      <p class="font-italic mb-4">Un Address n'est pas appliqué.</p>
                  </div>
                  @endif
                </div>
              </div>
          </div>
      </div>
    </div>
</div>
  @else
    <div class="col-md-12 p-4">
        <p class="lead">Votre panier est vide ! <a  href="{{ route('products.index') }}">Continuer vers la boutique</a></p>
    </div>
  @endif

@endsection

@section('extra-js')

  <script>
    var selects = document.querySelectorAll('#qty');
    Array.from(selects).forEach((element)=>{
      element.addEventListener('change',function(){
        var rowId = this.getAttribute('data-id');
        var stock = this.getAttribute('data-stock');

        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch(
          `/panier/${rowId}`,
          {
            headers:
            {
              "Content-Type": "application/json",
              "Accept": "application/json, text-plain, */*",
              "X-Requested-With": "XMLHttpRequest",
              "X-CSRF-TOKEN": token
            },
            method: 'patch',
            body: JSON.stringify({
                qty: this.value,
                stock: stock,

            })
          }).then((data)=>{
            console.log(data);
            location.reload();
          }).catch((error)=>{
            console.log(error)
          })
      });

    });
  </script>
    
@endsection