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
                <h3>Liste Commande Carte</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>payment_intent_id</th>
                            <th>amount</th>
                            <th>payment_created_at</th>
                            <th>products</th>
                            <th>user_id</th>
                            {{-- <th>Status</th> --}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandeCarte as $commandes)
                                <tr>
                                    <td>{{$commandes->id}}</td>
                                    <td>{{$commandes->payment_intent_id}}</td>
                                    <td>{{$commandes->amount}}</td>
                                    <td>{{$commandes->payment_created_at}}</td>
                                    <td>
                                    @foreach (Auth()->user()->commandes as $commande)
                                        @foreach ( unserialize($commande->products) as $product)
                                            <div>Nom du produit: {{ $product[0]}}</div>
                                            <div>Prix: {{getPrice($product[1])}}</div>
                                            <div>Quantite: {{($product[2])}}</div>
                                        @endforeach
                                    @endforeach
                                    </td>
                                    <td>{{$commandes->user_id}}</td>
                                    {{-- <td>
                                            <input type="checkbox" class="commandesCarteStatus btn btn-success"
                                            rel="{{$commandes->id}}" data-toggle="toggle" data-one="Enabled"
                                            data-of="Disabled" data-onstyle="success" data-offstyle="danger"
                                            @if($commandes['status']=="1" )checked @endif>

                                        <div id="myElem" style="display:none;" class="alert alert-success">Status
                                            Enabled</div>

                                    </td> --}}
                                    <td>
                                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('/admin/CommandeCarte-delete/'.$commandes->id)}}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
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
{{-- @section('script')
    <script>
            //Update commandes Status
    $(".commandesCarteStatus").change(function(){
                var id = $(this).attr('rel');
                if($(this).prop("checked")==true){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
                        },
                        type : 'post',
                        url : '/admin/update-commandeCarte-status',
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
                                url : '/admin/update-commandeCarte-status',
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
@endsection --}}
@endsection