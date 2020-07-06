@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 m-4">
                <div class="card">
                    <div class="card-header">
                        <strong><i class="zmdi zmdi-plus"></i> Add Category</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/admin/Category-add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{csrf_field()}}

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" placeholder="Enter name" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="slug" class=" form-control-label">slug</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="slug" name="slug" placeholder="Enter slug" class="form-control">
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
