@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Title 1</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Title 2</label>
                        <input type="text" name="name2" value="{{ old('name2') }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="menu">Desciption</label>
                <input type="text" name="desciption" value="{{ old('desciption') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="menu">Link</label>
                <input type="text" name="url" value="{{ old('url') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="menu">Photo</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label for="menu">Sort By</label>
                <input type="number" name="sort_by" value="1" class="form-control" >
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
            <button type="submit" class="btn btn-primary">Add Slider</button>
        </div>
        @csrf
    </form>
@endsection

