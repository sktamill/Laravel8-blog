@extends('personal.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Comment</h1>
      </div><!-- /.col -->
     {{-- <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('main.index')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->--}}
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
              @error('message')
                <div class="alert-danger w-25 mb-2">{{$message}}</div>
              @enderror
              <form action="{{ route('personal.comment.update', $comment->id) }}" class="w-50" method="post">
                  @csrf
                  @method('PATCH')
                  <textarea class="form-control" name="message" cols="30" rows="10">{{$comment->message}}</textarea>
                  <input type="submit" class="btn btn-primary mt-4" value="Edit Comment">
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
