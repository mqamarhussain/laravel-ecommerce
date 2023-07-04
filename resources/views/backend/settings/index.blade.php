@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">Settings</div>
                <ul class="list-group list-group-flush">
                    @foreach($setting_sections as $setting_section)
                        <li class="list-group-item">
                            <a href="{{ route('admin.settings.index', ['section' => $setting_section]) }}" class="nav-link">
                                <i class="fa fa-gear"></i>
                                {{ $setting_section }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">Settings {{ $section }}</div>
                <div class="card-body">

                    <form action="{{ route('admin.settings.update', 1) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PATCH')
                        @foreach($settings as $setting)
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">{{ $setting->display_name }}</label>
                                    @if ($setting->type !== 'image')
                                    <input type="text" name="{{$setting->key}}" id="value" class="form-control" value="{{ $setting->value }}" required>
                                    @else
                                    <img src="{{ $setting->value }}" alt="" width="100px">
                                    <input type="file" name="{{$setting->key}}" id="value" class="form-control">
                                    @endif

                                    @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
