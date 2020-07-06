@extends('layouts.master')

@section('nav-index')
{{-- <div class="nav-scroller py-1">
    <nav class="nav d-flex justify-content-between">
      @foreach ( App\Category::all() as $category)
      <a class="p-2 text-muted" href="{{ route('products.index',['categorie'=>$category->slug]) }}">
{{ $category->name }}</a>
@endforeach
<span class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
    <i class="fa fa-search"></i>
</span>
</nav>
</div> --}}
<div class="col-xl-2 text-center">
    <div class="pt-1">
            <h5>Categories</h5>
    </div>
    <hr>
    @foreach ( App\Category::all() as $category)
        <div>
            <a class="p-2 text-muted" href="{{ route('products.index',['categorie'=>$category->slug]) }}">{{ $category->name }}</a>
        </div>
    @endforeach
    <span class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
        <i class="fa fa-search">Search</i>
    </span>
</div>
@endsection

@section('content')
<div class="col-xl-10 p-1 text-center">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-xl-2 border rounded">
            <div class="p-2 flex-column position-static">
                <small class="d-inline-block text-info mb-2">
                    @foreach ($product->categories as $category)
                    {{ $category->name }}{{ $loop->last ? '' : ', '}}
                    @endforeach
                </small>
                <h5 class="mb-0">{{ $product->title }}</h5>
                <h3 class="text-secondary">{{ $product->getPrice() }}</h3>

            </div>
            <div>
                <img src="{{ asset('storage/'.$product->image) }}" alt="image" width="125" height="175">
            </div>
            <div class="p-2">
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-info">
                    <i class="fa fa-location-arrow"></i> Consulter le produit</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{ $products->appends(request()->input())->links() }}
@endsection
