@extends('welcome')
@section('content')
<!-- page header -->
<header class="masthead" style="background-image: url({{ asset('public/frontend/img/home-bg.jpg') }})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Clean Blog</h1>
          <span class="subheading">A Blog Theme by Start Bootstrap</span>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection

@section('main-content')
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

    @foreach($posts as $post)
      <div class="post-preview">
        <a href="{{ url('view-post/'.$post->id) }}">
          <h2 class="post-title">
            {{ $post -> title }}
          </h2>
         </a>
          <p class="post-subtitle" style="font-size: 1.5rem;">
            {{ substr($post->details, 0, 100) }} <strong>...</strong>
        </p>

        <p class="post-meta">Category under
          <span style="font-weight:bold">{{ $post -> name }}</span>
          on {{ $post->created_at }}</p>
      </div>
      <hr>
      @endforeach

      <!-- Pager -->
      {{ $posts -> links() }}
    </div>
  </div>
</div>
@endsection
