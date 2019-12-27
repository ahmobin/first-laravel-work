@extends('welcome')
@section('content')
<!-- page header -->
<header class="masthead" style="background-image: url({{ asset('public/frontend/img/home-bg.jpg') }})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Create Post</h1>
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
            <a href="{{ route('all.posts')}}" class="btn btn-success">All Posts</a>
            <hr><br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('post.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="postTitle">Post Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Write Your Post Title...">
                </div>
                <div class="form-group">
                    <label for="postTitle">Select Category:</label>
                    <select class="form-control" name="category">
                        <option value="null">--Choose A Category--</option>
                        @foreach($categories as $option)
                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="postImage">Upload Post Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postDetails">Post Details:</label>
                    <textarea name="details" cols="10" placeholder="Write On Your Post..." class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>
@endsection
