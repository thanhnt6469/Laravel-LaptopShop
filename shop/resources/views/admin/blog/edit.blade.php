@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Name Blog</label>
                        <input type="text" name="name" value="{{ $blog->name }}" class="form-control"
                               placeholder="Enter name blog">
                    </div>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="menu_id">
                    @foreach ($menus as $menuParent)
                        <option value="{{ $menuParent->id}}" {{ $blog->menu_id == $menuParent->id ? 'selected' : '' }}>
                            {{ $menuParent->name}}
                        </option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $blog->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Detailed Description</label>
                <textarea name="content" id="content" class="form-control">{{ $blog->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Photo</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $blog->thumb }}" target="_blank">
                        <img src="{{ $blog->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $blog->thumb }}" id="thumb">
            </div>

            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $blog->active == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $blog->active == 0 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Blog</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
