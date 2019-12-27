@extends('welcome')
@section('content')
<!-- page header -->
<header class="masthead" style="background-image: url({{ asset('public/frontend/img/home-bg.jpg') }})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>All Categories</h1>
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
            <hr><br>

            <table class="table table-responsive">
                <tr>
                    <td>SL</td>
                    <td>Category Name</td>
                    <td>Category Slug</td>
                    <td>Actions</td>
                </tr>
                    <?php $i=0 ?>
                @foreach($category as $row)
                    <?php $i++ ?>
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->slug }}</td>
                    <td>
                        <a href="{{ url('view-category/id='.$row->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ url('edit-category/'.$row->id) }}" class="btn btn-info btn-sm">Update</a>
                        <a href="{{ url('delete-category/'.$row->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                    </td>

                </tr>
                @endforeach
            </table>

        </div>
    </div>
</section>
@endsection
