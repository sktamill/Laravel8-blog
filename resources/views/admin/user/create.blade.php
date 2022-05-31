@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">ADD User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('main.index')}}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('user.index')}}">Users</a></li>
          <li class="breadcrumb-item active">Add User</li>
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
             <form action="{{ route('user.store') }}" class="w-25" method="post">
                  @csrf
                 <div class="form-group">
                     @error('name')
                        <div class="alert-danger mb-2">{{$message}}</div>
                     @enderror
                        <input type="text" name="name" class="form-control" placeholder="User Name" value="{{old('name')}}">
                 </div>
                 <div class="form-group">
                     @error('email')
                        <div class="alert-danger mb-2">{{$message}}</div>
                     @enderror
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                 </div>
                 <div class="form-group w-50">
                      @error('role')
                        <div class="alert-danger mb-2">{{ $message }}</div>
                      @enderror

                      <label>Select User Role</label>
                      <select name="role" class="form-control">
                          @foreach($roles as $id => $role)
                            <option value="{{ $id }}" {{ $id == old('role') ? ' selected' : '' }}>{{$role}}</option>
                          @endforeach
                      </select>
                  </div>
                 <input type="submit" class="btn btn-primary mt-4" value="ADD User">
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
