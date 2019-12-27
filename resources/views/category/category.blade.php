@extends('welcome')
@section('content')
<!-- page header -->
<header class="masthead" style="background-image: url({{ asset('public/frontend/img/home-bg.jpg') }})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>{{ $single->name }} Category Details</h1>
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
            <a href="{{ route('add.category')}}" class="btn btn-info">Add Category</a>
            <a href="{{ route('view.category')}}" class="btn btn-danger">All Categories</a>
            <hr><br>

                <table class="table table-bordered">
                    <tr>
                        <th scope="col">Record Name</td>
                        <th scope="col">Record Values</td>
                    </tr>
                    <tr>
                        <td scope="col">Category ID</td>
                        <td>{{ $single->id }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Category Name</td>
                        <td>{{ $single->name }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Category Slug</td>
                        <td>{{ $single->slug }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Category Created</td>
                        <td>{{ $single->created_at }}</td>
                    </tr>
                </table>

        </div>
    </div>
</section>
@endsection
