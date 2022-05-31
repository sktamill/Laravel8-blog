@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{ $tag->title }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('main.index')}}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('tag.index')}}">Tags</a></li>
          <li class="breadcrumb-item active">Tag</li>
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
                      <td>{{ $tag->id }}</td>
                    </tr>
                    <tr>
                      <td>Name:</td>
                      <td>{{ $tag->title }}</td>
                    </tr>
                    <tr>
                      <td>Edit:</td>
                      <td><a href="{{ route('tag.edit', $tag->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                    </tr>
                    <tr>
                      <td>Delete:</td>
                      <td>
                          <form action="{{route('tag.destroy', $tag->id)}}" method="post" class="d-inline">
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
