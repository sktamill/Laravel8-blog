@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tags</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Tags</li>
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

        <div class="col-2 mb-3">
            <a href="{{route('tag.create')}}" type="button" class="btn btn-block btn-primary">ADD Tags</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mt-4">
           <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($tags as $tag)
                    <tr>
                      <td>{{ $tag->id }}</td>
                      <td>{{ $tag->title }}</td>
                      <td>
                          <a href="{{route('tag.show', $tag->id)}}"><i class="far fa-eye mr-3"></i></a>
                          <a href="{{route('tag.edit', $tag->id)}}" class="text-success"><i class="fas fa-pencil-alt mr-3"></i></a>
                          <form action="{{route('tag.destroy', $tag->id)}}" method="post"  class="d-inline">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="border-0 text-danger bg-transparent">
                                <i class="fas fa-trash"></i>
                              </button>
                          </form>
                      </td>
                    </tr>
                  @endforeach
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
