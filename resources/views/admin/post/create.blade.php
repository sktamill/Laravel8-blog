@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">ADD New Post</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('main.index')}}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('post.index')}}">Posts</a></li>
          <li class="breadcrumb-item active">ADD New Post</li>
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
                <div class="alert-danger w-25 mb-2">{{ $message }}</div>
              @enderror
              <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="text" name="title" class="form-control mb-3 w-25" placeholder="Post Name" value="{{old('title')}}">
                  <div class="form-group w-50">
                      @error('content')
                          <div class="alert-danger mb-2">{{ $message }}</div>
                      @enderror
                      <textarea id="summernote" name="content">{{old('content')}}</textarea>
                  </div>
                  <div class="form-group w-50">
                    @error('preview_image')
                       <div class="alert-danger mb-2">{{ $message }}</div>
                    @enderror
                    <label for="exampleInputFile">Preview Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="preview_image" id="exampleInputFile" role="button" >
                        <label class="custom-file-label" for="exampleInputFile">Choose preview image file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" role="button">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group w-50">
                     @error('main_image')
                          <div class="alert-danger mb-2">{{ $message }}</div>
                      @enderror
                    <label for="exampleInputFileMain">Main Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="main_image" id="exampleInputFileMain" role="button">
                        <label class="custom-file-label" for="exampleInputFileMain">Choose main image file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" role="button">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group w-50">
                      @error('category_id')
                        <div class="alert-danger mb-2">{{ $message }}</div>
                      @enderror

                      <label>Select Category</label>
                      <select name="category_id" class="form-control">
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? ' selected' : '' }}>{{$category->title}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group w-50">
                      <label>Select Tags</label>
                      <select name="tags_id[]" class="select2" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;">
                          @foreach($tags as $tag)
                              <option {{ is_array(old('tags_id')) && in_array($tag->id, old('tags_id')) ? ' selected' : '' }} value="{{$tag->id}}">{{$tag->title}}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                      <input type="submit" class="btn btn-primary mt-4" value="ADD Post">
                  </div>
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
