@extends('layouts.app')
@section('content')
    <!-- flash message -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <!-- Page Heading -->
    <h1 class="my-4">Product
      <small>List</small>
    </h1>

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">
        <img class="img-fluid" src="{{ asset('uploads/'.$products[0]->image) }}" alt="">
      </div>
<!-- {{ $products }} -->
      <div class="col-md-4">
        <h3 class="my-3">{{ $products[0]->title }}</h3>
        <div style="max-height: 206px; overflow-y:  auto;">
          <p><strong>Description: </strong><?php echo addslashes($products[0]->description) ?></p>
        </div>
        <p><strong>Price: </strong> $ {{ $products[0]->price }}</p>

        <!-- <h3 class="my-3">Project Details</h3>
        <ul>
          <li>Lorem Ipsum</li>
          <li>Dolor Sit Amet</li>
          <li>Consectetur</li>
          <li>Adipiscing Elit</li>
        </ul> -->
        <a class="btn btn-primary btn-lg" href="/add_to_cart/{{$products[0]->id.$products[0]->title}}/{{$products[0]->title}}/{{$products[0]->price}}">
          Add to Cart!</a>
        
      </div>

    </div>
    <!-- /.row -->
    <br>
        
@endsection