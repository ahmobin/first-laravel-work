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
            <a href="{{ route('student')}}" class="btn btn-danger">Add Students</a>
            <a href="{{ route('all.students')}}" class="btn btn-primary">All Students</a>
            <hr><br>

            <table class="table table-bordered">
                <tr>
                    <th>Student ID</th>
                    <td>{{ $view->id }}</td>
                </tr>
                <tr>
                    <th>Student Name</th>
                    <td>{{ $view->name }}</td>
                </tr>
                <tr>
                    <th>Student Email</th>
                    <td>{{ $view->email }}</td>
                </tr>
                <tr>
                    <th>Student Phone</th>
                    <td>{{ $view->phone }}</td>
                </tr>
                <tr>
                    <th>Student Inserted</th>
                    <td>{{ $view->created_at }}</td>
                </tr>
                <tr>
                    <th>Actions</th>
                    <td>
                        <a href="{{ url('edit.student/'.$view->id) }}" class="btn btn-secondary">Update</a>
                        <a href="{{ url('delete.student'/$view->id) }}" id="delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </table>


        </div>
    </div>
</section>
@endsection
