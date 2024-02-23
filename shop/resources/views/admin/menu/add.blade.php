@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Name Category</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name category">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="parent_id">
                    <optgroup label="Level 1" >
                        <option value="0">Category Parents</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id}}">{{ $menu->name}}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Level 2" >
                    @foreach ($menus as $menu)
                        <optgroup label="ㅤ{{ $menu->name }}" >
                            @foreach ($menuss as $childMenu)
                                @if ($childMenu->parent_id == $menu->id)
                                    <option value="{{ $childMenu->id }}">ㅤ{{ $childMenu->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                    </optgroup>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Detailed Description</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create Category</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>CKEDITOR.replace('content')</script>
@endsection