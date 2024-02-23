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
                        <label for="menu">Name Product</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                               placeholder="Enter name product">
                    </div>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="menu_id">
                        <optgroup label="Level 1" >
                            <option value="0" {{ $product->menu_id == 0 ? 'selected' : '' }}>Category Parents</option>
                            @foreach ($menus as $menuParent)
                                <option value="{{ $menuParent->id}}" {{ $product->menu_id == $menuParent->id ? 'selected' : '' }}>
                                    {{ $menuParent->name}}
                                </option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Level 2" >
                        @foreach ($menus as $menuParent)
                            <optgroup label="ㅤ{{ $menuParent->name }}" {{ $product->menu_id == $menuParent->id ? 'selected' : '' }}>
                                @foreach ($menuss as $childMenu)
                                    @if ($childMenu->parent_id == $menuParent->id)
                                        <option value="{{ $childMenu->id }}" {{ $product->menu_id == $childMenu->id ? 'selected' : '' }}>
                                            ㅤ{{ $childMenu->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        @endforeach
                        </optgroup>
                        <optgroup label="Level 3" >
                            @foreach ($menuss as $childMenus)
                                <optgroup label="ㅤ{{ $childMenus->name }}" {{ $product->menu_id == $childMenus->id ? 'selected' : '' }}>
                                    @foreach ($menuss as $childMenu)
                                        @if ($childMenu->parent_id == $childMenus->id)
                                            <option value="{{ $childMenu->id }}" {{ $product->menu_id == $childMenu->id ? 'selected' : '' }}>
                                                ㅤ{{ $childMenu->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                            </optgroup>
                    </select>
                </div>

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{ $product->menu_id == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Original Price</label>
                        <input type="number" name="price" value="{{ $product->price }}"  class="form-control" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Discount Price</label>
                        <input type="number" name="price_sale" value="{{ $product->price_sale }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Detailed Description</label>
                <textarea name="content" id="content" class="form-control">{{ $product->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Photo</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $product->thumb }}" target="_blank">
                        <img src="{{ $product->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $product->thumb }}" id="thumb">
            </div>

            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $product->active == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $product->active == 0 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
