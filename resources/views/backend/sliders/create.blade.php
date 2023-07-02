@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-header d-flex">
            <i class="fa fa-table"></i>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary ml-auto">Back</a>
        </div>
        <div class="card-body">
            <div class="container">
                <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-6 form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" value="">
                            @error('link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-6 form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">---</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : null }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : null }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 form-group">
                            <label for="text">Short text</label>
                            <textarea name="text" class="form-control"></textarea>
                            @error('text')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row pt-4">
                            <div class="col-12">
                                <label for="image">Slider Image</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file" name="image" id="slider-img" class="file-input-overview">
                                    <span class="form-text text-muted">Image width should be 1920px x 670px</span>
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-12 form-group">
                        <button type="submit" class="btn btn-primary mt-3">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $("#slider-img").fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false
            })
        })
    </script>
@endsection
