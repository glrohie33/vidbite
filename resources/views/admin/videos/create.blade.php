@extends('layout.master')
@section('title', 'Create Video')
@section('content')
<div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="heading">
                <h2>Create Video</h2>
            </div>
            
            <div class="container">
                    <div class="row">
                        <form action="{{ route('video.upload') }}" method="post" enctype="multipart/form-data" class="col-md-10" style="margin:0px auto;">

    <h3 class="text-center mb-5">Upload Your Video</h3>
    @csrf
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="form-group mb-2 col-md-6">
            <label>Video</label>
            <input type="file" name="video" class="form-control" id="file">

            @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-2 col-md-6">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control" id="file">

            @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

                <div class="form-group mb-2 col-md-12">
                    <label>Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-2  col-md-12">
                    <label>Title</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="title" id="title">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-2  col-md-12">
                    <label>Choose a Category</label>
                    <select class="form-control @error('name') is-invalid @enderror" name="category" id="category"
                        required="">

                        @foreach ($categories as $category)
                            <option value='{{ $category->id }}'>{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>


                <div class="form-group mb-2 col-md-12">
                    <label>Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                        id="description" rows="4"></textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                    Upload
                </button>
            </div>

        
        </form>
                    </div>
            </div>
            
        </div>
</div>
@endsection
