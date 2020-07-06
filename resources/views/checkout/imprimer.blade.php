@extends('layouts.master')

@section('content')
    <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> Malaza.mg
              <small class="float-right">Date: {{date('d/m/Y')}}</small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong>Malaza</strong><br>
              Lot 141, Tanambao verrerie<br>
              TOAMASINA, 501<br>
              Phone: (+261) 34 06 044 65<br>
              Email: malazaarnold20100@gmail.com
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
                    <strong>{{Auth()->user()->name}}</strong><br>
                    
                    @foreach ($addresse as $addres)
                        @if ($addres->user_id == Auth()->user()->id)
                                {{$addres->address }}<br>
                                {{$addres->ville }}<br>
                        Phone:  {{$addres->telephone }}<br> 
                        @endif
                    @endforeach
                    Email: {{Auth()->user()->email }}
                    </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice #007612</b><br>
            <br>
            <b>Order ID:</b> 4F3S8J<br>
            <b>Payment Due:</b> {{date('d/m/Y')}}<br>
            <b>Account:</b> 968-34567
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    
        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="border-0 bg-light">
                            <div class="p-2 px-3 text-uppercase">Quantite</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Produit</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Prix</div>
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $product)
                        <tr>
                            <td class="border-0 align-middle">

                                    <select disabled name="qty" id="qty" data-id="{{ $product->rowId }}" data-stock="{{$product->model->stock}}" class="custom-select-sm">
                                        @for ($i = 1; $i <= 1; $i++)
                                            <option value="{{ $i}}" {{$i == $product->qty ? 'selected' : '' }} >{{$i}}</option>
                                        @endfor
                                    </select>
                                </td>
                            <td scope="row" class="border-0">
                            <div class="p-2">
                                <img src="{{$product->model->image}}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{$product->model->title}}</a></h5>
                                <span class="text-muted font-weight-normal font-italic d-block">
                                    Category: @foreach ($product->model->categories as $category)
                                                {{ $category->name}}{{$loop->last ? '':'. '}}
                                            @endforeach 
                                </span>
                                </div>
                            </div>
                            </td>
                            <td class="border-0 align-middle"><strong>{{getPrice($product->subtotal)}}</strong></td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    
        <div class="row p-4 rounded shadow-sm">
            <div class="col-sm-7">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Payment Methods:</div>
                    <div class="p-3">
                      <img src="../admin_asset/dist/img/credit/mvola.jpg" alt="mvole" width="50">
                      <img src="../admin_asset/dist/img/credit/orangemoney.jpg" alt="orangemoney" width="50">
                      <img src="../admin_asset/dist/img/credit/airtelmoney.jpg" alt="airtelmoney" width="50">
                        <p class="font-italic mb-4">Complete le champ <b>Address</b> avant passé à la caisse</p>
                     </div>
            </div>
            <div class="col-sm-5">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Amount Due {{date('d/m/Y')}}</div>
                <div class="p-4">
                    
                  <p class="font-italic mb-4">Les frais éventuels de livraison seront calculés suivant les informations que vous avez transmises.</p>
                  <ul class="list-unstyled mb-4">
                    <li class="d-flex justify-content-between py-3 border-bottom">
                      <strong class="text-muted">Sous-total </strong><strong>{{ getPrice(Cart::Subtotal()) }}</strong>
                    </li>
                    <li class="d-flex justify-content-between py-3 border-bottom">
                      <strong class="text-muted">Taxe (20%) </strong><strong>{{getPrice(Cart::tax())}}</strong>
                    </li>
                    <li class="d-flex justify-content-between py-3 border-bottom">
                      <strong class="text-muted">Total</strong>
                      <h5 class="font-weight-bold">{{getPrice(Cart::total())}}</h5>
                    </li>
                  </ul>
                </div>
              </div>
        </div>
        <!-- /.row -->
    </section>
    @section('extra-js')
    <script type="text/javascript"> 
        window.addEventListener("load", window.print());
    </script> 
    @endsection
@endsection