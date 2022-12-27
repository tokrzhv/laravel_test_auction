@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-3">
            <div class=" text-center text-info">
                <h5>Check your category</h5>
            </div>
            <div class="custom-control custom-checkbox">
                <form action="{{ route('main.index') }}" method="get">
                    @foreach($categories as $category)
                        <div class="form-group">
                            <input type="checkbox" name="category_id[]" class="custom-control-input" id="{{ $category->id }}"
                                   value="{{ $category->id }}">
                            <label class="custom-control-label" for="defaultIndeterminate2">{{ $category->title }}</label>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary mt-2" value="Filter">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-9">
            <div class="text-center text-info">
                <h5>Lots list</h5>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lots as $lot)
                    <tr>
                        <th scope="row">{{ $lot->id }}</th>
                        <td>{{ $lot->title }}</td>
                        <td>{{ $lot->description }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
