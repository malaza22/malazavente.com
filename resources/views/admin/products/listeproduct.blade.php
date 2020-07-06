@extends('admin.layouts.app')

@section('content')
<section class="content">
        <div class="row">
            <div class="col-12 m-2">
                        {{-- MESSAGE--}}
                    <div id="message_success" style="display:none;" class="alert alert-sm alert-success alert-block"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Status Enable</strong>
                    </div>
    
                    <div id="message_error" style="display:none;" class="alert alert-sm alert-danger alert-block"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Status Disable</strong>
                    </div>
            <div class="card">
                <div class="card-header">
                <h3>Liste Product</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>slug</th>
                            <th>description</th>
                            <th>price</th>
                            <th>image</th>
                            <th>stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->image}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>
                                            <input type="checkbox" class="ProductStatus btn btn-success"
                                            rel="{{$product->id}}" data-toggle="toggle" data-one="Enabled"
                                            data-of="Disabled" data-onstyle="success" data-offstyle="danger"
                                            @if($product['status']=="1" )checked @endif>

                                        <div id="myElem" style="display:none;" class="alert alert-success">Status
                                            Enabled</div>

                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('/admin/Product-delete/'.$product->id)}}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
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
@section('script')
    <script>
            //Update Product Status
    $(".ProductStatus").change(function(){
                var id = $(this).attr('rel');
                if($(this).prop("checked")==true){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
                        },
                        type : 'post',
                        url : '/admin/update-product-status',
                        data : {status:'1',id:id},
                        success:function(data){
                            $("#message_success").show();
                            setTimeout(function() { $("#message_success").fadeOut('slow'); },2000);},
                        error:function(){
                                alert("ErrorX");
                            }
                        });
                        }else{
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
                                },
                                type : 'post',
                                url : '/admin/update-product-status',
                                data : {status:'0',id:id},
                                    success:function(resp){
                                        $("#message_error").show();
                                        setTimeout(function(){$("#message_error").fadeOut('slow');},2000);},
                                    error:function(){
                                        alert("ErrorY");
                                        }
                                });
                        }
            });
    </script>
@endsection
@endsection