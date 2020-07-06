@extends('layouts.master')

@section('content')
<div class="container">
{{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <ul>
                        <li>
                            <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="">
                        </li>
                        <br>
                        <li class="row">
                            Nom:<a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="row">
                            Email:<a class="nav-link" href="#">{{ Auth::user()->email }}</a>
                        </li>
                    </ul>
                        
                </div>
            </div>
        </div>
    </div>--}}
<embed src="{{ asset('storage/'.Auth::user()->avatar) }}" type="appliction/pdf" width="100px" height="600"/>

</div>

@endsection
