@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Lots</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Lot</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <a href="{{ route('admin.lot.create') }}" class="btn btn-block btn-info btn-lg">Add new Lot</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of all Lots</h3>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th colspan="4" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lots as $lot)
                                            <tr>
                                                <td>{{$lot['id']}}</td>
                                                <td>{{ $lot['title'] }}</td>
                                                <td><a href="{{ route('admin.lot.show', $lot->id) }}"
                                                       class="text-lime"><i class="far fa-eye"></i></a></td>
                                                <td><a href="{{ route('admin.lot.edit', $lot->id) }}"
                                                       class="text-maroon"><i class="fas fa-pencil-alt"></i></a></td>
                                                <td>
                                                    <form action="{{ route('admin.lot.delete', $lot->id) }}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i class="fas fa-trash text-danger" role="button"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 m-auto">
                        <form action="{{ route('admin.lot.index') }}" method="get">

                                <label>Select some Category</label>

                            @foreach($categories as $category)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_id[]" id="{{ $category->id }}" class="custom-control-input" value="{{ $category->id }}">
                                    <label for="{{ $category->id }}" class="custom-control-label">{{ $category->title }}</label>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary pl-5 pr-5 mt-3" value="Filter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
