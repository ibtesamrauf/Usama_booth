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

      <div class="row">
        @foreach ($products as $user)
            <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="/show_product_view/{{ $user->id }}"><img class="card-img-top" src="{{ asset('uploads/'.$user->image) }}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{{ $user->title }}</a>
                  </h4>
                  <p class="card-text"><?php echo addslashes(substr($user->description, 0, 80))." ..." ?></p>
                </div>
              </div>
            </div>
        @endforeach
        
        
      </div>
      <!-- /.row -->
      <div class="row">
          {{$products->render()}}
      </div>
      <!-- Pagination -->
@endsection