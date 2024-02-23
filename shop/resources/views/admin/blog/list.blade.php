@extends('admin.main')

@section('content')
<div class="table-responsive">
    <table class="table" data-simplebar data-simplebar-direction='rtl'>
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Name Blog</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Description</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 90px">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($blogs as $key => $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td>{{ $blog->name }}</td>
                <td>{{ $blog->menu->name }}</td>
                <td>
                    <a href="{{ $blog->thumb }}" target="_blank">
                        <img src="{{ $blog->thumb }}" height="40px">
                    </a>
                </td>
                <td>{{ $blog->description }}</td>
                <td>{!! \App\Helpers\Helper::active($blog->active) !!}</td>
                <td>{{ $blog->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/blogs/edit/{{ $blog->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $blog->id }}, '/admin/blogs/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $blogs->links() }}
</div>
@endsection