@extends('welcome')
@section('content')
<!-- page header -->
<header class="masthead" style="background-image: url({{ asset('public/frontend/img/home-bg.jpg') }})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>View Post</h1>
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
        <div class="">
            <a href="{{ route('create.post')}}" class="btn btn-info">Add Post</a>
            <a href="{{ route('all.posts')}}" class="btn btn-danger">All Post</a>
            <a href="{{ url('edit-post/'.$single->id)}}" class="btn btn-danger">Edit Post</a>
            <hr><br>

            <table width="75%" class="m-auto">
                <tr>
                    <td style="position:cover; width:100%;"><img src="{{ url($single->image) }}" alt="" height='350' width='100%'></td>
                </tr>
                <tr>
                    <td><h1>{{ $single->title }}</h1></td>
                </tr>
                <tr>
                    <td>Post ID: {{ $single->id }}</td>
                </tr>
                <tr>
                    <td>Category: {{ $single->name }}</td>
                </tr>
                <tr>
                    <td>{{ $single->created_at }}</td>
                    <td></td>
                </tr>
                <tr class="table">
                    <td></td>
                </tr>

                <tr>
                    <td>{{ $single->details }}</td>
                </tr>
            </table>
        </div>
    </div>
</section>
@endsection
