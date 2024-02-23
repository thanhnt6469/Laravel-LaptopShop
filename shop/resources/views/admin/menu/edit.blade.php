@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Name Category</label>
                <input type="text" name="name" value="{{ $menu->name }}" class="form-control" placeholder="Enter name category">
            </div>
            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="parent_id">
                    <optgroup label="Level 1" >
                        <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>Danh Mục Cha</option>
                        @foreach ($menus as $menuParent)
                            <option value="{{ $menuParent->id}}" {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>
                                {{ $menuParent->name}}
                            </option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Level 2" >
                    @foreach ($menus as $menuParent)
                        <optgroup label="ㅤ{{ $menuParent->name }}" {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>
                            @foreach ($menuss as $childMenu)
                                @if ($childMenu->parent_id == $menuParent->id)
                                    <option value="{{ $childMenu->id }}" {{ $menu->parent_id == $childMenu->id ? 'selected' : '' }}>
                                        ㅤ{{ $childMenu->name }}
                                    </option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                    </optgroup>
                    <optgroup label="Level 3" >
                        @foreach ($menuss as $childMenus)
                            <optgroup label="ㅤ{{ $childMenus->name }}" {{ $menu->parent_id == $childMenus->id ? 'selected' : '' }}>
                                @foreach ($menuss as $childMenu)
                                    @if ($childMenu->parent_id == $childMenus->id)
                                        <option value="{{ $childMenu->id }}" {{ $menu->parent_id == $childMenu->id ? 'selected' : '' }}>
                                            ㅤ{{ $childMenu->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        @endforeach
                        </optgroup>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Detailed Description</label>
                <textarea name="content" id="content" class="form-control">{{ $menu->content }}</textarea>
            </div>
            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" 
                    name="active" {{ $menu->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" 
                    name="active" {{ $menu->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Category</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>CKEDITOR.replace('content')</script>
@endsection