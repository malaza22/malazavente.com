@extends('layouts.master')

@section('content')
    <div class="col-md-12 p-4">
        <div class="row  border rounded mb-1 shadow-sm h-md-300 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <div class="d-inline-block mb-2 text-info">
                
                @if ($stock === 'Disponible')
                    <div class="badge badge-pill badge-success">{{ $stock }}</div>
                @else
                    <div class="badge badge-pill badge-danger">{{ $stock }}</div>
                @endif

                    @foreach ($product->categories as $category)
                        {{ $category->name }}{{ $loop->last ? '' : ', '}}
                    @endforeach
            </div>
            <h5 class="mb-2">{{$product->title}}</h5>
            <p class="card-text mb-auto">{!!$product->description!!}</p>
            <h4 class="text-secondary">{{$product->getPrice()}}</h4>
            @if ($stock === 'Disponible')
            <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button type="submit" class="stretched-link btn btn-sm btn-info mb-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier</button>
            </form>
            @endif
            </div>
            <div class="d-lg-block">
                <img src="{{asset('storage/'.$product->image) }}" alt="image" width="150" height="250">
            </div>
        </div>
    </div>
@endsection