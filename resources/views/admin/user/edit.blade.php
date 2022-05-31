@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('main.index')}}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('user.index')}}">Users</a></li>
          <li class="breadcrumb-item active">Edit</li>
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
              @error('name')
                <div class="alert-danger w-25 mb-2">{{$message}}</div>
              @enderror
              <form action="{{ route('user.update', $user->id) }}" class="w-25" method="post">
                  @csrf
                  @method('PATCH')
                  <div class="form-group">
                      @error('name')
                      <div class="alert-danger mb-2">{{$message}}</div>
                      @enderror
                      <input type="text" name="name" class="form-control" placeholder="User Name" value="{{$user->name}}">
                  </div>
                  <div class="form-group">
                      @error('email')
                      <div class="alert-danger mb-2">{{$message}}</div>
                      @enderror
                      <input type="text" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                  </div>
                 <div class="form-group w-50">
                      @error('role')
                        <div class="alert-danger mb-2">{{ $message }}</div>
                      @enderror

                      <label>Select User Role</label>
                      <select name="role" class="form-control">
                          @foreach($roles as $id => $role)
                            <option value="{{ $id }}" {{ $id == $user->role ? ' selected' : '' }}>{{$role}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group w-50">
                      <input type="hidden" name="user_id" value="{{$user->id}}">
                  </div>
                  <input type="submit" class="btn btn-primary mt-4" value="Edit User">
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
