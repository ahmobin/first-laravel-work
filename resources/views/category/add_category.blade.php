@extends('welcome')
@section('content')
<!-- page header -->
<header class="masthead" style="background-image: url({{ asset('public/frontend/img/home-bg.jpg') }})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Add Category</h1>
          <span class="subheading">A Blog Theme by Start Bootstrap</span>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection

@section('main-content')
<section class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-10 m-auto">
            <a href="{{ route('view.category')}}" class="btn btn-danger">All Categories</a>
            <hr><br>

            @if ($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <br>

            <form action="{{ route('store.category')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="postTitle">Category Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Write Your Category Name...">
                </div>

                <div class="form-group">
                    <label for="postDetails">Post Details:</label>
                    <input type="text" name="slug" class="form-control" placeholder="Write Your Category Slug...">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>
@endsection
