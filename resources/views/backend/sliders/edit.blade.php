@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-header d-flex">
            <i class="fa fa-table"></i>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary ml-auto">Back</a>
        </div>
        <div class="card-body">
            <div class="container">
                <form method="POST" action="{{ route('admin.sliders.update', $slider) }}"  enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title"
                                value="{{ old('title', $slider->title) }}">
                        </div>

                        <div class="col-6 form-group">
                            <label for="link">Slug</label>
                            <input type="text" class="form-control" name="link"
                                value="{{ old('link', $slider->link) }}">
                        </div>

                        <div class="col-6 form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">---</option>
                                <option value="1" {{ old('status', $slider->status) == 'Active' ? 'selected' : null }}>
                                    Active</option>
                                <option value="0"
                                    {{ old('status', $slider->status) == 'Inactive' ? 'selected' : null }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-lg-6 form-group">
                            <label for="text">Short text</label>
                            <textarea name="text" class="form-control">{{ old('link', $slider->link) }}</textarea>
                            @error('text')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row pt-4">
                            <div class="col-12">
                                <label for="image">Image</label><br>
                                @if ($slider->image)
                                    <img class="mb-2" src="{{ asset('storage/images/sliders/' . $slider->image) }}"
                                        alt="{{ $slider->title }}" width="300">
                                    <a class="btn btn-sm btn-danger mb-2"
                                        href="{{ route('admin.sliders.remove_image', $slider->id) }}">Remove</a>
                                @else
                                    <img class="mb-2" src="{{ asset('img/no-img.png') }}" alt="{{ $slider->title }}"
                                        width="60" height="60">
                                @endif
                                <br>
                                <input type="file" name="image">
                                <span class="form-text text-muted">Image width should be 1920px x 670px</span>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
