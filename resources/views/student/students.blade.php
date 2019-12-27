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
            <hr><br>

            <table class="table table-bordered">
                <tr>
                    <th class="text-center">SL</th>
                    <th class="text-center">Student Name</th>
                    <th class="text-center">Student Email</th>
                    <th class="text-center">Student Phone</th>
                    <th class="text-center">Actions</th>
                </tr>
                <?php $i=0 ?>
                @foreach($students as $row)
                <?php $i++ ?>
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>
                        <a href="{{ url('view.student/'.$row->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ url('edit.student/'.$row->id) }}" class="btn btn-info btn-sm">Update</a>
                        <a href="{{ url('delete.student/'.$row->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>


        </div>
    </div>
</section>
@endsection
