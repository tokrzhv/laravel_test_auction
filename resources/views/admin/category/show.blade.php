@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex ">
                        <h1 class="m-0 mr-2"> {{ $category->title }} ___
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="text-lime">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </h1>
                        <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                              <h1>
                                  <i class="fas fa-trash text-danger" role="button"></i>
                              </h1>
                            </button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                            <li class="breadcrumb-item active">show </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 mt-3">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $category['id'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $category['title'] }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
