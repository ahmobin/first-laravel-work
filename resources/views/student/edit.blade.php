@extends('welcome')
@section('content')
<!-- page header -->
<header class="masthead" style="background-image: url({{ asset('public/frontend/img/home-bg.jpg') }})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Add Student</h1>
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
            <a href="{{ route('all.students') }}" class="btn btn-danger">All Students</a>
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

            <form action="{{ url('update.student/'.$student->id)}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="studentName">Student Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                </div>
                <div class="form-group">
                    <label for="studentEmail">Student Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $student->email }}">
                </div>
                <div class="form-group">
                    <label for="studentNumber">Student Phone:</label>
                    <input type="number" name="phone" class="form-control" value="{{ $student->phone }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>
@endsection
