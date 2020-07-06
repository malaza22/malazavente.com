@extends('admin.layouts.app')

@section('content')
<section class="content">
        <div class="row">
            <div class="col-12 m-2">
            <div class="card">
                <div class="card-header">
                <h3>Liste client Vendue</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>user_id</th>
                            <th>user_name</th>
                            <th>title</th>
                            <th>slug</th>
                            <th>description</th>
                            <th>price</th>
                            <th>image</th>
                            <th>stock</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($vende as $vendes)
                                <tr>
                                    <td>{{$vendes->id}}</td>
                                    <td>{{$vendes->user_id}}</td>
                                    <td>{{$vendes->user_name}}</td>
                                    <td>{{$vendes->title}}</td>
                                    <td>{{$vendes->slug}}</td>
                                    <td>{{$vendes->description}}</td>
                                    <td>{{$vendes->price}}</td>
                                    <td>{{$vendes->image}}</td>
                                    <td>{{$vendes->stock}}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('/admin/Vende-delete/'.$vendes->id)}}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
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