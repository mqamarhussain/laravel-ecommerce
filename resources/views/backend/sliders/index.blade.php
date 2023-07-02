@extends('layouts.admin')

@section('content')
    @can('add-slider')
        <p><a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">Create New Slider</a></p>
    @endcan
    <div class="card shadow bg-white">
        <table class="table table-hover">
            <thead class="">
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody class="">
            @forelse($sliders as $slider)
                <tr class="">
                    <td>{{ $slider->title }}</td>
                    <td><a href="{{ route('admin.sliders.show',$slider->id ) }}">{{ $slider->link }}</a></td>
                    <td>{{ $slider->status }}</td>

                    @can('edit-slider')
                        <td><a href="{{ route('admin.sliders.edit',$slider->id) }}"><i class="fa fa-edit"></i></a></td>
                    @endcan

                    <td>
                        <form method="post" action="{{ route('admin.sliders.destroy',$slider->id) }}" id="slider-delete-{{ $slider->id }}">
                            @csrf
                            @method('DELETE')
                            @can('delete-slider')
                                <button type="submit" class="btn btn-link" onclick="if (confirm('Are You sure to Delete This Page?')) { document.getElementById('slider-delete-{{ $slider->id }}').submit(); } else { return false; }">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            @endcan
                        </form>
                    </td>
                </tr>
                <tr>
                    @empty
                        <td colspan="5" class="text-center">No sliders found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
