@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-cyan">Update <b class="text-green">{{ $lot->title }}</b></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.lot.show', $lot->id ) }}">{{ $lot->title }}</a></li>
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
                        <form action="{{ route('admin.lot.update', $lot->id ) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-6">
                                <input type="text" class="form-control" name="title" placeholder="Enter Title"
                                       value="{{ $lot->title }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group col-6">
                                <textarea class="form-control" name="description">{{ $lot->description }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Select some categories</label>
                                <div class="select2-info">
                                    <select name="category_ids[]" class="select2" multiple="multiple"
                                            data-placeholder="Select a State" data-dropdown-css-class="select2-lime"
                                            style="width: 100%;">
                                        @foreach($categories as $category)
                                            <option {{ is_array($lot->categories->pluck('id')->toArray()) &&
                                                           in_array($category->id, $lot->categories->pluck('id')->toArray()) ? ' selected' : "" }}
                                                    value="{{ $category->id }}" {{$category->id == $lot->categories->pluck('id')->toArray() ? ' selected' : ''}}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_ids')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Update">
                                <a href="{{ route('admin.lot.show', $lot->id ) }}"> <input type="text" class="btn btn-info" value="Save As Is"></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
