@extends('layouts.app')
@section('css')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>You are logged in!</h5>

                    You can now edit Buildings and Locations.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
