@extends('backend.layouts.app')
@section('title', 'Add Permission')
@section('content')
<div class="card">
    <div class="card-body">
        <h5>All Route Names</h5>

        <ul>
            @foreach ($routes as $route)
                <li>{{ $route }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
