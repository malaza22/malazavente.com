@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8 m-4">
                <div class="card">
                    <div class="card-header">
                        <strong><i class="zmdi zmdi-plus"></i> Add Produit</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/admin/Product-add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{csrf_field()}}
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
                                        <label for="title" class=" form-control-label">Title</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="title" name="title" placeholder="Entre Tilte" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="slug" class=" form-control-label">Code</label>
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
                                        <label for="price" class=" form-control-label">Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="price" name="price" placeholder="Enter Price" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="image" class=" form-control-label">Picture upload</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="image" name="image" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="stock" class=" form-control-label">Stock</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="stock" name="stock" placeholder="Enter Stock" class="form-control">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Save
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection