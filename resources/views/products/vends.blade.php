@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @if ($address == 0)
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Address</div>
                        <div class="p-3">
                            <p class="font-italic mb-4">Complete le champ <b>Address</b> avant passé à la vende quelque chose</p>
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
                            <div class="card">
                                    <div class="card-header">
                                        <strong><i class="zmdi zmdi-plus"></i> Add Produit</strong>
                                        <p class="font-italic m-1">Complete tous les <b>champs</b> pour vende quelque chose</p>
                                        <p class="font-italic"><b>NB</b> les prix sont fixé 10.000 Ar</p>
                                    </div>
                                    
                                <div class="card-body card-block">
                                <form action="{{url('/vends')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}

                                <input type="hidden" id="user_id" name="user_id" value="{{Auth()->user()->id}}" class="form-control">
                                <input type="hidden" id="user_name" name="user_name" value="{{Auth()->user()->name}}" class="form-control"> 
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="category" class=" form-control-label">Type</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="category_id" id="category_id " value="{{$categories_dropdown}}"> 
                                                <?php echo $categories_dropdown ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class=" form-control-label">Titre</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="title" name="title" placeholder="Entre Tilte" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="slug" class=" form-control-label">Sous description</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="slug" name="slug" placeholder="Enter code" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="description" class=" form-control-label">Description</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="description" id="description" rows="4" placeholder="Description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="image" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="image" name="image" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="price" class=" form-control-label">Estimation en Ariary</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" disabled value="10.000" class="form-control">
                                            <input type="hidden" id="price" name="price" value="10000" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="stock" class=" form-control-label">Stock</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="stock" name="stock" placeholder="Enter code" class="form-control">
                                            </div>
                                        </div>                                   
                                        <input type="hidden" id="status" name="status" value="0" class="form-control">
                                    
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Envoyer
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    @endif
            </div>
        </div>
    </div>
@section('extra-js')
    <script>
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    </script>
@endsection
@endsection
