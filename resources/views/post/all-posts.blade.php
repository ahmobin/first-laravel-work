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
        <div class="">
            <a href="{{ route('create.post')}}" class="btn btn-info">Add Post</a>
            <hr><br>

            <table class="table table-bordered">
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Category Id</th>
                    <th scope="col">Post Title</th>
                    <th scope="col">Post Description</th>
                    <th scope="col">Post Image</th>
                    <th scope="col">Action</th>
                </tr>
                <?php $i=0 ?>
                @foreach($posts as $post)
                <?php $i++ ?>
                <tr>
                    <th scope="col">{{ $i }}</th>
                    <td width="10%">{{ $post->title }}</td>
                    <td>{{ $post->name }}</td>
                    <td width="30%">{{ substr($post->details,0,150) }}...</td>
                    <td>
                        <img src="{{ $post->image }}" alt="" height="100" width="130">
                    </td>
                    <td>
                        <a href="{{ url('view-post/'.$post->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ url('edit-post/'.$post->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ url('delete-post/'.$post->id) }}" id="delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</section>
@endsection
