@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">ADD Tag</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('main.index')}}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('tag.index')}}">Tags</a></li>
          <li class="breadcrumb-item active">Add Tag</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-12">
              @error('title')
                <div class="alert-danger w-25 mb-2">The Tag Name is required!</div>
              @enderror
              <form action="{{ route('tag.store') }}" class="w-25" method="post">
                  @csrf
                  <input type="text" name="title" class="form-control" placeholder="Tag Name">
                  <input type="submit" class="btn btn-primary mt-4" value="ADD Tag">
              </form>
          </div>
      </div>
      <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
