
<form action="{{ route('products.search') }}" class="d-flex">
    <div class="input-group mb-0 mr-1">
        <input type="text" name="q" class="form-control" value="{{ request()->q ?? '' }}">
        <div class="input-group-btn">
        <button type="submit" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-search"></i><Ri:a>Search</Ri:a></button>
        </div>
    </div>
</form>

