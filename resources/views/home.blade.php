@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button><a href="/add_product_view">Add new products</a></button>
                    
                    @foreach ($products as $user)
                        <p>This is user {{ $user->id }}</p>
                    @endforeach
                    {{$products->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
