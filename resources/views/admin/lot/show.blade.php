@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex ">
                        <h1 class="m-0 mr-2"> {{ $lot->title }} ___
                            <a href="{{ route('admin.lot.edit', $lot->id) }}" class="text-lime">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </h1>
                        <form action="{{ route('admin.lot.delete', $lot->id) }}" method="post">
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.lot.index') }}">Lot</a></li>
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
                                        <td>{{ $lot['id'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $lot['title'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{{ $lot['description'] }}</td>
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
