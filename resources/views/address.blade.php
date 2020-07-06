@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>


                <div class="card-body">
                    @foreach ($address as $add )
                        @if ($add->user_id == Auth()->user()->id)
                            @if ($add->status == "1")
                                <ul>
                                    <li>
                                        {{$add->user_email}}
                                    </li>
                                    <li>
                                        {{$add->address}}
                                    </li>
                                    <li>
                                        {{$add->ville}}
                                    </li>
                                    <li>
                                        {{$add->telephone}}
                                    </li>
                                </ul>
                            @else
                                <div class="alert alert-danger m-4" role="alert">
                                    Votre address n'est pas encore valide !!
                                </div>
                            @endif
                        @endif
                    @endforeach

                </div>


            </div>
        </div>
    </div>
</div>
@endsection