@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-cyan">Add new Lots</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.lot.index') }}">Lots</a></li>
                            <li class="breadcrumb-item active">create</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.lot.store') }}" method="post">
                            @csrf
                            <div class="form-group col-6">
                                <input type="text" class="form-control" name="title" placeholder="Enter Title"
                                       value="{{ old('title') }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group col-6">
                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Select some categories</label>
                                <div class="select2-info">
                                    <select name="category_ids[]" class="select2" multiple="multiple"
                                            data-placeholder="Select a State" data-dropdown-css-class="select2-info"
                                            style="width: 100%;">
                                        @foreach($categories as $category)
                                            <option {{ is_array(old('category_ids')) && in_array($category->id,
                                                    old('category_ids')) ? ' selected' : "" }}
                                                    value="{{ $category->id }}"
                                                {{$category->id == old('category_ids') ? ' selected' : ''}}>
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_ids')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
