@extends('admin.layouts.app')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-12 m-1">
            <div class="card">
                <div class="card-header">
                <h3>Liste Category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $categories)
                            <tr>
                                <td>{{$categories->id}}</td>
                                <td>{{$categories->name}}</td>
                                <td>{{$categories->slug}}</td>
                                <td>
                                    <a href="" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{url('/admin/Category-delete/'.$categories->id)}}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    
                    </tbody>
                    <tfoot>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>

@endsection