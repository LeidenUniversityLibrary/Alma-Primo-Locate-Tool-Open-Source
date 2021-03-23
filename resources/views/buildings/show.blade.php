@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
@endsection
@section('content')
<!-- SECTION content -->
<h2>Buildings overview</h2>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
    <table class="table table-striped" style="width:100%" id="buildings-table">
        <thead>
            <tr>
                <th scope="col">Building Name</th>
                <th scope="col">Building ID</th>
                <th scope="col">View/Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buildings as $building)
            <tr>
                <td>{{$building->building_name}}</td>
                <td>{{$building->building_id}}</td>
                <td>
                    <form action="{{ route('delete_building',$building->building_id) }}" method="POST">
                        <a class="btn btn-success"
                            href="{{ route('show_building', ['building_id' => $building->building_id]) }}">View</a>

                        <a class="btn btn-warning"
                            href="{{ route('update_building', ['building_id' => $building->building_id]) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button
                        @if ($building->building_id === 'tstid')
                            dusk='deleteTestBuilding'
                        @endif
                        type="submit" onclick="return confirm('Are you sure you want to delete this building?')"
                            class="btn btn-danger" id="{{$building->building_id}}-delete">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <a class="btn btn-primary" id="create-new-building" href="{{ route('create_new_building')}}">Create new building</a>
@endsection
@section('javascript')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/datatable.js') }}"></script>
@endsection
