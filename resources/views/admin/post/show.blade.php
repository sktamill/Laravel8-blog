@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{ $post->title }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('main.index')}}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('post.index')}}">Posts</a></li>
          <li class="breadcrumb-item active">Post</li>
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
        <div class="col-6 mt-4">
           <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td>ID:</td>
                      <td>{{ $post->id }}</td>
                    </tr>
                    <tr>
                      <td>Name:</td>
                      <td>{{ $post->title }}</td>
                    </tr>
                    <tr>
                      <td>Edit:</td>
                      <td><a href="{{ route('post.edit', $post->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                    </tr>
                    <tr>
                      <td>Delete:</td>
                      <td>
                          <form action="{{route('post.destroy', $post->id)}}" method="post" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="border-0 text-danger bg-transparent">
                                  <i class="fas fa-trash"></i>
                              </button>
                          </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
