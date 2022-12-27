@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-cyan">Update <b class="text-green">{{ $category->title }}</b></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.show', $category->id ) }}">{{ $category->title }}</a></li>
                            <li class="breadcrumb-item active">edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.category.update', $category->id ) }}" method="post" class="w-25">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control" name="title"  placeholder="Enter Title" value="{{ $category->title }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update">
                            <a href="{{ route('admin.category.show', $category->id ) }}"> <input type="text" class="btn btn-success" value="Save As Is"></a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
