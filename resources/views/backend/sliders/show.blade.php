@extends('layouts.admin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ $slider->name }}
            </h6>
            <div class="ml-auto">
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary">
                    <span class="text">Back to sliders</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Text</th>
                    <th>Status</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        @if($slider->image)
                            <img src="{{ asset('storage/images/sliders/' . $slider->image) }}"
                                 width="60" height="60" alt="{{ $slider->title }}">
                        @else
                            <img src="{{ asset('img/no-img.png') }}" width="60" height="60" alt="{{ $slider->title }}">
                        @endif
                    </td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->link ?? '' }}</td>
                    <td>{{ $slider->text }}</td>
                    <td>{{ $slider->status }}</td>
                    <td>{{ $slider->created_at }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
