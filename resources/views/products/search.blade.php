@extends('layouts.master')

@section('content')
@foreach ($products as $product)    
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-3 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2">
              @foreach ($product->categories as $category)
                  {{ $category->name }}
              @endforeach
            </strong>
            <h5 class="mb-0">{{$product->title}}</h5>
            <p class="mb-0">{{$product->subtitle}}</p>
            <strong class="display-4 mb-4 text-secondary">{{$product->getPrice()}}</strong>
            <div class="row col-auto">
            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-sm btn-primary">
              <i class="fa fa-location-arrow" aria-hidden="true"></i> Consulter le produit</a>
          </div>
        </div>
          <div class="col-auto d-none d-lg-block">
            <img src="{{ asset('storage/'.$product->image) }}" alt="image" width="200" height="250">
          </div>
        </div>
      </div>
@endforeach
{{ $products->appends(request()->input())->links() }}
@endsection