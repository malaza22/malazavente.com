
@if (Session::has('success'))
<div class="alert alert-sm alert-success alert-block" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ session('success')}}</strong>
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-sm alert-danger alert-block" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ session('error')}}</strong>
</div>
@endif
@if (Session::has('danger'))
<div class="alert alert-sm alert-danger alert-block" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ session('danger')}}</strong>
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul class="mb-0 mt-0">
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

@if (request()->input('q'))
  <h6>{{ $products->total() }} résultat(s) pour la recherche <strong> "{{ request()->q }}"</strong>
  <a href="{{asset('/boutique')}}">Cliquer</a></h6>
@endif